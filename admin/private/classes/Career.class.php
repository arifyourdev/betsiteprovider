<?php

class Career extends DatabaseObject {
static protected $table_name = "career_query";
static protected $db_columns = ['id','name','email','contact','national_id','cvv','created_at'];

public $id; 
public $name;
public $email;
public $contact;
public $national_id;
public $cvv;
public $created_at; 
public $tmp_path;
public $tmp_path2; 
public $upload_directory = "images/career/";
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
          $this->name = $args['name'] ?? ''; 
          $this->email = $args['email'] ?? '';
          $this->contact = $args['contact'] ?? '';
          $this->national_id = $args['national_id'] ?? ''; 
          $this->cvv = $args['cvv'] ?? ''; 
          
    }
      
    public function set_file($file)

    {
        $fileinfo = @getimagesize($file['tmp_name']);
        // $width = $fileinfo[0];
        // $height = $fileinfo[1];
        $allowed_image_extension = array('jpg','jfif','jpeg','webp','svg');
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
            $this->national_id = date("YmdHis") . "-" . $rand . "." . $ext;
            $this->tmp_path = $file['tmp_name'];
        }
    }
  
    public function picture_path()
  
    {
  
        return $this->upload_directory . DS . $this->national_id;
    }
  
    public function save_photo()
  
    {
  
        if ($this->id) {
            // $target_path = SITE_ROOT . DS . 'admin' . DS . $this->upload_directory . DS . $this->national_id;
            $target_path = $this->upload_directory . DS . $this->national_id;
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
  
            if (empty($this->national_id) || empty($this->tmp_path)) {
                $this->errors[] = "The File was not available";
                return false;
            }
  
            if (is_dir($this->upload_directory) == false) {
                mkdir($this->upload_directory, 0700); // Create directory if it does not exist
            }
            // $target_path = SITE_ROOT . DS . 'admin' . DS . $this->upload_directory . DS . $this->national_id;
            $target_path = $this->upload_directory . DS . $this->national_id;
  
            if (file_exists($target_path)) {
                $this->errors[] = "The file {$this->national_id} already exists";
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

  public function set_file2($file)

  {
      $fileinfo = @getimagesize($file['tmp_name']);
    //   $width = $fileinfo[0];
    //   $height = $fileinfo[1];
      $allowed_image_extension = array('jpg','jpeg','jfif','svg','webp');
      $file_extension = pathinfo($file['name'], PATHINFO_EXTENSION);

      if (empty($file) || !$file || !is_array($file)) {
          $this->errors[] = "There was no file uploaded here";
          return false;
      } elseif (!in_array($file_extension, $allowed_image_extension)) {
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
          $this->cvv = date("YmdHis") . "-" . $rand . "." . $ext;
          $this->tmp_path2 = $file['tmp_name'];
      }
  }

  public function picture_path2()

  {

      return $this->upload_directory . DS . $this->cvv;
  }

  public function save_photo2()

  {

      if ($this->id) {
        //   $target_path = SITE_ROOT . DS . 'admin' . DS . $this->upload_directory . DS . $this->cvv;
          $target_path = $this->upload_directory . DS . $this->cvv;
          if (move_uploaded_file($this->tmp_path2, $target_path)) {
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

          if (empty($this->cvv) || empty($this->tmp_path)) {
              $this->errors[] = "The File was not available";
              return false;
          }

          if (is_dir($this->upload_directory) == false) {
            mkdir($this->upload_directory, 0700); // Create directory if it does not exist
        }
        //   $target_path = SITE_ROOT . DS . 'admin' . DS . $this->upload_directory . DS . $this->cvv;
            $target_path = $this->upload_directory . DS . $this->cvv;
          if (file_exists($target_path)) {
              $this->errors[] = "The file {$this->cvv} already exists";
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

  public static function blog_update($id) {


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
      $sql .= "WHERE website_tag LIKE '%$tags%' AND status = 'Y' ";
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
  
  static public function find_by_recent_blog()
  {
      $sql = "SELECT * FROM " . self::$table_name . " ";
      $sql .= "WHERE status='Y'";
      $sql .= "order by created_at desc LIMIT 3";
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
 
  public static function disable_blog($id)
  {
      $sql = "UPDATE " . static::$table_name . " ";
      $sql .= "SET status='N'";
      $sql .= "WHERE id='" . self::$database->escape_string($id) . "'";
      $result_set = self::$database->query($sql);
      return $result_set;
  }
  
  public static function enable_blog($id)
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
    $sql .= "WHERE title_url='" . self::$database->escape_string($title_url) . "' AND status ='" . self::$database->escape_string($status) . "' ";
      $obj_array = static::find_by_sql($sql);
      if(!empty($obj_array)){
          return array_shift($obj_array);
      }
      else{
          return false;
      }
  }  
    

  public static function delete_blog($id)
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