<?php
	include('header.html');

?>

<?php
Error_reporting(E_ALL);
ini_set('display_errors',1);
	
	// get the information from addform_product.html
	$menuname=$_POST['menuName'];
	$menuprice=$_POST['menuPrice'];
	$menucategory=$_POST['menuCategory'];  
	$fileToUpload = $_FILES['fileToUpload']['name'];
	$restaurantid = $_POST['restaurant_id'];
	/// ########## 1.file upload
	$target_dir = "includes/pic/";
	$target_file = $target_dir . basename($_FILES['fileToUpload']['name']);
	$uploadOk = 1;
	$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
	// Check if image file is a actual image or fake image
	if(isset($_POST["submit"])) {
		$check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
		if($check !== false) {
			echo "File is an image - " . $check["mime"] . ".";
			$uploadOk = 1;
		} else {
			echo "File is not an image.";
			$uploadOk = 0;
		}
	}  
	// Check if file already exists
	if (file_exists($target_file)) {
		echo "Sorry, file already exists.";
		$uploadOk = 0;
	}
	// Check file size
	if ($_FILES["fileToUpload"]["size"] > 5000000) {
		echo "Sorry, your file is too large.";
		$uploadOk = 0;
	}
	// Allow certain file formats
	if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
	&& $imageFileType != "gif" ) {
		echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
		$uploadOk = 0;
	}
	// Check if $uploadOk is set to 0 by an error
	if ($uploadOk == 0) {
		echo "Sorry, your file was not uploaded.";
	// if everything is ok, try to upload file
	} else {
		if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
			//echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
		} else {
			echo "Sorry, there was an error uploading your file.";
		}
	}
	
	/// ########## 2.if picture file is saved, then database insert
		// connect 
	if ($uploadOk != 0) {	
		include("connect.php");
		// create query  
		$query="INSERT INTO PRODUCT (product_name, product_price, product_category, product_pic_path, rest_id)
				VALUES('$menuname', $menuprice, '$menucategory', '$target_file', '$restaurantid')";
		// run query
		$result=@mysqli_query($connectData, $query);
		//echo "Error: ".mysqli_error($connectData);
		//echo $result;
	}	   
		// check the result 
		if($result){
			print "New Product is successfully saved.";
		}else{
			print "<h4>Error Occure. ".mysqli_error($connectData)." Please contact with system administrator<h4>";
		}
	
?>
 

