<?php 
	include('../server.php');


  if (!isset($_SESSION['username'])) {
  	$_SESSION['msg'] = "You must login first";
  	header('location: ../welcome.php');
  }
  if (($_SESSION['role']!=1) AND ($_SESSION['role']!=2)) {
    $_SESSION['msg'] = "You must login first";
    header('location: ../index.php');
}
  if (isset($_GET['logout'])) {
  	session_destroy();
  	unset($_SESSION['username']);
  	header("location: ../welcome.php");
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
          .status {
    color: #00ccff; 
    background: #dff0d8; 
    border: 1px solid #00ccff;  
    margin-bottom: 20px;
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
          <div class="left-grid">
            <div class="boxcontent1" align="center">
                <h2 class="headcolor">Menu</h2>
            </div>
            <div class="boxcontent1" align="center">
            <a href="Booking_income.php"><button class="buttonG buttonGS">Booking Income</button></a>
                <a href="Booking_list.php"><button class="buttonG buttonGS">Booking List</button></a>
                <a href="Booking_statics.php"><button class="buttonG buttonGS">Booking Statistics</button></a>
                <a href="Booking_statics2.php"><button class="buttonG buttonGS">Booking Statistics 2</button></a>
                <a href="Room_list.php"><button class="buttonG buttonGS">Room List</button></a>
                <a href="StaffAndCustomer_list.php"><button class="buttonG buttonGS">Staff and Customer List</button></a>
            </div>
        </div>

          <div class="mid-grid">
            <div class="boxcontent" align="center">
              <h2 class="headcolor">Welcome</h2>
            </div>
            <div class="boxcontent2">
                <!-- notification message -->
  	      <?php if (isset($_SESSION['success'])) : ?>
          <div class="error success" >
      	    <h3>
              <?php 
          	    echo $_SESSION['success']; 
          	    unset($_SESSION['success']);
              ?>
      	    </h3>
          </div>
          <?php endif ?>
          <!-- logged in user information -->
          <?php  if (isset($_SESSION['username'])) : ?>
    	    <p style="color: black;">Welcome <strong><?php echo $_SESSION['username']; ?></strong></p>
          <?php endif ?>
          <div class="error status">You can access to edit the
            <?php if (($_SESSION['role']) == 1 Or $_SESSION['role'] == 2) : ?>
            <?php
            $status = $_SESSION['role'];
            $user_check_query = "SELECT * FROM roleuser WHERE role_id ='$status'";
            $result = mysqli_query($db, $user_check_query);
            $user = mysqli_fetch_assoc($result);
            if ($user) {
            ?>
            <strong><h3><?php echo $user['role_name'];?></h3></strong>
            <?php
            }
            ?>
            <?php endif ?>
            Magement System</p></div>
        </div>

        <div class="right-grid">
        </div>
</div>
    </div>
    <div class="paddingtop"></div>
	</body>
</html>