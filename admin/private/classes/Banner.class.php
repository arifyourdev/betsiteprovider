<?php

class Banner extends DatabaseObject {
static protected $table_name = "banners";
static protected $db_columns = ['id','language','group_id','shor_title','title','short_desc','cta_title','image','status','created_at'];

public $id;
public $language;
public $group_id;
public $shor_title;
public $title;
public $short_desc;
public $cta_title;
public $image;
public $tmp_path;
public $created_at;
public $status;
public $upload_directory = "images/banner";
public $custom_errors = array();
public $upload_errors_array = array(

      UPLOAD_ERR_OK => "There is no error",
      UPLOAD_ERR_INI_SIZE => "The uploaded file exceeds the upload_max_filesize directive in php.ini",
      UPLOAD_ERR_FORM_SIZE => "The uploaded file exceeds the MAX_FILE_SIZE directive that was specified in the HTML form",
      UPLOAD_ERR_PARTIAL => "The uploaded file was only partially uploaded.",
      UPLOAD_ERR_NO_FILE => "No file was uploaded.",
      UPLOAD_ERR_NO_TMP_DIR => "Missing a temporary folder.",
      UPLOAD_ERR_CANT_WRITE => "Failed to write file to disk.",
      UPLOAD_ERR_EXTENSION => "A PHP extension stopped the file upload.",

  );

    public function __construct($args = [])
    {
          $this->language = $args['language'] ?? '';
          $this->group_id = $args['group_id'] ?? '';
          $this->shor_title = $args['shor_title'] ?? '';
          $this->title = $args['title'] ?? '';
          $this->short_desc = $args['short_desc'] ?? '';
          $this->cta_title = $args['cta_title'] ?? '';
          $this->image = $args['image'] ?? '';
          $this->created_at = $args['created_at'] ?? '';
          $this->status = $args['status'] ?? '';

    }

    public function set_file($file)

    {
        $fileinfo = @getimagesize($file['tmp_name']);
        $allowed_image_extension = array('png','jpg','jpeg','webp');
        $file_extension = pathinfo($file['name'], PATHINFO_EXTENSION);

        if (empty($file) || !$file || !is_array($file)) {
            $this->errors[] = "There was no file uploaded here";
            return false;
        } elseif (!in_array(strtolower($file_extension), $allowed_image_extension)) {
            $this->errors[] = "Upload Valid image Format. Only PNG, JPG and WEBP are allowed.";
            return false;
        } elseif (($file['size'] > 8000000)) {
            $this->errors[] = "Image size exceeds 8MB";
            return false;
        } elseif ($file['error'] != 0) {
            $this->errors[] = $this->upload_errors_array[$file['error']];
            return false;
        } else {
            $ext = pathinfo($file['name'], PATHINFO_EXTENSION);
            $rand = rand(1111, 9999);
            $this->image = date("YmdHis") . "-" . $rand . "." . $ext;
            $this->tmp_path = $file['tmp_name'];
        }
    }

    public function picture_path()

    {

        return $this->upload_directory . DS . $this->image;
    }

    public function save_photo()

    {

        if ($this->id) {
            $target_path = $this->upload_directory . DS . $this->image;
            if (move_uploaded_file($this->tmp_path, $target_path)) {
                if ($this->update()) {
                     unset($this->tmp_path);
                    return true;
                } else {
                    $this->errors[] = "The file directory probably does not have permission";
                    return false;
                }
            }
        } else {

            if (!empty($this->errors)) {
                return false;
            }

            if (empty($this->image) || empty($this->tmp_path)) {
                $this->errors[] = "The File was not available";
                return false;
            }

            if (is_dir($this->upload_directory) == false) {
                mkdir($this->upload_directory, 0700); // Create directory if it does not exist
            }
            $target_path = $this->upload_directory . DS . $this->image;

            if (file_exists($target_path)) {
                $this->errors[] = "The file {$this->image} already exists";
                return false;
            }

            if (move_uploaded_file($this->tmp_path, $target_path)) {
                if ($this->create()) {
                    unset($this->tmp_path);
                    return true;
                } else {
                    $this->errors[] = "The file directory probably does not have permission";
                    return false;
                }
            }
        }
    }


public static function attribute() {
    $attributes = [];
    foreach(self::$db_columns as $column) {
      if($column == 'id') { continue; }
      $attributes[$column] = $column;
    }
    return $attributes;
  }

  public static function sanitized_attribute() {
    $sanitized = [];
    foreach(self::attribute() as $key => $value) {
      $sanitized[$key] = self::$database->escape_string($value);
    }
    return $sanitized;
  }

  public static function banner_update($id) {


    $attributes = self::sanitized_attribute();
    $attribute_pairs = [];
    foreach($attributes as $key => $value) {
      $attribute_pairs[] = "{$key}='{$value}'";
    }

    $sql = "UPDATE " . self::$table_name . " SET ";
    $sql .= join(', ', $attribute_pairs);
    $sql .= " WHERE id='" . self::$database->escape_string($id) . "' ";
    $sql .= "LIMIT 1";
    $result = self::$database->query($sql);
    return $result;
  }

  static public function find_by_all()
  {
      $sql = "SELECT * FROM " . self::$table_name . " ";
      $sql .= "order by id desc";
      $result = self::$database->query($sql);
      if (!$result) {
          exit("Database query failed.");
      }

      $object_array = [];
      while ($record = $result->fetch_assoc()) {
          $object_array[] = static::instantiate($record);
      }

      $result->free();

      return $object_array;
  }

  static public function find_by_order()
  {
      $sql = "SELECT * FROM " . self::$table_name . " ";
      $sql .= "WHERE status=1";
      $sql .= "order by id desc";
      $result = self::$database->query($sql);
      if (!$result) {
          exit("Database query failed.");
      }

      $object_array = [];
      while ($record = $result->fetch_assoc()) {
          $object_array[] = static::instantiate($record);
      }

      $result->free();

      return $object_array;
  }

  static public function find_by_eng_language()
  {
      $sql = "SELECT * FROM " . self::$table_name . " ";
      $sql .= "WHERE language='English' AND status = 1 ";
      $sql .= "order by created_at desc";
      $result = self::$database->query($sql);
      if (!$result) {
          exit("Database query failed.");
      }

      $object_array = [];
      while ($record = $result->fetch_assoc()) {
          $object_array[] = static::instantiate($record);
      }

      $result->free();

      return $object_array;
  }

  static public function find_by_bng_language()
  {
      $sql = "SELECT * FROM " . self::$table_name . " ";
      $sql .= "WHERE language='Bengali' AND status = 1 ";
      $sql .= "order by created_at desc";
      $result = self::$database->query($sql);
      if (!$result) {
          exit("Database query failed.");
      }

      $object_array = [];
      while ($record = $result->fetch_assoc()) {
          $object_array[] = static::instantiate($record);
      }

      $result->free();

      return $object_array;
  }

  static public function find_by_language_banner($name)
  {
      $sql = "SELECT * FROM " . self::$table_name . " ";
      $sql .= "WHERE language='" . self::$database->escape_string($name) ."'";
      $sql .="order by created_at desc";
      $result = self::$database->query($sql);
      if (!$result) {
          exit("Database query failed.");
      }
      $object_array = [];
      while ($record = $result->fetch_assoc()) {
          $object_array[] = static::instantiate($record);
      }

      $result->free();

      return $object_array;
  }

  // Banners with no linked counterpart in the other language yet, plus
  // (when editing) whichever banner is currently linked via $current_group_id -
  // used to populate the "link with" dropdown so an image only has to be
  // uploaded once and is then shared by both languages.
  static public function find_linkable($language, $current_group_id = null)
  {
      $group_id_val = (int) $current_group_id;
      $sql = "SELECT b.* FROM " . self::$table_name . " b ";
      $sql .= "WHERE b.language='" . self::$database->escape_string($language) . "' ";
      $sql .= "AND ( NOT EXISTS (SELECT 1 FROM " . self::$table_name . " b2 WHERE b2.group_id = b.group_id AND b2.id != b.id) ";
      $sql .= "OR b.group_id = " . $group_id_val . " ) ";
      $sql .= "ORDER BY b.created_at DESC";
      $result = self::$database->query($sql);
      if (!$result) {
          exit("Database query failed.");
      }
      $object_array = [];
      while ($record = $result->fetch_assoc()) {
          $object_array[] = static::instantiate($record);
      }

      $result->free();

      return $object_array;
  }

  static public function find_by_group($group_id, $exclude_id = null)
  {
      $sql = "SELECT * FROM " . self::$table_name . " ";
      $sql .= "WHERE group_id='" . self::$database->escape_string($group_id) . "' ";
      if ($exclude_id) {
          $sql .= "AND id != '" . self::$database->escape_string($exclude_id) . "' ";
      }
      $result = self::$database->query($sql);
      if (!$result) {
          exit("Database query failed.");
      }
      $object_array = [];
      while ($record = $result->fetch_assoc()) {
          $object_array[] = static::instantiate($record);
      }

      $result->free();

      return $object_array;
  }

  // How many other banners still point at this same image file - used before
  // deleting the physical file so a linked counterpart isn't left broken.
  public static function count_using_image($image, $exclude_id)
  {
      $sql = "SELECT COUNT(*) AS total FROM " . static::$table_name . " ";
      $sql .= "WHERE image='" . self::$database->escape_string($image) . "' ";
      $sql .= "AND id != '" . self::$database->escape_string($exclude_id) . "'";
      $result = self::$database->query($sql);
      if (!$result) {
          exit("Database query failed.");
      }
      $row = $result->fetch_assoc();
      return (int) $row['total'];
  }

  public static function set_group($id, $group_id)
  {
      $sql = "UPDATE " . static::$table_name . " ";
      $sql .= "SET group_id='" . self::$database->escape_string($group_id) . "' ";
      $sql .= "WHERE id='" . self::$database->escape_string($id) . "'";
      return self::$database->query($sql);
  }

  // Links two banners (one per language) into the same group so they share
  // one image. Re-uses either side's existing group so linking never
  // orphans a banner that was already paired. Returns the resulting group id.
  public static function link($id_a, $id_b)
  {
      $a = static::find_by_id($id_a);
      $b = static::find_by_id($id_b);
      if (!$a || !$b) {
          return false;
      }

      $group_id = !empty($a->group_id) ? $a->group_id : (!empty($b->group_id) ? $b->group_id : $a->id);

      self::set_group($a->id, $group_id);
      self::set_group($b->id, $group_id);

      return $group_id;
  }

  // Removes a banner from its group (puts it back into a group of its own).
  public static function unlink($id)
  {
      return self::set_group($id, $id);
  }

  // Propagates an updated image to every other banner sharing the group,
  // so the two languages always show the same picture.
  public static function sync_image_to_group($group_id, $image, $exclude_id = null)
  {
      if (empty($group_id)) {
          return false;
      }
      $sql = "UPDATE " . static::$table_name . " ";
      $sql .= "SET image='" . self::$database->escape_string($image) . "' ";
      $sql .= "WHERE group_id='" . self::$database->escape_string($group_id) . "' ";
      if ($exclude_id) {
          $sql .= "AND id != '" . self::$database->escape_string($exclude_id) . "' ";
      }
      return self::$database->query($sql);
  }

  public static function disable_banner($id)
  {
      $sql = "UPDATE " . static::$table_name . " ";
      $sql .= "SET status=0";
      $sql .= " WHERE id='" . self::$database->escape_string($id) . "'";
      $result_set = self::$database->query($sql);
      return $result_set;
  }

  public static function enable_banner($id)
  {
      $sql = "UPDATE " . static::$table_name . " ";
      $sql .= "SET status=1";
      $sql .= " WHERE id='" . self::$database->escape_string($id) . "'";
      $result_set = self::$database->query($sql);
      return $result_set;
  }

  public static function delete_banner($id)
  {
      $sql = "DELETE FROM " . static::$table_name . " ";
      $sql .= "WHERE id='" . self::$database->escape_string($id) . "' ";
      $result = self::$database->query($sql);
      return $result;
  }



}

?>
