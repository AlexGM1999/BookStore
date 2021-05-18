<?php
error_reporting(E_ALL ^ E_NOTICE);
include_once 'connection.php';
$query="select book_id, book_name, book_prize, book_description_1, book_picture from books";
$result=mysqli_query($conn,$query);

?>
<!DOCTYPE html>
<html>
<head>
	<title>Book Store</title>
	<link rel="stylesheet" type="text/css" href="CSS/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="CSS/style.css">
</head>
<body>
	<div class="container-fluid">
		<nav class="navbar navbar-light justify-content-between">
			<img src="Images/logo.png" id="logo-img" alt="">
			<img src="Images/feather.png" id="feather-img" alt="">
			<a href="Admin.php"><img src="Images/key.png" id="key-img"></a>
  		</nav>
	</div>

	<header class="py-5 mb-5">
		<div class="container h-100">
			<div class="row h-100 align-items-center">
				<div class="col-lg-12">					
					<h1 style="color:#debade" class="display-4 text-black mt-5 mb-2">A Book For Every Taste</h1>
					<p style="color:#c2f0f0" class="lead mb-5 text-black-50">Find your favourite book</p>
					<img src="Images/logo1.png" id="logo2-img" alt="">
				</div>
			</div>
		</div>
	</header>
	<div class="container">
		<div class="row">	
			<div class="col-lg-4 col-md-6 mb-4">
				<div class="card h-80">
					<a href="FirstBook.php"><img class="card-img-top" src="Images/firstbook.jpg" alt=""></a>
					<div class="card-body">
						<h4 class="card-title">The Great Gatsby</h4>
						<h5>$14.99</h5>
						<p class="card-text"> The story primarily concerns the young and mysterious millionaire Jay Gatsby and his quixotic passion and obsession with the beautiful former debutante Daisy Buchanan. </p>
					</div>
					<div class="card-footer">
						<small class="text-muted">
							<h4>  <a href="FirstBook.php">More info</a></h4>
						</small>
					</div>
				</div>
			</div>
			<div class="col-lg-4 col-md-6 mb-4">
				<div class="card" >
					<a href="SecondBook.html"><img class="card-img-top" src="Images/secondbook.jpg" alt=""></a>
					<div class="card-body">
						<h4 class="card-title">Ulysses</h4>
						<h5>$18.99</h5>
						<p class="card-text">Ulysses chronicles the peripatetic appointments and encounters of Leopold Bloom in Dublin in the course of an ordinary day, 16 June 1904.</p>
					</div>
					<div class="card-footer">
						<small class="text-muted">
							<h4>  <a href="SecondBook.html">More info</a></h4>
						</small>
					</div>
				</div>
			</div>
			<div class="col-lg-4 col-md-6 mb-4">
				<div class="card">
					<a href="ThirdBook.html"><img class="card-img-top" src="Images/thirdbook.jpg" alt=""></a>
					<div class="card-body">
						<h4 class="card-title">Don Quixote</h4>
						<h5>$20.99</h5>
						<p class="card-text">The plot revolves around the adventures of a noble (hidalgo) from La Mancha named Alonso Quixano, who reads so many chivalric romances that he loses his mind.</p>
					</div>
					<div class="card-footer">
						<small class="text-muted">
							<h4>  <a href="ThirdBook.html">More info</a></h4>
						</small>
					</div>
				</div>
			</div>
		</div>  
		<div class="row">      
			<div class="col-lg-4 col-md-6 mb-4">
				<div class="card">
					<a href="ForthBook.html"><img class="card-img-top" src="Images/forthbook.jpeg" alt=""></a>
					<div class="card-body">
						<h4 class="card-title">In Search of Lost Time</h4>
						<h5>$14.99</h5>
						<p class="card-text">In Search of Lost Time follows the narrator's recollections of childhood and experiences into adulthood during late 19th century to early 20th century aristocratic France, while reflecting on the loss of time and lack of meaning to the world.</p>
					</div>
					<div class="card-footer">
						<small class="text-muted">
							<h4>  <a href="ForthBook.html">More info</a></h4>
						</small>
					</div>
				</div>
			</div>
			<div class="col-lg-4 col-md-6 mb-4">
				<div class="card">
					<a href="FifthBook.html"><img class="card-img-top" src="Images/fifthbook.jpg" alt=""></a>
					<div class="card-body">
						<h4 class="card-title">One Hundred Years of Solitude</h4>
						<h5>$24.99</h5>
						<p class="card-text">The Colombian author Gabriel García Márquez tells the multi-generational story of the Buendía family, whose patriarch, José Arcadio Buendía, founded the town of Macondo.</p>
					</div>
					<div class="card-footer">
						<small class="text-muted">
							<h4>  <a href="FifthBook.html">More info</a></h4>
						</small>
					</div>
				</div>
			</div>

			<?php 
			$rows= $result->num_rows;
			if (!$rows)
			{
				echo "No results found";
			}
			else{

				while($books=$result->fetch_assoc()) { 
					?>
					<div class="col-lg-4 col-md-6 mb-4">
						<div class="card h-80">
							<a href="product.php?id=<?php echo $books['book_id']; ?>">
								<?php echo '<img src="uploads/'.$books['book_picture'].'">' ?> </a>
								<div class="card-body">
									<h4 class="card-title" name="title"><?php echo $books['book_name']; ?></h4>
									<h5 name="price"><?php echo $books['book_prize']; ?></h5>
									<p class="card-text" name="shortDesc"> <?php echo $books['book_description_1']; ?> </p>
								</div>
								<div class="card-footer">
									<small class="text-muted">
										<h4>  <a  href="product.php?id=<?php echo $books['book_id']; ?>">More info</a></h4>
									</small>
								</div>
							</div>
						</div>
						<?php
					}
				}
				?>





			</div>
		</div>
	</body>
	<footer>	
		<script type="text/javascript" src="bootstrap.min.js"></script>
		<script type="text/javascript" src="book.js"></script>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

	</footer>
	</html>