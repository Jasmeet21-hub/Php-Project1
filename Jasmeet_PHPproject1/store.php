<?php
//Jasmeet PHPProject-1  !!

session_start();   // Start the session

require('mysqli_connect.php');
$q="select itemid, item_name from Inventory";
$r = @mysqli_query($dbc, $q);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Store</title>
    <style>
    table {
        font-family: "Times New Roman", Times, serif;
        font-weight: 900;
        border-collapse: collapse;
        width: 40%;
        margin: auto;
    }

    </style>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" />

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

</head>

<body>

    <nav class="navbar navbar-inverse">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand" href="index.html">Iphone Store</a>
            </div>
            <ul class="nav navbar-nav">
                <li><a href="index.html">Home</a></li>
                <li><a href="store.php">Store</a></li>
                <li><a href="">Checkout</a></li>
            </ul>
        </div>
        
    </nav>
    <img src="i8.png"> 
    
    <main>


    <?php
echo "<table><tr><th>Item Id</th> <th>Item Name</th> </tr>";
if (!$dbc) { die('Could Not Connect: ' . mysqli_error($dbc) . mysqli_errno($dbc)); }
$chkRow = mysqli_num_rows($r); 
if($chkRow>0){
while($row = mysqli_fetch_array($r)) {
    
echo '<tr><td>'.$row['itemid'].'</td><td><a href="?session='.$row['itemid'].'" target="blank">'.$row['item_name']."</a></td></tr>";

}
    
}
echo "</table>";
if(isset($_GET['session'])){
  echo $_GET['session'];
  $id=$_GET['session'];
  sessionFunc($id);
}
function sessionFunc($session_var){
  $_SESSION["ItemId"]=$session_var;
  header("Location: checkout.php");
}
mysqli_close($dbc);
?>

    </main>

</body>

</html>