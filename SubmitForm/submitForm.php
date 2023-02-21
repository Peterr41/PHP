<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Print Data from form.html</title>
</head>
<body>
    <div >
        <table>
    
            <center><h1>Car Booking Form</h1></center>
            
            Your Name:<?php echo $_POST["Last"].' '.$_POST["First"] ?> <br>
            Your Email: <input type="text" class="form-control" name="name" value="<?php echo $_POST['Email'] ?>"disabled > <br>
            Your Phone: <?php echo $_POST["Phone"] ?> <br>
            Number of Passengers: <?php echo $_POST["numberofPassengers"] ?> <br>
            Contact Address: <?php echo $_POST["strAddress"] ?> <br>
            City: <?php echo $_POST["City"] ?> <br>
            Region: <?php echo $_POST["Region"] ?> <br>
            Postal/Zip code: <?php echo $_POST["Postal"] ?> <br>
            Country: <?php 
            $country = $_POST["Country"];
            echo $country ?>

            Chose Vehicle: <br>

            Pick Up Date: <?php echo $_POST["bdate"] ?> <br>
            Pick Up Time: <?php echo $_POST["btime"] ?> <br>
        </table>
    </div>
</body>
</html>