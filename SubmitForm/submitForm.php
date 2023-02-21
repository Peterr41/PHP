<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha512-Fo3rlrZj/k7ujTnHg4CGR2D7kSs0v4LLanw2qksYuRlEzO+tcaEPQogQ0KaoGN26/zrn20ImR1DfuLWnOo7aBA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="style.css">
    <title>Print Data from form.html</title>
</head>
<body>
    
    <div class="container">
        <table class="table table-bordered table-striped table-responsive-stack"  id="tableOne">
    
            <center><h1>Car Booking Form</h1></center>
            <thead class="thead-dark">
                <tr>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Phone</th>
                    <th scope="col">Number of Passengers</th>
                    <th scope="col">Contact Address</th>
                    <th scope="col">City</th>
                    <th scope="col">Region</th>
                    <th scope="col">Postal/Zip code</th>
                    <th scope="col">Country</th>
                    <th scope="col">Pick Up Date</th>
                    <th scope="col">Pick Up Time</th>
                    
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><?php echo $_POST["Last"].' '.$_POST["First"] ?> <br></td>
                    <td><?php echo $_POST['Email'] ?></td>
                    <td><?php echo $_POST["Phone"] ?> <br></td>
                    <td><?php echo $_POST["numberofPassengers"] ?></td>
                    <td><?php echo $_POST["strAddress"] ?></td>
                    <td><?php echo $_POST["City"] ?></td>
                    <td><?php echo $_POST["Region"] ?></td>
                    <td><?php echo $_POST["Postal"] ?></td>
                    <td><?php echo $_POST["Country"] ?></td>
                    <td><?php echo $_POST["bdate"] ?></td>
                    <td><?php echo $_POST["btime"] ?></td>
                </tr>
            </tbody>
            
        </table>
    </div>
</body>
</html>