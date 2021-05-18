<?php
include_once 'connection.php';
require_once 'process.php';
$query="select * from shipping_details";
$shipping_details=mysqli_query($conn,$query);

$query1="select * from books ";
$books=mysqli_query($conn,$query1);
$mysqli=new mysqli('localhost','root','','store') or die(mysqli_error($mysqli));

$book_description_1=''; 
$book_description_2='';

$update=false;
if(isset($_POST['edit']))
{
	$book_id=$_POST['book_id'];
	$update=true;
	$result=$mysqli->query("SELECT * FROM books WHERE book_id=$book_id") or  die($mysqli->error);

	if($result->num_rows){
		$resultf=$result->fetch_assoc();		
		$book_name=$resultf['book_name'];
		$book_description_1=$resultf['book_description_1'];
		$book_description_2=$resultf['book_description_2'];
		$book_prize=$resultf['book_prize'];
		$book_picture=$resultf['book_picture'];		
	}

}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Book Store</title>
	<link rel="stylesheet" type="text/css" href="CSS/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="CSS/style.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script type="text/javascript" src="JS/bootstrap.min.js"></script>

</head>
<body>
	<div class="container-fluid">
		<nav class="navbar navbar-light bg-light justify-content-between">
			<img src="Images/logo.png" id="logo-img" alt="">
			<a  href="Store.php" class="navbar-brand" id="book-head">Books</a>
		</nav>
	</div>
	<!-- Nav tabs -->
	<ul class="nav nav-tabs" role="tablist">
		<li class="nav-item">
			<a class="nav-link active " data-toggle="tab" href="#tableOfOrders">Orders</a>
		</li>
		<li class="nav-item">
			<a class="nav-link" data-toggle="tab" href="#BookForm">CRUD book</a>
		</li>
	</ul>
	<?php 
	if (isset($_SESSION['message'])):
		?>
		<div class="alert alert-<?=$_SESSION['msg_type']?>">
			<?php 
			echo $_SESSION['message'];
			unset($_SESSION['message']);
			?>
		</div>
	<?php endif ?>
	<div class="tab-content">
		<div id="tableOfOrders" class=" tab-pane active">
			<table id="deliveryTable" class="table table-hover table-condensed">
				<thead>
					<tr>
						<th style="width:30%">BOOK ID</th>
						<th style="width:10%">delivery ID</th>
						<th style="width:20%" class="text-center">Client name</th>
						<th style="width:10%" class="text-center">Client phone</th>
						<th style="width:30%" class="text-center">Client address</th>
						<th style="width:10%"></th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<?php
						while($shipping_rows=mysqli_fetch_assoc($shipping_details))
						{
							?>
							<td data-th="Product">
								<div class="row">
									
									<div class="col-sm-10">

										<h4 class="nomargin"><?php echo $shipping_rows['book_id'];?></h4>
									</div>
								</div>
							</td>
							<td data-th="deliveryid"><?php echo $shipping_rows['delivery_id']; ?></td>
							<td data-th="Client name" class="text-center"><?php echo $shipping_rows['customer_name'];?></td>
							<td data-th="Client phone" class="text-center"><?php echo $shipping_rows['customer_phone'];?></td>
							<td data-th="Client address" class="text-center"><?php echo $shipping_rows['customer_address'];?></td>
							<td> <a href="process.php?deleteDelivery=<?php echo $shipping_rows['delivery_id']; ?>" class="btn btn-danger">X</a></td>


						</tr>
						<?php
					}
					?>
				</tbody>
			</table>
		</div>
		<!--CRUD-->
		<div   id="BookForm" class="container tab-pane fade">
			<form action="process.php" method="POST" enctype="multipart/form-data">
				<div class="form-group">
					<input type="hidden" class="form-control" id="bookId" name="book_id" value="<?php echo $book_id;?>">
				</div>
				<div class="form-group">
					<label for="bookName">Name</label>
					<input type="text" class="form-control" name="book_name"id="bookName" value="<?php echo $book_name;?>"  id="bookName">
				</div>
				<div class="form-group">
					<label for="shortDesc">Short Description</label>
					<textarea class="form-control" rows="3"  name="book_description_1"id="shortDesc"><?php echo $book_description_1;?></textarea>
				</div>
				<div class="form-group">
					<label for="longDesc">Long Description</label>
					<textarea class="form-control" rows="6"name="book_description_2"id="longDesc" ><?php echo $book_description_2;?></textarea>
				</div>
				<div class="form-group">
					<label for="bookPrize">Price</label>
					<input type="text" class="form-control" name="book_prize" id="bookPrize" value="<?php echo $book_prize; ?>">
				</div>
				<div class="form-group">
					<label >Picture</label><br>
					<input type="file" name="book_picture" id="bookPic" value="<?php echo  $book_picture;?>">
				</div>
				<?php
				if ($update==true):
					?>
					<button type="submit" id="update" name="update" class="btn btn-info">Update Book</button>
					<?php else:?>
						<button type="submit" id="addBook" name="addBook" class="btn btn-success">Add Book</button>
					<?php endif; ?>

				</form>
				<table  class="table table-hover table-condensed">
					<thead>
						<tr>
							<th style="width:30%" class="text-center">Picture</th>
							<th style="width:5%">id</th>
							<th style="width:10%">Book name</th>
							<th style="width:10%" class="text-center">Short Description</th>
							<th style="width:20%" class="text-center">Long Description</th>
							<th style="width:10%" class="text-center">Price</th>	
							<th style="width:15%"></th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<?php 
							while($book_rows=$books->fetch_assoc()):

								?>
								<td data-th="Product">
									<div class="row">

										<div class="col-sm-10">

											<h4 class="nomargin"><img src="<?php echo $book_rows['book_picture'];?>"></h4>
										</div>
									</div>
								</td>	
								<td data-th="bookid" class="text-center">
									<?php echo $rows['book_id'];?>
								</td>	
								<td data-th="book name" class="text-center"><?php echo $book_rows['book_name'];?></td>
								<td data-th="desc1" class="text-center"><?php echo $book_rows['book_description_1'];?></td>
								<td data-th="desc2" class="text-center"><?php echo $book_rows['book_description_2'];?></td>
								<td data-th="prize" class="text-center"><?php echo $book_rows['book_prize'];?></td>
								<td>
									<form action="Admin.php" method="POST"> 
										<input type='hidden' name='book_id' value='<?php echo $book_rows['book_id'];?>'>
										<button type="submit" id="edit" name="edit" class="btn btn-info">EDIT</button></form></td>

										<td> <a href="process.php?delete=<?php echo $book_rows['book_id']; ?>" class="btn btn-danger">X</a></td>
									</tr>
									<?php
								endwhile;
								?>
							</div>
						</div>
					</body>
					</html>