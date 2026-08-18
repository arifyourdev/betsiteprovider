<?php

class Product extends DatabaseObject {
static protected $table_name = "product";
static protected $db_columns = ['id','language','group_id','title','title_url','product_name','product_image','image_alt','page_title','meta_title','meta_detail','details','website_url','web_type','created_at','status'];

public $id;
public $language;
public $group_id;
public $title;
public $title_url; 
public $product_name; 
public $product_image; 
public $image_alt; 
public $page_title;
public $meta_title;
public $meta_detail; 
public $details;
public $website_url;
public $web_type;
public $tmp_path;
public $created_at;
public $status;
public $upload_directory = "images/product";
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
          $this->title = $args['title'] ?? '';
          $this->title_url = $args['title_url'] ?? '';
          $this->product_name = $args['product_name'] ?? '';
          $this->page_title = $args['page_title'] ?? '';
          $this->product_image = $args['product_image'] ?? '';   
          $this->image_alt = $args['image_alt'] ?? '';
          $this->details = $args['details'] ?? '';
          $this->website_url = $args['website_url'] ?? '';
          $this->web_type = $args['web_type'] ?? '';
          $this->meta_title = $args['meta_title'] ?? '';
          $this->meta_detail = $args['meta_detail'] ?? ''; 
          $this->created_at = $args['created_at'] ?? '';
          $this->status = $args['status'] ?? '';
          
    }
      
    public function set_file($file)

    {
        $fileinfo = @getimagesize($file['tmp_name']);
        // $width = $fileinfo[0];
        // $height = $fileinfo[1];
        $allowed_image_extension = array('png','jpg','jfif','jpeg','webp');
        $file_extension = pathinfo($file['name'], PATHINFO_EXTENSION);
  
        if (empty($file) || !$file || !is_array($file)) {
            $this->errors[] = "There was no file uploaded here";
            return false;
        } elseif (!in_array(strtolower($file_extension), $allowed_image_extension)) {
            $this->errors[] = "Upload Valid image Format. Only PNG and JPG are allowed.";
            return false;
        } elseif (($file['size'] > 8000000)) {
            $this->errors[] = "Image size exceeds 8MB";
            return false;
        }
        // elseif ($width < 1900 && $height < 2560) {
        //   $this->errors[] = "Image Dimension should be within 1900 X 2560";
        //   return false;
        // }
        elseif ($file['error'] != 0) {
            $this->errors[] = $this->upload_errors_array[$file['error']];
            return false;
        } else {
            $ext = pathinfo($file['name'], PATHINFO_EXTENSION);
            $rand = rand(1111, 9999);
            $this->product_image = date("YmdHis") . "-" . $rand . "." . $ext;
            $this->tmp_path = $file['tmp_name'];
        }
    }
  
    protected function validate() {
        $this->errors = [];

        if(is_blank($this->web_type)) {
            $this->errors[] = "Web Type cannot be blank.";
        }

        return $this->errors;
    }

    public function picture_path()

    {

        return $this->upload_directory . DS . $this->product_image;
    }
  
    public function save_photo()
  
    {
  
        if ($this->id) {
            // $target_path = SITE_ROOT . DS . 'admin' . DS . $this->upload_directory . DS . $this->product_image;
            $target_path = $this->upload_directory . DS . $this->product_image;
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
  
            if (empty($this->product_image) || empty($this->tmp_path)) {
                $this->errors[] = "The File was not available";
                return false;
            }
  
            if (is_dir($this->upload_directory) == false) {
                mkdir($this->upload_directory, 0700); // Create directory if it does not exist
            }
            // $target_path = SITE_ROOT . DS . 'admin' . DS . $this->upload_directory . DS . $this->product_image;
            $target_path = $this->upload_directory . DS . $this->product_image;
  
            if (file_exists($target_path)) {
                $this->errors[] = "The file {$this->product_image} already exists";
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

  public static function product_update($id) {


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

      // results into objects
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
      $sql .= "WHERE status='Y'";
      $sql .= "order by id desc";
      $result = self::$database->query($sql);
      if (!$result) {
          exit("Database query failed.");
      }

      // results into objects
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
      $sql .= "WHERE language='English' AND status = 'Y'"; 
      $sql .="order by created_at desc";
      $result = self::$database->query($sql);
      if (!$result) {
          exit("Database query failed.");
      }

      // results into objects
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
      $sql .= "WHERE language='Bengali' AND status = 'Y'"; 
      $sql .="order by created_at desc";
      $result = self::$database->query($sql);
      if (!$result) {
          exit("Database query failed.");
      }

      // results into objects
      $object_array = [];
      while ($record = $result->fetch_assoc()) {
          $object_array[] = static::instantiate($record);
      }

      $result->free();

      return $object_array;
  } 
   public static function find_by_page($limit,$per_page)
    {
        $sql = "SELECT * FROM " . self::$table_name . " ";
        $sql .= "where status = 'Y'";
        $sql .= "order by id desc limit $limit,$per_page";
        $result = self::$database->query($sql);
        if (!$result) {
            exit("Database query failed.");
        }

        // results into objects
        $object_array = [];
        while ($record = $result->fetch_assoc()) {
            $object_array[] = static::instantiate($record);
        }

        $result->free();

        return $object_array;
    }

  static public function find_by_tags($tags)
  {
      $sql = "SELECT * FROM " . self::$table_name . " ";
      $sql .= "WHERE tags LIKE '%$tags%' AND status = 'Y' ";
      $result = self::$database->query($sql);
      if (!$result) {
          exit("Database query failed.");
      }

      // results into objects
      $object_array = [];
      while ($record = $result->fetch_assoc()) {
          $object_array[] = static::instantiate($record);
      }

      $result->free();

      return $object_array;
  }

  static public function find_by_name()
  {
      $sql = "SELECT DISTINCT name,seo_url FROM " . self::$table_name . " ";
      $sql .= "WHERE status  = 'Y'";
      $result = self::$database->query($sql);
      if (!$result) {
          exit("Database query failed.");
      }

      // results into objects
      $object_array = [];
      while ($record = $result->fetch_assoc()) {
          $object_array[] = static::instantiate($record);
      }

      $result->free();

      return $object_array;
  }

  static public function find_by_language_product($name)
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

  static public function find_by_recent_product($name)
  {
      $sql = "SELECT * FROM " . self::$table_name . " ";
      $sql .= "WHERE language='" . self::$database->escape_string($name) ."' AND status = 'Y'";
      $sql .="order by created_at desc LIMIT 2";
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


  static public function find_by_author($name)
  {
      $sql = "SELECT * FROM " . self::$table_name . " ";
      $sql .= "WHERE seo_url='" . self::$database->escape_string($name) ."' AND status = 'Y'";
      $sql .="order by id desc";
      $result = self::$database->query($sql);
      if (!$result) {
          exit("Database query failed.");
      }

      // results into objects
      $object_array = [];
      while ($record = $result->fetch_assoc()) {
          $object_array[] = static::instantiate($record);
      }

      $result->free();

      return $object_array;
  }
  
  static public function find_by_recent_product_eng()
  {
      $sql = "SELECT * FROM " . self::$table_name . " ";
      $sql .= "WHERE language='English' AND status='Y'";
      $sql .= "order by created_at desc LIMIT 2";
      $result = self::$database->query($sql);
      if (!$result) {
          exit("Database query failed.");
      }

      // results into objects
      $object_array = [];
      while ($record = $result->fetch_assoc()) {
          $object_array[] = static::instantiate($record);
      }

      $result->free();

      return $object_array;
  }
  // Front-end product listing for the B2B / B2C whitelabel pages - matches
  // web_type ('b2b-whitelabel' or 'b2c-whitelabel') against the site language.
  static public function find_by_web_type($web_type, $language)
  {
      $sql = "SELECT * FROM " . self::$table_name . " ";
      $sql .= "WHERE web_type='" . self::$database->escape_string($web_type) . "' ";
      $sql .= "AND language='" . self::$database->escape_string($language) . "' ";
      $sql .= "AND status='Y' ";
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

  static public function find_by_recent_product_bng()
  {
      $sql = "SELECT * FROM " . self::$table_name . " ";
      $sql .= "WHERE language='Bengali' AND status='Y'";
      $sql .= "order by created_at desc LIMIT 2";
      $result = self::$database->query($sql);
      if (!$result) {
          exit("Database query failed.");
      }

      // results into objects
      $object_array = [];
      while ($record = $result->fetch_assoc()) {
          $object_array[] = static::instantiate($record);
      }

      $result->free();

      return $object_array;
  }

  public static function disable_product($id)
  {
      $sql = "UPDATE " . static::$table_name . " ";
      $sql .= "SET status='N'";
      $sql .= "WHERE id='" . self::$database->escape_string($id) . "'";
      $result_set = self::$database->query($sql);
      return $result_set;
  }
  
  public static function enable_product($id)
  {
      $sql = "UPDATE " . static::$table_name . " ";
      $sql .= "SET status='Y'";
      $sql .= "WHERE id='" . self::$database->escape_string($id) . "'";
      $result_set = self::$database->query($sql);
      return $result_set;
  }
  
  static public function find_by_seo_url($seo_url) {
    $sql = "SELECT * FROM " . static::$table_name . " ";
    $sql .= "WHERE seo_url='" . self::$database->escape_string($seo_url) . "' AND status = 'Y'";
     $obj_array = static::find_by_sql($sql);
    if(!empty($obj_array)) {
      return array_shift($obj_array);
    } else {
      return false;
    }
  }
   
static public function find_by_title_url($title_url,$status) {
    $sql = "SELECT * FROM  " . static::$table_name." ";
    $sql .= "WHERE title_url='" . self::$database->escape_string($title_url) . "' AND language ='" . self::$database->escape_string($status) . "' ";
      $obj_array = static::find_by_sql($sql);
      if(!empty($obj_array)){
          return array_shift($obj_array);
      }
      else{
          return false;
      }
  }  
    

  // Products with no linked counterpart in the other language yet, plus
  // (when editing) whichever product is currently linked via $current_group_id -
  // used to populate the "link with" dropdown so an image only has to be
  // uploaded once and is then shared by both languages.
  static public function find_linkable($language, $current_group_id = null)
  {
      $group_id_val = (int) $current_group_id;
      $sql = "SELECT p.* FROM " . self::$table_name . " p ";
      $sql .= "WHERE p.language='" . self::$database->escape_string($language) . "' ";
      $sql .= "AND ( NOT EXISTS (SELECT 1 FROM " . self::$table_name . " p2 WHERE p2.group_id = p.group_id AND p2.id != p.id) ";
      $sql .= "OR p.group_id = " . $group_id_val . " ) ";
      $sql .= "ORDER BY p.created_at DESC";
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

  // How many other products still point at this same image file - used before
  // deleting the physical file so a linked counterpart isn't left broken.
  public static function count_using_image($image, $exclude_id)
  {
      $sql = "SELECT COUNT(*) AS total FROM " . static::$table_name . " ";
      $sql .= "WHERE product_image='" . self::$database->escape_string($image) . "' ";
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

  // Links two products (one per language) into the same group so they share
  // one image. Re-uses either side's existing group so linking never
  // orphans a product that was already paired. Returns the resulting group id.
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

  // Removes a product from its group (puts it back into a group of its own).
  public static function unlink($id)
  {
      return self::set_group($id, $id);
  }

  // Propagates an updated image to every other product sharing the group,
  // so the two languages always show the same picture.
  public static function sync_image_to_group($group_id, $image, $exclude_id = null)
  {
      if (empty($group_id)) {
          return false;
      }
      $sql = "UPDATE " . static::$table_name . " ";
      $sql .= "SET product_image='" . self::$database->escape_string($image) . "' ";
      $sql .= "WHERE group_id='" . self::$database->escape_string($group_id) . "' ";
      if ($exclude_id) {
          $sql .= "AND id != '" . self::$database->escape_string($exclude_id) . "' ";
      }
      return self::$database->query($sql);
  }

  public static function delete_product($id)
  {
      $sql = "DELETE FROM " . static::$table_name . " ";
      $sql .= "WHERE id='" . self::$database->escape_string($id) . "' ";
      $result = self::$database->query($sql);
      return $result;

      // After deleting, the instance of the object will still
      // exist, even though the database record does not.
      // This can be useful, as in:
      //   echo $user->first_name . " was deleted.";
      // but, for example, we can't call $user->update() after
  }



}

?>