<?php 
include 'config.php';

if(isset($_POST['submit']))
{
    $from = $_GET['id'];
    $to = $_POST['to'];
    $amount = $_POST['amount'];

    $sql = "SELECT * from customers where id=$from";
    $query = mysqli_query($con,$sql);
    $sql1 = mysqli_fetch_array($query); 

    $sql = "SELECT * from customers where id=$to";
    $query = mysqli_query($con,$sql);
    $sql2 = mysqli_fetch_array($query);
    
    if (($amount)<0)
    {
?>
    <script type="text/javascript">;
    alert("Please enter appropriate values!");  
    </script>
<?php
   	}

    else if($amount > $sql1['balance']) 
   	{
?>
    <script type="text/javascript">;
    alert("Insufficient Balance!");  
    </script>

<?php
	}

    else if($amount == 0)
   	{
?>
    <script type='text/javascript'>;
    alert('Enter amount greater than 0');
    </script>
<?php
	}

    else {        
        //code to deduct from sender's account
        $newbalance = $sql1['balance'] - $amount;
        $sql = "UPDATE customers set balance=$newbalance where id=$from";
        mysqli_query($con,$sql);         

        //code to add amount in receiver's account.
        $newbalance = $sql2['balance'] + $amount;
        $sql = "UPDATE customers set balance=$newbalance where id=$to";
        mysqli_query($con,$sql);
                
        //code to enter the values in transaction database 
        $sender = $sql1['name'];
        $receiver = $sql2['name'];
        $sql = "INSERT INTO transaction(`sender`, `receiver`, `balance`) VALUES ('$sender','$receiver','$amount')";
        $query=mysqli_query($con,$sql);
?>
        <script>
        alert("Money transferred");
        window.location.href="transactionhistory.php";
        </script>
<?php
    $newbalance= 0;
    $amount = $newbalance;
    }  
}
?>
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
        <br><br>
        <h4 style="font-family: Monospace; text-align: center ;color:white;">From:</h4>
            <?php
                include 'config.php';
                $sid=$_GET['id'];
                $sql = "SELECT * FROM  customers where id=$sid";
                $result=mysqli_query($con,$sql);
                if(!$result)
                {
                    echo "Error : ".$sql."<br>".mysqli_error($con);
                }
                $rows=mysqli_fetch_array($result);
            ?>
            <form method="post" name="tcredit" class="tabletext" ><br>
     
            <div class="center">
            <table class="table responsive">
                <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Balance</th>
                </tr>
                <tr>
                    <td><?php echo $rows['id'] ?></td>
                    <td><?php echo $rows['name'] ?></td>
                    <td><?php echo $rows['email'] ?></td>
                    <td><?php echo $rows['balance'] ?></td>
                </tr>
            </table>
        
        <br><br><br>
        <h4 style="font-family:Monospace; text-align: center ;color:white;">Transfer To:</h4>
        <select name="to" class="form-control" required>
            <option value="" disabled selected>Choose</option>
            <?php
                include 'config.php';
                $sid=$_GET['id'];
                $sql = "SELECT * FROM customers where id!=$sid";
                $result=mysqli_query($con,$sql);
                if(!$result)
                {
                    echo "Error ".$sql."<br>".mysqli_error($con);
                }
                while($rows = mysqli_fetch_assoc($result)) {
            ?>
                <option class="table" value="<?php echo $rows['id'];?>" >
                
                    <?php echo $rows['name'] ;?> (Balance: 
                    <?php echo $rows['balance'] ;?> ) 
               
                </option>
            <?php 
                } 
            ?>
            <div>
        </select>
        <br>
        <br>
        <h4 style="font-family: Monospace; text-align: center ;color:white;">Amount:</h4>
            <input type="number" class="form-control" name="amount" required>   
            <br><br>
                <div class="text-center" >
            <button style="background-color: #2f4f4f; color:#fff; padding: 5px; border-radius: 5px;" name="submit" type="submit" id="myBtn">Transfer</button>
            </div>
        </div>
        </form>
    </div>
</select>
</div>
</form>
</div>
</body>
</html>