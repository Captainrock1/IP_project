<?php 
	include('../server.php');


  if (!isset($_SESSION['username'])) {
  	$_SESSION['msg'] = "You must login first";
  	header('location: welcome.php');
  }
  if (($_SESSION['role']!=1) AND ($_SESSION['role']!=2)) {
    $_SESSION['msg'] = "You must log in first";
    header('location: index.php');
}
  if (isset($_GET['logout'])) {
  	session_destroy();
  	unset($_SESSION['username']);
  	header("location: welcome.php");
  }
?>
<!DOCTYPE html>
<html>
<head>
      <title>NextGen Hotel</title>
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
      <link rel="stylesheet" href="../css/style.css">
      <link rel="stylesheet" href="../css/manager_style.css">
      <script src="https://kit.fontawesome.com/f180d9c23b.js" crossorigin="anonymous"></script>
      <style>
        
          .gridspace{
              display: grid;
              grid-template-columns: 500px auto 500px;
              grid-template-rows: auto auto;
              grid-template-areas: 
              'top top top'
              'left mid mid';
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

              background: #000000;
              border: 1px #000000;
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
          position: fixed;
          left: 0;
          bottom: 0;
        }
        .fontstyle{
            font-size: 25px;
            color:#708FFF;
        }
        .boxcontent3{
              background: black;
              border: 1px #000000;
              box-sizing: border-box;
              padding: 10px;
              height: 454px;
           
          }
      </style>
  </head>

  <body class="bodyimg">
    <ul>
        <li><a href="index.php"><i class="fa-solid fa-hotel">&nbsp;&nbsp;Next-Gen Hotel</i></a></li>
        <li style="float:right"><a href="index.php?logout='1'" class="active" style="text-decoration: none;"><i class="fa fa-user" aria-hidden="true">&nbsp; Logout</i></a></li>
        <li style="float:right"><a href="../index.php"><i class="fa fa-address-book" aria-hidden="true">&nbsp; Reservation</i></a></li>

    </ul>

    <div class="gridspace">
        <header class="top-grid">
        </header>

        <div class="mid-grid">
          <div class="boxcontent" align="center">
            <h2 class="headcolor">All Rooms</h2>
          </div>
          <?php
            $show_dbroom = "SELECT * FROM rooms";
            $run_query = mysqli_query($db, $show_dbroom);
            while($search_row = mysqli_fetch_array($run_query)){
              $room_id = $search_row['room_id'];
              $room_number = $search_row['room_number'];
              $room_type = $search_row['room_type'];
              $room_floor = $search_row['room_floor'];
              $room_price = $search_row['room_price'];
              $room_status = $search_row['room_status'];
            
          ?>
              <div class="boxcontent2">
                <div class="gridcard cardborder">
                <div class="img-grid cardborder">
                <img src="../img/room1.jpg" class="roomimg" >
              </div>
              <div class="detail-grid cardborder">
                <p class="p">Floor Number : <?php echo $room_floor;?></p>
                <p class="p">Room Number : <?php echo $room_number;?></p>
                <p class="p">Room Type : <?php echo $room_type;?></p>
              </div>
              <div class="detail2-grid cardborder">
              <p class="p">Room Price : <?php echo $room_price;?></p>
              <?php
                if($room_status == 1){
              ?>
                <br>
                <br>
                <input type="submit" value="Can't Booking" class="submitbtn">
              <?php
                }
              ?>
              <?php
                if($room_status == 0){
              ?>
                <br>
                <br>
                <a href="../booking.php?id=<?php echo $room_id?>"><input type="submit" value="Booking" class="submitbtn"></a>
              <?php
                }
              ?>
              </div>
            </div>
          </div>
          <?php
            }
          ?>    
        </div>

        <div class="left-grid">
            <div class="boxcontent1" align="center">
                <h2 class="headcolor">Menu</h2>
            </div>
            <div class="boxcontent3" align="center">
            <a href="Booking_income.php"><button class="buttonG buttonGS">Booking Income</button></a>
                <a href="Booking_list.php"><button class="buttonG buttonGS">Booking List</button></a>
                <a href="Booking_statics.php"><button class="buttonG buttonGS">Booking Statistics</button></a>
                <a href="Booking_statics2.php"><button class="buttonG buttonGS">Booking Statistics 2</button></a>
                <a href="Room_list.php"><button class="buttonG buttonGS">Room List</button></a>
                <a href="StaffAndCustomer_list.php"><button class="buttonG buttonGS">Staff and Customer List</button></a>
            </div>
        </div>

    </div>
    <div class="paddingtop"></div>
    <div class="footer textfooter ">
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