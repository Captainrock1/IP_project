<?php 
	include('server.php');


  if (!isset($_SESSION['username'])) {
  	$_SESSION['msg'] = "You must login first";
  	header('location: welcome.php');
  }
  if (isset($_GET['logout'])) {
  	session_destroy();
  	unset($_SESSION['username']);
  	header("location: welcome.php");
  }
  if(isset($_SESSION['username'])){
    $username = $_SESSION['username'];
    $userid1 = "SELECT users.id, users.username, users.email FROM users WHERE (((users.username)='$username'));";
    $run_user = mysqli_query($db, $userid1);

    while($userrow = mysqli_fetch_array($run_user)){
      $userid = $userrow['id'];
    }
  }
  if(isset($_POST['booking'])){
    $roomid = $_POST['roomid'];
    $userid = $_POST['userid'];
    $bookingnameuser = $_POST['bookingnameuser'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $age = $_POST['age'];
    $gender = $_POST['gender'];
    $checkin = $_POST['checkin'];
    $checkout = $_POST['checkout'];
    $numguests = $_POST['guests'];
    $bookingstatus = $_POST['bookingstatus'];

    $insert_borrow = "INSERT INTO booking (booking_user_name, booking_user_phone, booking_user_address, booking_user_age, booking_user_gender, checkin, checkout, num_group, booking_status, room_id, user_id) VALUES ('$bookingnameuser','$phone', '$address', '$age', '$gender', '$checkin', '$checkout','$numguests', '$bookingstatus','$roomid', '$userid')";
    $update = "UPDATE rooms SET room_status = 1 WHERE room_id = '$roomid'";
    if(mysqli_query($db, $insert_borrow)&&mysqli_query($db, $update)) {
        echo"<script>alert('Booking complete');</script>";
        header('location: bookingdetail.php');
    }
  }
?>
<!DOCTYPE html>
<html>
  <head>
      <title>NextGen Hotel</title>
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
      <link rel="stylesheet" href="css/style.css">
      <script src="https://kit.fontawesome.com/f180d9c23b.js" crossorigin="anonymous"></script>
      <style>
          input[type=text], select {
            width: 100%;
            padding: 12px 20px;
            margin: 8px 0;
            display: inline-block;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
          }
          input[type=date], select {
            width: 100%;
            padding: 12px 20px;
            margin: 8px 0;
            display: inline-block;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
          }
          input[type=radio], select {
            padding: 12px 20px;
            margin: 8px 0;
            display: inline-block;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
          }

          input[type=submit] {
            width: 100%;
            background-color: black;
            color: white;
            padding: 14px 20px;
            margin: 8px 0;
            border: none;
            border-radius: 4px;
            cursor: pointer;
          }

          input[type=submit]:hover {
            background-color: #6D6D6D ;
          }
          .gridspace{
              display: grid;
              grid-template-columns: 500px auto 500px;
              grid-template-rows: auto auto;
              grid-template-areas: 
              'top top top'
              'left mid right';
              grid-row-gap: 5px;
              grid-column-gap: 5px;
              padding-top: 5px;
              padding-right: 5px;
              padding-left: 5px;
              padding-bottom: 5px;
          }
          .top-grid{
              grid-area: top;
          }
          .mid-grid{
              grid-area: mid;
          }
          .left-grid{
              grid-area: left;
          }
          .right-grid{
              grid-area: right;
          }
          .boxcontent{
              background: #000000;
              border: 1px #000000;
              box-sizing: border-box;
              border-radius:  10px 10px 0px 0px;
              padding: 10px;
          }
          .boxcontent1{
              background: #f2f2f2;
              border: 1px #f2f2f2;
              box-sizing: border-box;
              padding: 10px;
          }
          .boxcontent2{
              background: white;
              border: 1px solid rgb(255, 255, 255);
              box-sizing: border-box;
              padding: 10px;
          }
          .headcolor{
            color:white;
          }
          .footers{
   
          left: 0;
          bottom: 0;
        }
      </style>
  </head>

  <body class="bodyimg" action="booking.php" method="get" enctype="multipart/form-data">
    <ul>
      <li><a href="index.php"><i class="fa-solid fa-hotel">&nbsp;&nbsp;Next-Gen Hotel</i></a></li>
      <li style="float:right"><a href="bookingdetail.php"><i class="fa fa-address-book" aria-hidden="true">&nbsp; My Booking</i></a></li>
    </ul>

    <div class="gridspace">
        <div class="left-grid">
        </div>
        
        <div class="mid-grid">
          <div class="boxcontent" align="center">
            <h2 class="headcolor">Booking Information</h2>
          </div>
          <div class="boxcontent1">
            <?php
                    if(isset($_GET['id'])){
                        $room_id = $_GET['id'];

                        $select_posts = "SELECT * FROM rooms WHERE room_id = '$room_id'";
                        
                        $run_posts = mysqli_query($db, $select_posts);

                        while($row = mysqli_fetch_array($run_posts)){

                            $roomid = $row['room_id'];
                            $room_number = $row['room_number'];
                            $room_type = $row['room_type'];
                            $room_floor = $row['room_floor'];
                            $room_price = $row['room_price'];
                            $room_img = $row['room_img'];
                  
                ?>

                  <form method="post" enctype="multipart/form-data">
                      <input type="hidden"  value= 0 name="bookingstatus" readonly="readonly"><br>
                      Room Number :<br>
                      <input type="text"  value="<?php echo $room_number;?>" readonly="readonly" ><br>
                      Room Type :<br>
                      <input type="text"  value="<?php echo $room_type;?>" readonly="readonly"><br>
                      Check-In :
                      <input type="date" name="checkin" required><br>
                      Check-Out :
                      <input type="date" name="checkout" required><br>
                      Name :
                      <input type="text" name="bookingnameuser" required><br>
                      Phone Number:
                      <input type="text" name="phone" required><br>
                      Address:
                      <input type="text" name="address" required><br>
                      Age:
                      <input type="text" name="age" required><br>
                      Gender:&nbsp;&nbsp;
                      <label for="gen1">Male</label>
                      <input type="radio" id="gen1" name="gender" value="Male" required>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                      <label for="gen2">Female</label>
                      <input type="radio" id="gen2" name="gender" value="Female">
                      <br>
                      <br>
                      Number of guests:&nbsp;&nbsp;
                      <label for="guests1">Single</label>
                      <input type="radio" id="guests1" name="guests" value="Single" required>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                      <label for="guests2">Dual</label>
                      <input type="radio" id="guests2" name="guests" value="Dual">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                      <label for="guests3">Family</label>
                      <input type="radio" id="guests3" name="guests" value="Family">
                      <br>
                      <input type="hidden" name="roomid" value="<?php echo $roomid;?>" readonly="readonly"><br>
                      <input type="hidden" name="userid" value="<?php echo $userid;?>" readonly="readonly">
                      <input type="submit" name="booking" value="booking"> <a href="" class="button button1"> &nbsp; <i class="fa fa-reset" aria-hidden="true">Cancel</i></a>
                  </form>

                <?php
                        }
                      }
                ?>
          </div>
        </div>
        <div class="right-grid">
        </div>
    </div>
    <div class="paddingtop"></div>

    <div class="footer footers textfooter ">
        <p>Follow Us</p>
        <a href="https://facebook.com"><i class="fa-brands fa-facebook-square"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;<a href="https://www.instagram.com"><i class="fa-brands fa-instagram-square"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;<a href="https://line.me"><i class="fa-brands fa-line"></i></a>
        <br>

                License by Winai Wongthai
                <br>           
                Hotel Web Design & Online Marketing by NU Members of Internet Programming Subject
                <br>
                Tel +(66 5)583-1423|+(66 5)535-8972
                <br>
                (8:30-17:30 Mon - Sat)
                <br>
                Email:Sales@nextgenhotel.com

    </div>
    </body>
		
</body>
</html>