<?php 
session_start();
/**
 * ALTER TABLE products ADD product_qty INT(11) NOT NULL AFTER `product_price`;
 	UPDATE `products` SET product_qty = 1000 WHERE 1;

	CREATE TABLE `products` (
 `product_id` int(100) NOT NULL AUTO_INCREMENT,
 `product_cat` int(11) NOT NULL,
 `product_brand` int(100) NOT NULL,
 `product_title` varchar(255) NOT NULL,
 `product_price` int(100) NOT NULL,
 `product_qty` int(11) NOT NULL,
 `product_desc` text NOT NULL,
 `product_image` text NOT NULL,
 `product_keywords` text NOT NULL,
  CONSTRAINT fk_product_cat FOREIGN KEY fk_product_cat (product_cat) REFERENCES categories(cat_id),
    CONSTRAINT fk_product_brand FOREIGN KEY fk_product_brand (product_brand) REFERENCES brands(brand_id),
 PRIMARY KEY (`product_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1
 	
 */
class Slides
{
	
	private $con;

	function __construct()
	{
		include_once("Database.php");
		$db = new Database();
		$this->con = $db->connect();
	}

	public function getSlides(){
		$q = $this->con->query("SELECT * FROM slides");
		
		$slides = [];
		if ($q->num_rows > 0) {
			while($row = $q->fetch_assoc()){
				$slides[] = $row;
			}
			//return ['status'=> 202, 'message'=> $ar];
			$_DATA['slides'] = $slides;
		}

		return ['status'=> 202, 'message'=> $_DATA];
	}

	public function addSlide($slide_name,$file){
        
		$fileName = $file['name'];
		$fileNameAr= explode(".", $fileName);
		$extension = end($fileNameAr);
		$ext = strtolower($extension);

		if ($ext == "jpg" || $ext == "jpeg" || $ext == "png") {
			
			//print_r($file['size']);

			if ($file['size'] > (1024 * 2)) {
				
				$uniqueImageName = time()."_".$file['name'];
				if (move_uploaded_file($file['tmp_name'], $_SERVER['DOCUMENT_ROOT']."/ecommerce/product_images/".$uniqueImageName)) {
					
					$q = $this->con->query("INSERT INTO `slides`(`slide_title`,`slide_image`) VALUES ('$slide_name', '$uniqueImageName')");

					if ($q) {
						return ['status'=> 202, 'message'=> 'Slide Added Successfully..!'];
					}else{
						return ['status'=> 303, 'message'=> 'Failed to run query'];
					}

				}else{
					return ['status'=> 303, 'message'=> 'Failed to upload image'];
				}

			}else{
				return ['status'=> 303, 'message'=> 'Large Image ,Max Size allowed 2MB'];
			}

		}else{
			return ['status'=> 303, 'message'=> 'Invalid Image Format [Valid Formats : jpg, jpeg, png]'];
		}

	}


	public function editSlideWithImage($pid,
										$slide_name,
										$file){


		$fileName = $file['name'];
		$fileNameAr= explode(".", $fileName);
		$extension = end($fileNameAr);
		$ext = strtolower($extension);

		if ($ext == "jpg" || $ext == "jpeg" || $ext == "png") {
			
			//print_r($file['size']);

			if ($file['size'] > (1024 * 2)) {
				
				$uniqueImageName = time()."_".$file['name'];
				if (move_uploaded_file($file['tmp_name'], $_SERVER['DOCUMENT_ROOT']."/ecommerce/product_images/".$uniqueImageName)) {
					
					$q = $this->con->query("UPDATE `slides` SET 
										`slide_title` = '$slide_name',  
										`slide_image` = '$uniqueImageName'
										WHERE slide_id = '$pid'");
					if ($q) {
						return ['status'=> 202, 'message'=> 'Slide Modified Successfully..!'];
					}else{
						return ['status'=> 303, 'message'=> 'Failed to run query'];
					}

				}else{
					return ['status'=> 303, 'message'=> 'Failed to upload image'];
				}

			}else{
				return ['status'=> 303, 'message'=> 'Large Image ,Max Size allowed 2MB'];
			}

		}else{
			return ['status'=> 303, 'message'=> 'Invalid Image Format [Valid Formats : jpg, jpeg, png]'];
		}

	}

	public function editSlideWithoutImage($pid,
										$slide_name){
		if ($pid != null) {
			$q = $this->con->query("UPDATE `slides` SET 
										`slide_title` = '$slide_name'
										WHERE slide_id = '$pid'");
			if ($q) {
				return ['status'=> 202, 'message'=> 'Slide updated Successfully'];
			}else{
				return ['status'=> 303, 'message'=> 'Failed to run query'];
			}
			
		}else{
			return ['status'=> 303, 'message'=> 'Invalid slide id'];
		}
		
	}





	public function deleteSlide($pid = null){
		if ($pid != null) {
			$q = $this->con->query("DELETE FROM slides WHERE slide_id = '$pid'");
			if ($q) {
				return ['status'=> 202, 'message'=> 'Slide removed from stocks'];
			}else{
				return ['status'=> 202, 'message'=> 'Failed to run query'];
			}
			
		}else{
			return ['status'=> 303, 'message'=>'Invalid slide id'];
		}

	}

	

}


if (isset($_POST['GET_SLIDE'])) {
	if (isset($_SESSION['admin_id'])) {
		$p = new Slides();
		echo json_encode($p->getSlides());
		exit();
	}
}


if (isset($_POST['add_slide'])) {

	extract($_POST);
	if (!empty($slide_name) && !empty($_FILES['slide_image']['name'])) {
		$p = new Slides();
		$result = $p->addSlide($slide_name,
								$_FILES['slide_image']);
		
		header("Content-type: application/json");
		echo json_encode($result);
		http_response_code($result['status']);
		exit();


	}else{
		echo json_encode(['status'=> 303, 'message'=> 'Empty fields']);
		exit();
	}



	
}


if (isset($_POST['edit_slide'])) {

	extract($_POST);
	if (!empty($pid)
	&& !empty($e_slide_name)) {
		$p = new Slides();
		if (isset($_FILES['e_slide_image']['name']) 
			&& !empty($_FILES['e_slide_image']['name'])) {
			$result = $p->editSlideWithImage($pid,
								$e_slide_name,
								$_FILES['e_slide_image']);
		}else{
			$result = $p->editSlideWithoutImage($pid,
								$e_slide_name);
		}

		echo json_encode($result);
		exit();


	}else{
		echo json_encode(['status'=> 303, 'message'=> 'Empty fields']);
		exit();
	}



	
}

if (isset($_POST['DELETE_SLIDE'])) {
	$p = new Slides();
	if (isset($_SESSION['admin_id'])) {
		if(!empty($_POST['pid'])){
			$pid = $_POST['pid'];
			echo json_encode($p->deleteSlide($pid));
			exit();
		}else{
			echo json_encode(['status'=> 303, 'message'=> 'Invalid slide id']);
			exit();
		}
	}else{
		echo json_encode(['status'=> 303, 'message'=> 'Invalid Session']);
	}


}


?>