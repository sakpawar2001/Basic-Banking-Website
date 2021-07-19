<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equi="X-UA-Compatible" content="ie=edge">
	<link rel="stylesheet" href="https://www.w3schools.com/w3css/3/w3.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  	<link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:wght@100;300&display=swap" rel="stylesheet">
  	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
		<h2 style="text-align: center; font-family: Times New Roman;color:white;"><br><br>Transfer Money by clicking the transfer button</h2> 
		<div class="main">
			<div class="center">
				<div class="table-responsive">
					<table>
						<thead>
							<tr>
								<th><b>Sr No.</b></th>
								<th><b>Name</b></th>
								<th><b>Email</b></th>
								<th><b>Balance</b></th>
								<th><b>Transfer</b></th>
							</tr>
						</thead>
						<tbody>
							<?php
								include 'config.php';
								$sqlquery = " select * from customers";
								$query = mysqli_query($con, $sqlquery);
								$nums = mysqli_num_rows($query);
								
								while($result = mysqli_fetch_array($query)){
							?>
							<tr>
								<td><?php echo $result['id']; ?></td>
								<td><?php echo $result['name']; ?></td>
								<td><span class="email-style"><?php echo $result['email']; ?></span> </td>
								<td><?php echo $result['balance']; ?></td>
								<td><a href="transfer.php?id= <?php echo $result['id'] ;?>"><button style="background-color: #2f4f4f; color: white; padding: 6px; border-radius: 5px;">Transfer</button></a></td>
							</tr>

							<?php
								}
							?>
						</tbody>
					</table>
				</div> 	
			</div>
		</div>
	</div>
</body>
</html>