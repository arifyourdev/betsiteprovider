<?php

class Inquiry extends DatabaseObject {

  static protected $table_name = "inquiry";
  static protected $db_columns = ['id','name','email','contact','subject','message','created_at'];
  public $id ;
  public $name;
  public $email;
  public $contact;
  public $subject;
  public $message;
  public $created_at;
   

  public function __construct($args=[]) { 
      $this->name = $args['name'] ?? '';
      $this->email = $args['email'] ?? '';
      $this->contact = $args['contact'] ?? '';
      $this->subject = $args['subject'] ?? '';
      $this->message = $args['message'] ?? '';
      $this->created_at = $args['created_at'] ?? '';
   }


protected function validate() {
    $this->errors = [];

    if(is_blank($this->name)) {
      $this->errors[] = "Name cannot be blank.";
    } elseif (!has_length($this->name, array('max' => 255))) {
      $this->errors[] = "Name must be less than 255 characters.";
    }

    if(is_blank($this->email)) {
      $this->errors[] = "Email cannot be blank.";
    } elseif (!has_length($this->email, array('max' => 255))) {
      $this->errors[] = "Email must be less than 255 characters.";
    } elseif (!has_valid_email_format($this->email)) {
      $this->errors[] = "Email must be a valid format.";
    }

    if(is_blank($this->contact)) {
      $this->errors[] = "Phone cannot be blank.";
    } elseif (!has_length($this->contact, array('max' => 30))) {
      $this->errors[] = "Phone must be less than 30 characters.";
    }

    if(is_blank($this->message)) {
      $this->errors[] = "Message cannot be blank.";
    }

    return $this->errors;
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