<?php 

//Jasmeet PHPProject-1  !!

session_start();

            
            require('mysqli_connect.php');
            

            
            

        ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout</title>

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" />

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <style>
    table  {
        font-family: "Times New Roman", Times, serif;
        font-weight: 900;
        border-collapse: collapse;
        width: 40%;
        margin: auto;
    }
    

   
    </style>

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

    <main>

        <form action="checkout.php" method="post">
            <table>
                <tr>
                    <th class="control-label">First Name:</th>
                    <td></td>
                    <td><input type="text" name="firstname" class="form-control" required></td>
                </tr>
                <tr>
                    <th class="control-label">Last Name:</th>
                    <td></td>
                    <td><input type="text" name="lastname" class="form-control" required></td>
                </tr>
                <tr>
                    <th class="control-label">Payment Method:</th>
                    <td></td>
                    <td> <input list="payments" name="payment" class="form-control" required>
                        <datalist id="payments">
                            <option value="Debit" class="form-control">
                            <option value="Credit" class="form-control">
                            <option value="Bitcoin" class="form-control">
                        </datalist>
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td><input type="Submit" value="Pay Now" target="blank"></td>
                    <td></td>
                </tr>
            </table>
        </form>

        
<?php

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    if(empty($_POST['firstname'])){
        echo '<p>Required field- First Name!!</p>';
    }

    if(empty($_POST['lastname'])){
        echo '<p>Required field- Last Name!!</p>';
    }

    if(empty($_POST['payment'])){
        echo '<p>Please Select a Payment Method!!</p>';
    }

    if(!empty($_POST['firstname']) && !empty($_POST['lastname']) && !empty($_POST['payment'])){
        
        $q1 = "INSERT INTO inventoryorder(firstname, lastname, payment, itemID) VALUES('".$_POST['firstname']."', '".$_POST['lastname']."', '".$_POST['payment']."', '".$_SESSION['ItemId']."')"; 

        if ($dbc->query($q1) === TRUE) {
            echo "Payment Successfull!! Row Inserted in the Inventory Table!!";
        } else {
            echo "Error: " . $q1 . "<br>" . $dbc->error;
        }

        $q2 = "UPDATE inventory SET quantity = quantity-1 WHERE itemid=".$_SESSION['ItemId'];
        if ($dbc->query($q2) === TRUE) {
            echo " Quantity decreased!!";
        } else {
            echo "Error: " . $q2 . "<br>" . $dbc->error;
        }
    }
    
}
mysqli_close($dbc);
?>
    </main>

</body>

</html>