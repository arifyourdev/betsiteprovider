<?php

class Home extends DatabaseObject {
static protected $table_name = "home_page";
static protected $db_columns = [
    'id', 'language',
    'meta_title', 'meta_description', 'meta_keywords',
    'about_short_title', 'about_title', 'about_description', 'about_image',
    'about_li1', 'about_li2', 'about_li3', 'about_li4',
    'faq_image',
    'faq1_title', 'faq1_description', 'faq2_title', 'faq2_description',
    'faq3_title', 'faq3_description', 'faq4_title', 'faq4_description',
    'faq5_title', 'faq5_description',
];

public $id;
public $language;
public $meta_title;
public $meta_description;
public $meta_keywords;
public $about_short_title;
public $about_title;
public $about_description;
public $about_image;
public $about_li1;
public $about_li2;
public $about_li3;
public $about_li4;
public $faq_image;
public $faq1_title;
public $faq1_description;
public $faq2_title;
public $faq2_description;
public $faq3_title;
public $faq3_description;
public $faq4_title;
public $faq4_description;
public $faq5_title;
public $faq5_description;

// Column names whose images are shared/common between languages.
static protected $image_columns = ['about_image', 'faq_image'];

public $tmp_paths = [];
public $upload_directory = "images/home";
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

    static public function find_by_language($language)
    {
        $sql = "SELECT * FROM " . static::$table_name . " ";
        $sql .= "WHERE language='" . self::$database->escape_string($language) . "' LIMIT 1";
        $obj_array = static::find_by_sql($sql);
        if (!empty($obj_array)) {
            return array_shift($obj_array);
        } else {
            return false;
        }
    }

    // Images are shared across languages - whichever language is being
    // edited, the same file also gets written onto the other language's
    // row so both pages display the same picture.
    public function sync_image_to_other_language($column, $value)
    {
        $sql = "UPDATE " . static::$table_name . " SET ";
        $sql .= "{$column}='" . self::$database->escape_string($value) . "' ";
        $sql .= "WHERE id != '" . self::$database->escape_string($this->id) . "'";
        return self::$database->query($sql);
    }

    // Shared upload validator used for every image field on this page;
    // returns the generated filename or false.
    private function validate_upload($file)
    {
        $allowed_image_extension = array('png', 'jpg', 'jpeg', 'webp');
        $file_extension = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));

        if (empty($file) || !is_array($file)) {
            $this->errors[] = "There was no file uploaded here";
            return false;
        } elseif (!in_array($file_extension, $allowed_image_extension)) {
            $this->errors[] = "Upload Valid image Format. Only PNG, JPG and WEBP are allowed.";
            return false;
        } elseif ($file['size'] > 8000000) {
            $this->errors[] = "Image size exceeds 8MB";
            return false;
        } elseif ($file['error'] != 0) {
            $this->errors[] = $this->upload_errors_array[$file['error']];
            return false;
        }

        $rand = rand(1111, 9999);
        return date("YmdHis") . "-" . $rand . "." . $file_extension;
    }

    // $column must be one of self::$image_columns (e.g. 'about_image', 'faq_image').
    public function set_image($column, $file)
    {
        if (!in_array($column, static::$image_columns)) { return false; }

        $name = $this->validate_upload($file);
        if ($name === false) { return false; }
        $this->$column = $name;
        $this->tmp_paths[$column] = $file['tmp_name'];
        return true;
    }

    public function image_path($column)
    {
        return $this->upload_directory . DS . $this->$column;
    }

    private function move_upload($tmp_path, $filename)
    {
        if (is_dir($this->upload_directory) == false) {
            mkdir($this->upload_directory, 0700, true);
        }
        $target_path = $this->upload_directory . DS . $filename;
        return move_uploaded_file($tmp_path, $target_path);
    }

    // Saves any uploaded images (propagating them to the other language's
    // row, since the images are shared/common) and persists all other
    // fields for this row. Callers should delete the previous image file
    // (via image_path(), captured before the new filename is assigned)
    // themselves - see admin/home.php. This class is update-only: there
    // are always exactly two rows (English and Bengali), so no create()
    // path is used.
    public function save_all()
    {
        foreach ($this->tmp_paths as $column => $tmp_path) {
            if (empty($tmp_path)) { continue; }
            if (!$this->move_upload($tmp_path, $this->$column)) {
                $this->errors[] = "Failed to upload the {$column} image.";
                return false;
            }
            $this->sync_image_to_other_language($column, $this->$column);
        }

        $this->tmp_paths = [];

        return $this->save();
    }

}

?>
