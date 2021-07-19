<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equi="X-UA-Compatible" content="ie=edge">
	<link rel="stylesheet" href="https://www.w3schools.com/w3css/3/w3.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  	<link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:wght@100;300&display=swap" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="style.css">
	<title>Basic Banking System</title>

</head>
<body>
	<div class="navbar">
	<a href="index1.html">Home</a>
	<a href="customer.php">View Customers</a>
	<a href="transfermoney.php">Transfer Money</a>
	<a href="transactionhistory.php">View Transaction History</a>
	<a href="about.html">About Us</a>
    </div>
    <div class="container-fluid">
        <h2 style="text-align: center; font-family: Times New Roman;color:white;"><br><br>Transaction History</h2>
       
       	<div class="main">
		<div class="center">
	    <table class="table responsive">
	        <thead>
	            <tr>
	                <th>Sr No.</th>
	                <th>Sender</th>
	                <th>Receiver</th>
	                <th>Amount</th>
	                <th>Date & Time</th>
	            </tr>
	        </thead>
	        <tbody>
	        <?php
	            include 'config.php';
	            $sql ="select * from transaction";
	            $query =mysqli_query($con, $sql);
	            while($rows = mysqli_fetch_assoc($query))
	            {
	        ?>
	            <tr>
	            <td><?php echo $rows['id']; ?></td>
	            <td><?php echo $rows['sender']; ?></td>
	            <td><?php echo $rows['receiver']; ?></td>
	            <td><?php echo $rows['balance']; ?> </td>
	            <td><?php echo $rows['datetime']; ?> </td>
	                
	        <?php
	            }
	        ?>
	    </tr>
	</tbody>
</table>
</div>

</div>
</div>
</body>
</html>
	   