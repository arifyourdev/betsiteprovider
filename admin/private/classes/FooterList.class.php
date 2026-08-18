<?php

class FooterList extends DatabaseObject {

  static protected $table_name = "footer_list";
  static protected $db_columns = ['id','language','link_value','link_name'];
  public $id ;
  public $language;
  public $link_value;
  public $link_name; 
   

  public function __construct($args=[]) { 
      $this->language = $args['language'] ?? '';
      $this->link_value = $args['link_value'] ?? '';
      $this->link_name = $args['link_name'] ?? ''; 
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

  public static function contact_update($id) {


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

        
  static public function find_by_order()
  {
      $sql = "SELECT * FROM " . self::$table_name . " ";
      $sql .= "order by id  desc";
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

  static public function find_by_language_footer($name)
  {
      $sql = "SELECT * FROM " . self::$table_name . " ";
      $sql .= "WHERE language='" . self::$database->escape_string($name) ."'";
      $sql .="order by id desc";
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

  
  static public function find_by_eng_footer_lan1()
  {
      $sql = "SELECT * FROM " . self::$table_name . " ";
      $sql .= "WHERE language='English'"; 
      $sql .="order by id desc Limit 6";
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
  
  static public function find_by_eng_footer_lan2()
  {
      $sql = "SELECT * FROM " . self::$table_name . " ";
      $sql .= "WHERE language='English'"; 
      $sql .="order by id asc Limit 6";
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

  static public function find_by_bng_footer_lan1()
  {
      $sql = "SELECT * FROM " . self::$table_name . " ";
      $sql .= "WHERE language='Bengali'"; 
      $sql .="order by id desc Limit 6";
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
  
  static public function find_by_bng_footer_lan2()
  {
      $sql = "SELECT * FROM " . self::$table_name . " ";
      $sql .= "WHERE language='Bengali'"; 
      $sql .="order by id asc Limit 6";
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

  static public function find_by_single_inquiry() {
    $sql = "SELECT * FROM " . static::$table_name . " ";
     $obj_array = static::find_by_sql($sql);
    if(!empty($obj_array)) {
      return array_shift($obj_array);
    } else {
      return false;
    }
  }
 

  public static function delete_inquiry($id)
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