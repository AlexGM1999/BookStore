<?php
error_reporting(E_ALL ^ E_NOTICE);
session_start();
$mysqli=new mysqli('localhost','root','','store') or die(mysqli_error($mysqli));

$book_id=0;
$book_name='';
$book_prize='';
$book_description_1='';
$book_description_2='';
$book_picture='';
$update=false;

if(isset($_POST['addBook']))
{
	$book_name=$_POST['book_name'];
	$book_description_1=$_POST['book_description_1'];
	$book_description_2=$_POST['book_description_2'];
	$book_prize=$_POST['book_prize'];

	if (isset($_FILES['book_picture']) && $_FILES['book_picture']['error'] === UPLOAD_ERR_OK)
	{
		$fileTmpPath = $_FILES['book_picture']['tmp_name'];
		$fileName = $_FILES['book_picture']['name'];
		$fileSize = $_FILES['book_picture']['size'];
		$fileType = $_FILES['book_picture']['type'];
		$fileNameCmps = explode(".", $fileName);
		$fileExtension = strtolower(end($fileNameCmps));
		$newFileName = md5(time() . $fileName) . '.' . $fileExtension;
		$allowedfileExtensions = array('jpg', 'gif', 'png', 'zip', 'txt', 'xls', 'doc');
		if (in_array($fileExtension, $allowedfileExtensions)) {
			$uploadFileDir = './uploads/';
			$dest_path = $uploadFileDir . $newFileName;

			if(move_uploaded_file($fileTmpPath, $dest_path))
			{
				$message ='File is successfully uploaded.';
			}
			else
			{
				$message = 'There was some error moving the file to upload directory. Please make sure the upload directory is writable by web server.';
			}
		}

		$mysqli->query("INSERT INTO books (book_name,book_description_1,book_description_2,book_prize,book_picture) VALUES ('$book_name','$book_description_1','$book_description_2','$book_prize','$fileTmpPath')") or  die($mysqli->error);

		$_SESSION['message']="Book has been added successfully";
		$_SESSION['msg_type']="success";


	}
}

	if (isset($_GET['delete']))
	{
		$id=$_GET['delete'];
		$mysqli->query("DELETE FROM books WHERE book_id=$id") or die($mysqli->error);
		$_SESSION['message']="Book has been deleted successfully";
		$_SESSION['msg_type']="danger";
		header("location:Admin.php");
	}

	if (isset($_GET['deleteDelivery']))
	{
		$id=$_GET['deleteDelivery'];
		$mysqli->query("DELETE FROM shipping_details WHERE delivery_id=$id") or die($mysqli->error);
		$_SESSION['message']="Delivery has been deleted successfully";
		$_SESSION['msg_type']="danger";
		header("location:Admin.php");
	}


	if(isset($_POST['update']))
	{
		$book_id=$_POST['book_id'];
		$book_name=$_POST['book_name'];
		$book_description_1=$_POST['book_description_1'];
		$book_description_2=$_POST['book_description_2'];
		$book_prize=$_POST['book_prize'];

		if (isset($_FILES['book_picture']) && $_FILES['book_picture']['error'] === UPLOAD_ERR_OK)
		{
			$fileTmpPath = $_FILES['book_picture']['tmp_name'];
			$fileName = $_FILES['book_picture']['name'];
			$fileSize = $_FILES['book_picture']['size'];
			$fileType = $_FILES['book_picture']['type'];
			$fileNameCmps = explode(".", $fileName);
			$fileExtension = strtolower(end($fileNameCmps));
			$newFileName = md5(time() . $fileName) . '.' . $fileExtension;
			$allowedfileExtensions = array('jpg', 'gif', 'png', 'zip', 'txt', 'xls', 'doc');
			if (in_array($fileExtension, $allowedfileExtensions)) {
				$uploadFileDir = './uploads/';
				$dest_path = $uploadFileDir . $newFileName;

				if(move_uploaded_file($fileTmpPath, $dest_path))
				{
					$message ='File is successfully uploaded.';
				}
				else
				{
					$message = 'There was some error moving the file to upload directory. Please make sure the upload directory is writable by web server.';
				}
			}
		}

	  $mysqli->query("UPDATE books  SET book_name='$book_name',book_description_1='$book_description_1', book_description_2='$book_description_2',book_prize='$book_prize',book_picture='$fileTmpPath' WHERE book_id=$book_id") or die($mysqli->error);
		
		$_SESSION['message']="Book has been updated successfully";
		$_SESSION['msg_type']="success";
		header("location:Admin.php");

		
		
	}


if(isset($_POST['sendOrder']))
{
	$book_id=$_POST['book_id'];
	var_dump($book_id);
	$customer_name=$_POST['customer_name'];
	$customer_phone=$_POST['customer_phone'];
	$customer_address=$_POST['customer_address'];
	$book_prize=$_POST['book_prize']; 
	$mysqli->query("INSERT INTO shipping_details (book_id,customer_name,customer_phone,customer_address,book_prize) VALUES ('$book_id','$customer_name','$customer_phone','$customer_address','$book_prize')") or  die($mysqli->error);
	
	$_SESSION['message']="Book has been added successfully";
	$_SESSION['msg_type']="success";
	
	

}

?>