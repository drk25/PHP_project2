<?php



class Photo extends Db_object {
	
	
		protected static $db_table = "photos";
		protected static $db_table_fields = array('id', 'title', 'description', 'filename','type','size');
		public $id;
		public $title;
		public $description;
		public $filename;
		public $type;
		public $size;
		
		public $tmp_path;
		public $upload_directory = "images";
		public $errors = array();
		public $upload_errors = array(
		0        => "There is no error",
		1   	 => "The upload file exceeds the upload_max_filesize directive in php.ini",
		2  		 => "The upload file exceeds the MAX_FILE_SIZE directive that was specified in the HTML form",
		3    	 => "The upload file was only partially uploaded.",
		4        => "No file was uploaded.",
		6		 => "Missing a temporary folder.",
		7 		 => "Failed to write file to disk.",
		8	     => "A PHP extension stopped the file upload."
		);
		
//it is passing $_FILES['uploaded_file'] form the form as an argument
public function set_file($file) {
	
	if(empty($file) || !$file || !is_array($file)) {
		$this->errors[] = "There was no file uploaded here.";
		return false;
	}
		//0 = there is no error. 
	 elseif($file['error'] !=0) {
		$this->errors[] = $this->upload_errors[$file['error']];
		return false;
	} else {
		$this->filename = basename($file['name']);
		$this->type     = $file['type'];
		$this->tmp_path = $file['tmp_name'];
		$this->size     = $file['size'];
	}
	
}

public function picture_path () {
	//returns to images/filename
	return $this->upload_directory.DS.$this->filename;
}

	public function save() {
		if($this->id) {
			$this->update();
		} else {
			
			if(!empty($this->errors)) {
				return false;
			}
			if(empty($this->filename) || empty($this->tmp_path)) {
				$this->errors[] = "The file was not available";
				return false;
			}
			//target path  admin/images/filename.jpg
			$target_path = SITE_ROOT . DS . 'admin'. DS . $this->upload_directory . DS . $this->filename;

			if(file_exists($target_path)) {
				$this->errors[] = "The file {$this->filename} already exists.";
				return false;
			}


			if(move_uploaded_file($this->tmp_path, $target_path)) {
				if($this->create()) {
					unset($this->tmp_path);
					return true;
				}
			} else {
				$this->errors[] = "The file directory does not have permission.";
				return false;
			}
		}
}



	public function delete_photo() {

	}
				
	}//end class
?>