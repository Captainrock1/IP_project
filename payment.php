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
?>
<html>
    <head>
      <title>NextGen Hotel</title>
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
      <link rel="stylesheet" href="css/style.css">
      <script src="https://kit.fontawesome.com/f180d9c23b.js" crossorigin="anonymous"></script>
      <style>
        
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
          position: fixed;
          left: 0;
          bottom: 0;
        }
        .shadowbox{
          border: 1px solid;
          padding: 10px;
          box-shadow: 5px 10px #888888;
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
            <h2 class="headcolor">My Booking</h2>
          </div>
          <?php
                  if(isset($_GET['id'])){
                     $bookdetail_id = $_GET['id'];

                      $select_book = "SELECT booking.book_id, booking.booking_user_name, booking.checkin,booking.checkout, rooms.room_number, rooms.room_type, rooms.room_price
                      FROM rooms INNER JOIN booking ON rooms.room_id = booking.room_id
                      WHERE (((booking.book_id)='$bookdetail_id'));";
                      
                      $run_posts = mysqli_query($db, $select_book);

                      while($row = mysqli_fetch_array($run_posts)){

        
                          $book_id = $row['book_id'];
                          $booking_user_name = $row['booking_user_name'];
                          $room_number = $row['room_number'];
                          $room_number = $row['room_type'];
                          $room_price = $row['room_price'];
                          $payment_room = $room_price*100;
                          $checkin = $row['checkin'];
                          $checkout = $row['checkout'];
                 
              ?>
              <div class="boxcontent2">
                <div class="shadowbox">
                  Booking ID : <?php echo $book_id;?><br>
                  Name : <?php echo $booking_user_name;?><br>
                  Room Number : <?php echo $room_number;?><br>
                  Room Price : <?php echo $room_price;?><br>
                  Check-in : <?php echo $checkin;?><br>
                  Check-out : <?php echo $checkout;?><br><br>
                  <form name="checkoutForm" method="POST" action="checkout.php">
                <script type="text/javascript" src="https://cdn.omise.co/omise.js"
                    data-key="pkey_test_5re7tj95xci8nzm4wvc"
                    data-image="http://bit.ly/customer_image"
                    data-frame-label="NextGen Hotel"
                    data-button-label="Pay now"
                    data-submit-label="Submit"
                    data-location="no"
                    data-amount="<?php echo $payment_room;?>"
                    data-currency="thb"
                    >
                </script>
                <input type="hidden" name="bookingid" value="<?php echo $book_id;?>">
                <input type="hidden" name="total" value="<?php echo $payment_room;?>">
            </form>
              </div>
              </div>          
                      
              <?php
                      }
                    }
              ?>
        </div>
        <div class="right-grid">
        </div>
    </div>
    <div class="paddingtop"></div>

    <div class="footer textfooter footers">
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
</html>