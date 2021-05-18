<?php 
require_once 'process.php';
include_once 'connection.php';
if(!isset($_GET['id']))
{
	exit();
}
$id=htmlspecialchars($_GET['id']);
$query=("SELECT book_id , book_prize, book_description_2 FROM books WHERE book_id=$id LIMIT 1  ") or  die($mysqli->error);
$result=mysqli_query($conn,$query);
$books=$result->fetch_assoc();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Book Store</title>
	<link rel="stylesheet" type="text/css" href="CSS/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="CSS/style.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script type="text/javascript" src="JS/bootstrap.min.js"></script>

	<script type="text/javascript" src="JS/book.js"></script>
</head>
<body>	
	<?php 
			$rows= $result->num_rows;
			if (!$rows)
			{
				echo "No results found";
			}
			else{

			  
					?>
			<div class="container-fluid">
				<nav class="navbar navbar-light justify-content-between">
					<img src="Images/logo.png" id="logo-img" alt="">
					<a href="Store.php"><img src="Images/feather.png" id="feather-img" alt=""></a>
					<a href="Admin.php"><img src="Images/key.png" id="key-img"></a>
				</nav>
			</div>
	<div class="container">
		<div class="row" id="book-info-row">	
			<div class="col-lg-4 col-md-6 mb-4">					
			<?php echo '<img src="uploads/'.$books['book_picture'].'">' ?> 	
				<h3 id="prize" name="book_prize"><?php echo $books['book_prize']; ?></h3>				
			</div>
			<div class="col-lg-8 col-md-6 mb-4">
				<p name='book_description_2'><?php echo $books['book_description_2']; ?></p>
			</div>
<?php } 
		?>
		</div>
		<!-- Nav tabs -->
		<ul class="nav nav-tabs" role="tablist">
			<li class="nav-item">
				<a class="nav-link active " data-toggle="tab" href="#addCommenttab">Comment</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" data-toggle="tab" href="#commentSection">See comments</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" data-toggle="tab" href="#buySection">Buy</a>
			</li>
		</ul>

		<!-- Tab panes -->
		<div class="tab-content">
			<div id="addCommenttab" class="container tab-pane active">
				<div class="panel">
					<h3>What do you think of this book</h3>
					<div class="panel-body">
						<form>
							<div class="form-group">
								<label for="name">Name</label>
								<input type="text" class="form-control" id="name">
								<small id="firstandlast" class="form-text text-muted">First and last name.</small>
							</div>
							<div class="form-group">
								<label for="bodyComment">Comment</label>
								<textarea class="form-control" rows="3" id="bodyComment"></textarea>
							</div>
							<div class="form-group form-check">
								<input type="checkbox" class="form-check-input" id="exampleCheck">
								<label class="form-check-label" for="exampleCheck1">Im not a robot</label>
							</div>
							<button type="button" id="addComment"   class="btn btn-primary">Add comment</button>						
						</form>
					</div>
				</div>
			</div>
			<div id="commentSection" class="container tab-pane fade">

			</div>

			<div id="buySection" class="container tab-pine fade">

				<form  action="process.php" method="POST"id=" client-info">
					<div class="form-row">
						<div class="form-group col-md-6">
							<input name="book_id" type="hidden" value="<?php echo $books['book_id'] ?>">
							<label for="customer_name">Name</label>
							<input name='customer_name' class="form-control" id="inputName" placeholder="Name">
						</div>
					</div>  
					<div class="form-row">
						<div class="form-group col-md-6">
							<label for="customer_phone">Phone number</label>
							<input name='customer_phone' class="form-control" id="phoneNum" placeholder="Phone number">
						</div>
					</div>  
					<div class="form-row">
						<div class="form-group col-md-6">
							<label for="customer_address">Address</label>
							<input id='customer_address' class="form-control" id="inputAddress" placeholder="City->Street->Number">
						</div>
					</div>
					<button id="sendOrder" name='sendOrder' onclick="order()" class="btn btn-primary">Send order</button>
				</form>
			</div>
		</div>
		
	</body>
	<footer>

	</footer>
	</html>