<!DOCTYPE html>
<html>
  <head>
    <title>Car Booking Form</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    <style>
      html, body {
      min-height: 100%;
      }
      body, div, form, input, select, textarea, p { 
      padding: 0;
      margin: 0;
      outline: none;
      font-family: Roboto, Arial, sans-serif;
      font-size: 14px;
      color: #666;
      line-height: 22px;
      }
      h1 {
      position: absolute;
      margin: 0;
      font-size: 36px;
      color: #fff;
      z-index: 2;
      }
      .testbox {
      display: flex;
      justify-content: center;
      align-items: center;
      height: inherit;
      padding: 20px;
      }
      form {
      width: 100%;
      padding: 20px;
      border-radius: 6px;
      background: #fff;
      box-shadow: 0 0 20px 0 #333; 
      }
      .banner {
      position: relative;
      height: 210px;
      background-image: url("/uploads/media/default/0001/02/328c356e9bba5add698e405d0059aa4207d8f1f6.jpeg");      background-size: cover;
      display: flex;
      justify-content: center;
      align-items: center;
      text-align: center;
      }
      .banner::after {
      content: "";
      background-color: rgba(0, 0, 0, 0.4); 
      position: absolute;
      width: 100%;
      height: 100%;
      }
      input, textarea, select {
      margin-bottom: 10px;
      border: 1px solid #ccc;
      border-radius: 3px;
      }
      input {
      width: calc(100% - 10px);
      padding: 5px;
      }
      select {
      width: 100%;
      padding: 7px 0;
      background: transparent;
      }
      textarea {
      width: calc(100% - 12px);
      padding: 5px;
      }
      .item:hover p, .item:hover i, .question:hover p, .question label:hover, input:hover::placeholder {
      color: #333;
      }
      .item input:hover, .item select:hover, .item textarea:hover {
      border: 1px solid transparent;
      box-shadow: 0 0 6px 0 #333;
      color: #333;
      }
      .item {
      position: relative;
      margin: 10px 0;
      }
      input[type="date"]::-webkit-inner-spin-button {
      display: none;
      }
      .item i, input[type="date"]::-webkit-calendar-picker-indicator {
      position: absolute;
      font-size: 20px;
      color: #a9a9a9;
      }
      .item i {
      right: 1%;
      top: 30px;
      z-index: 1;
      }
      [type="date"]::-webkit-calendar-picker-indicator {
      right: 0;
      z-index: 2;
      opacity: 0;
      cursor: pointer;
      }
      input[type="time"]::-webkit-inner-spin-button {
      margin: 2px 22px 0 0;
      }
      input[type=radio], input.other {
      display: none;
      }
      label.radio {
      position: relative;
      display: inline-block;
      margin: 5px 20px 10px 0;
      cursor: pointer;
      }
      .question span {
      margin-left: 30px;
      }
      label.radio:before {
      content: "";
      position: absolute;
      top: 2px;
      left: 0;
      width: 15px;
      height: 15px;
      border-radius: 50%;
      border: 2px solid #ccc;
      }
      #radio_5:checked ~ input.other {
      display: block;
      }
      input[type=radio]:checked + label.radio:before {
      border: 2px solid #444;
      background: #444;
      }
      label.radio:after {
      content: "";
      position: absolute;
      top: 7px;
      left: 5px;
      width: 7px;
      height: 4px;
      border: 3px solid #fff;
      border-top: none;
      border-right: none;
      transform: rotate(-45deg);
      opacity: 0;
      }
      input[type=radio]:checked + label:after {
      opacity: 1;
      }
      .btn-block {
      margin-top: 10px;
      text-align: center;
      }
      button {
      width: 150px;
      padding: 10px;
      border: none;
      border-radius: 5px; 
      background: #444;
      font-size: 16px;
      color: #fff;
      cursor: pointer;
      }
      button:hover {
      background: #666;
      }
      @media (min-width: 568px) {
      .name-item, .city-item {
      display: flex;
      flex-wrap: wrap;
      justify-content: space-between;
      }
      .name-item input, .city-item input {
      width: calc(50% - 20px);
      }
      .city-item select {
      width: calc(50% - 8px);
      }
      }
    </style>
  </head>
  <body>
    <!-- PHP Here -->
    <?php require 'connect.php'; ?>
    <?php 
      $name = $email = $phone = $number = $strAddress = $city = $region = $postal = $country = $vehicle = $date = $time = $note = "";
      $nameErr = $emailErr = $phoneErr = $numberErr = $strAddressErr = $cityErr = $regionErr = $postalErr = $countryErr = $vehicleErr = $dateErr = $timeErr = $noteErr = "";
    ?>
    <?php 
      if(isset($_POST['submit'])){
        
        $name = $_POST['Last'].' '.$_POST['First'];
        $email = $_POST['Email'];
        $phone = $_POST['Phone'];
        $number = $_POST['numberofPassengers'];
        $strAddress = $_POST['strAddress'];
        $city = $_POST['City'];
        $region = $_POST['Region'];
        $postal = $_POST['Postal'];
        $country = $_POST['Country'];
        $vehicle = $_POST['vehicle'];
        $date = $_POST['date'];
        $time = $_POST['time'];
        $note = $_POST['note'];

        if($conn -> query("INSERT INTO infor (Name, Email, Phone, NumberofPassengers, StreetAddress, City, Region, Postal, Country, Vehicle, PickupDate, PickupTime, Notes) 
        VALUES (N'$name' ,N'$email' ,N'$phone' ,N'$number' ,N'$strAddress' ,N'$city' ,N'$region' ,N'$postal' ,N'$country',N'$vehicle' ,N'$date' ,N'$time' ,N'$note')")) {
          echo "<script>alert('Success!')</script>";

        }else{
          echo "<script>alert('Failed!')</script>";
        }
      }
      $conn -> close();
    ?>
    <div class="testbox">
      <form action="" method="post">
        <div class="banner">
          <h1>Car Booking Form</h1>
        </div>
        <div class="item">
          <p>Name</p>
          <div class="name-item">
            <input type="text" name="First" placeholder="First" required />
            <input type="text" name="Last" placeholder="Last" required/>
          </div>
        </div>
        <div class="item">
          <p>Email</p>
          <input type="email" name="Email" placeholder="Your Email" required/>
        </div>
        <div class="item">
          <p>Phone</p>
          <input type="number" name="Phone" required/>
        </div>
        <div class="item">
          <p>Number of Passengers</p>
          <input type="number" name="numberofPassengers" required/>
        </div>
        <div class="item">
          <p>Contact Address</p>
          <input type="text" name="strAddress" placeholder="Street address" />
          <div class="city-item">
            <input type="text" name="City" placeholder="City" />
            <input type="text" name="Region" placeholder="Region" />
            <input type="number" name="Postal" placeholder="Postal / Zip code" />
            <select name="Country" required>
              <option value="">Country</option>
              <option value="Russia">Russia</option>
              <option value="Germany">Germany</option>
              <option value="France">France</option>
              <option value="USA">USA</option>
              <option value="VietNam">VietNam</option>
            </select>
          </div>
        </div>
        <div class="question" >
          <p>Vehicle</p>
          <div class="question-answer"  >
            <div>
              <input type="radio" value="Limousine (8-12 person)" id="radio_1" name="vehicle" required   />
              <label for="radio_1" class="radio"><span>Limousine (8-12 person)</span></label>
            </div>
            <div>
              <input type="radio" value="SUV (6-7 person)" id="radio_2" name="vehicle"   />
              <label for="radio_2" class="radio"><span>SUV (6-7 person)</span></label>
            </div>
            <div>
              <input type="radio" value="Van (12-15 person)" id="radio_3" name="vehicle"   />
              <label for="radio_3" class="radio"><span>Van (12-15 person)</span></label>
            </div>
            <div>
              <input type="radio" value="Bus (50+ person)" id="radio_4" name="vehicle"   />
              <label for="radio_4" class="radio"><span>Bus (50+ person)</span></label>
            </div>
            
          </div>
        </div>
        <div class="item">
          <p>Pick Up Date</p>
          <input type="date" name="date" required />
          <i class="fas fa-calendar-alt"></i>
        </div>
        <div class="item">
          <p>Pick Up Time</p>
          <input type="time" name="time" required />
          <i class="fas fa-clock"></i>
        </div>
        
        <div class="item">
          <p>Notes</p>
          <textarea rows="3" name="note"></textarea>
        </div>
        <div class="btn-block">
          <button type="submit" name="submit" >SEND</button>
        </div>
      </form>
    </div>
    
  </body>
</html>