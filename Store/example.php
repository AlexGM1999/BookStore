<?php
include_once 'connection.php';
$query="select * from shipping_details";
$result=mysqli_query($conn,$query);

while($rows=mysqli_fetch_assoc($result))
{
	echo "<tr>";
	echo "<td>".$rows['customer_name']."</td"; echo "</tr>";
		echo "<td>".$rows['customer_address']."</td";
	echo "<td>".$rows['customer_phone']."</td";

	
}
?>