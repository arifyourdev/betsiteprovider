<?php

class About extends DatabaseObject {
static protected $table_name = "about_page";
static protected $db_columns = [
    'id', 'language',
    'title', 'meta_title', 'meta_description', 'meta_keywords',
    'breadcrumb_title', 'breadcrumb_image',
    'mv_main_title', 'mv_description', 'mission_title', 'mission_description', 'vision_title', 'vision_description',
    'company_short_title', 'company_main_title', 'company_description', 'company_image',
    'card1_title', 'card1_description', 'card2_title', 'card2_description',
    'card3_title', 'card3_description', 'card4_title', 'card4_description',
];

public $id;
public $language;
public $title;
public $meta_title;
public $meta_description;
public $meta_keywords;
public $breadcrumb_title;
public $breadcrumb_image;
public $mv_main_title;
public $mv_description;
public $mission_title;
public $mission_description;
public $vision_title;
public $vision_description;
public $company_short_title;
public $company_main_title;
public $company_description;
public $company_image;
public $card1_title;
public $card1_description;
public $card2_title;
public $card2_description;
public $card3_title;
public $card3_description;
public $card4_title;
public $card4_description;

public $tmp_path_breadcrumb;
public $tmp_path_company;
public $upload_directory = "images/about";
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

    // Breadcrumb/company images are shared across languages - whichever
    // language is being edited, the same file also gets written onto the
    // other language's row so both pages display the same picture.
    public function sync_image_to_other_language($column, $value)
    {
        $sql = "UPDATE " . static::$table_name . " SET ";
        $sql .= "{$column}='" . self::$database->escape_string($value) . "' ";
        $sql .= "WHERE id != '" . self::$database->escape_string($this->id) . "'";
        return self::$database->query($sql);
    }

    // Shared upload validator used for both the breadcrumb image and the
    // about-company image; returns the generated filename or false.
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

    public function set_breadcrumb_image($file)
    {
        $name = $this->validate_upload($file);
        if ($name === false) { return false; }
        $this->breadcrumb_image = $name;
        $this->tmp_path_breadcrumb = $file['tmp_name'];
        return true;
    }

    public function set_company_image($file)
    {
        $name = $this->validate_upload($file);
        if ($name === false) { return false; }
        $this->company_image = $name;
        $this->tmp_path_company = $file['tmp_name'];
        return true;
    }

    public function breadcrumb_image_path()
    {
        return $this->upload_directory . DS . $this->breadcrumb_image;
    }

    public function company_image_path()
    {
        return $this->upload_directory . DS . $this->company_image;
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
    // (via breadcrumb_image_path()/company_image_path(), captured before
    // the new filename is assigned) themselves - see admin/about.php. This
    // class is update-only: there are always exactly two rows (English and
    // Bengali), so no create() path is used.
    public function save_all()
    {
        if (!empty($this->tmp_path_breadcrumb)) {
            if (!$this->move_upload($this->tmp_path_breadcrumb, $this->breadcrumb_image)) {
                $this->errors[] = "Failed to upload the breadcrumb image.";
                return false;
            }
            $this->sync_image_to_other_language('breadcrumb_image', $this->breadcrumb_image);
        }

        if (!empty($this->tmp_path_company)) {
            if (!$this->move_upload($this->tmp_path_company, $this->company_image)) {
                $this->errors[] = "Failed to upload the about-company image.";
                return false;
            }
            $this->sync_image_to_other_language('company_image', $this->company_image);
        }

        unset($this->tmp_path_breadcrumb);
        unset($this->tmp_path_company);

        return $this->save();
    }

}

?>
