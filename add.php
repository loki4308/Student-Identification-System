<?php
//database connection
include('db.php');

//adding data to the database
if(isset($_POST['submit'])){
	$u_card = $_POST['card_no'];
	$u_phone = $_POST['user_phone'];

	$u_f_name = $_POST['user_first_name'];
	$u_father = $_POST['user_father'];

	$u_email = $_POST['user_email'];
	$u_dept = $_POST['dept'];

	$u_gender = $_POST['user_gender'];
	$u_birthday = $_POST['user_dob'];
	
	$u_address = $_POST['address'];
	
	

	
	//image upload
	$msg = "";
	$image = $_FILES['image']['name'];
	$target = "upload_images/".basename($image);

	if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
  		$msg = "Image uploaded successfully";
  	}else{
  		$msg = "Failed to upload image";
  	}

	
  	$insert_data = "INSERT INTO card_activation(u_card, u_f_name, u_father, u_birthday, u_gender, u_email, u_phone, u_address, dept, image,uploaded) VALUES ('$u_card','$u_f_name','$u_father','$u_birthday','$u_gender','$u_email','$u_phone','$u_address','$u_dept','$image',NOW())";
  	$run_data = mysqli_query($con,$insert_data);

  	if($run_data){
  		header('location:index.php');
  	}else{
  		echo "Data not insert";
  	}

}

?>
