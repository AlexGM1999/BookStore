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
	<div class="container-fluid">
		<nav class="navbar navbar-light justify-content-between">
			<img src="Images/logo.png" id="logo-img" alt="">
		<a href="Store.php"><img src="Images/buzz.png" id="buzz-img" alt=""></a>
			<a href="Admin.php"><img src="Images/key.png" id="key-img"></a>
  		</nav>
	</div>

	<div class="container">
		<div class="row" id="book-info-row">	
			<div class="col-lg-4 col-md-6 mb-4">					
				<img src="Images/firstbook.jpg" id="book-info-pic" alt="">	
				<h3 id="prize">$14.99</h3>				
			</div>
			<div class="col-lg-8 col-md-6 mb-4">
				<p>The Great Gatsby is a 1925 novel written by American author F. Scott Fitzgerald that follows a cast of characters living in the fictional towns of West Egg and East Egg on prosperous Long Island in the summer of 1922. The story primarily concerns the young and mysterious millionaire Jay Gatsby and his quixotic passion and obsession with the beautiful former debutante Daisy Buchanan. Considered to be Fitzgerald's magnum opus, The Great Gatsby explores themes of decadence, idealism, resistance to change, social upheaval and excess, creating a portrait of the Roaring Twenties that has been described as a cautionary tale regarding the American Dream.

				Fitzgerald—inspired by the parties he had attended while visiting Long Island's North Shore—began planning the novel in 1923, desiring to produce, in his words, "something new—something extraordinary and beautiful and simple and intricately patterned." Progress was slow, with Fitzgerald completing his first draft following a move to the French Riviera in 1924. His editor, Maxwell Perkins, felt the book was vague and persuaded the author to revise over the following winter. Fitzgerald was repeatedly ambivalent about the book's title and he considered a variety of alternatives, including titles that referred to the Roman character Trimalchio; the title he was last documented to have desired was Under the Red, White, and Blue.</p>
			</div>

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
							<button type="button" id="addComment"  class="btn btn-primary">Add comment</button>						
						</form>
					</div>
				</div>
			</div>
			<div id="commentSection" class="container tab-pane fade">

			</div>

			<div id="buySection" class="container tab-pine fade">

				<form  id="client-info">
					<div class="form-row">
						<div class="form-group col-md-6">
							<label for="inputEmail4">Name</label>
							<input class="form-control" id="inputName" placeholder="Name">
						</div>
					</div>  
					<div class="form-row">
						<div class="form-group col-md-6">
							<label for="inputEmail4">Phone number</label>
							<input class="form-control" id="phoneNum" placeholder="Phone number">
						</div>
					</div>  
					<div class="form-row">
						<div class="form-group col-md-6">
							<label for="inputAddress">Address</label>
							<input class="form-control" id="inputAddress" placeholder="City->Street->Number">
						</div>
					</div>
					<button id="sendOrder" onclick="order()" class="btn btn-primary">Send order</button>
				</form>
			</div>
		</div>
		
	</body>
	<footer>

	</footer>
	</html>