<?php 
	include('../server.php');

  if (!isset($_SESSION['username'])) {
  	$_SESSION['msg'] = "You must login first";
  	header('location: welcome.php');
  }
  if (($_SESSION['role']!=1)) {

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
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/manager_style.css">
    <script src="https://kit.fontawesome.com/f180d9c23b.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
      <style>

            #container {
                height: 400px;
            }

            .highcharts-data-table table {
                font-family: Verdana, sans-serif;
                border-collapse: collapse;
                border: 1px solid #ebebeb;
                margin: 10px auto;
                text-align: center;
                width: 100%;
                max-width: 500px;
            }

            .highcharts-data-table caption {
                padding: 1em 0;
                font-size: 1.2em;
                color: #555;
            }

            .highcharts-data-table th {
                font-weight: 600;
                padding: 0.5em;
            }

            .highcharts-data-table td,
            .highcharts-data-table th,
            .highcharts-data-table caption {
                padding: 0.5em;
            }

            .highcharts-data-table thead tr,
            .highcharts-data-table tr:nth-child(even) {
                background: #f8f8f8;
            }

            .highcharts-data-table tr:hover {
                background: #f1f7ff;
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
          .headcolor1{
            color:black;
          }
          .footers{
          position: fixed;
          left: 0;
          bottom: 0;
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
            <h2 class="headcolor">Staff and Customer List</h2>
            </div>
            <div class="subgrid" align="left">
                <div class="boxcontent2">
                <h2 class="headcolor2" align="center">CEO</h2>
                <?php
                $user_check_query = "SELECT * FROM users WHERE role_id='1'";
                $result = mysqli_query($db, $user_check_query);
                if($result) {
                    $row_cnt = mysqli_num_rows($result);
                    if($row_cnt) {
                        $row = mysqli_fetch_all($result, MYSQLI_ASSOC);
                        foreach ($row as $rows) {
                            $email = $rows['email'];
                            $id = $rows['id'];
                ?>
                <img src="../img/CEO.jpg" alt="Avatar">
                <div class="cardcontainer">
                <h4><b>No. : </b><?php echo $id; ?></h4> 
                <?php
                            $user_check_query = "SELECT * FROM booking WHERE user_id='$id' LIMIT 1";
                            $result = mysqli_query($db, $user_check_query);
                            if($result) {
                                $row_cnt = mysqli_num_rows($result);
                                if($row_cnt) {
                                    $row = mysqli_fetch_all($result, MYSQLI_ASSOC);
                                    foreach ($row as $rows) {
                ?>
                    <h4><b>Name : </b><?php echo $rows['booking_user_name']; ?></h4>
                    <h4><b>Email : </b><?php echo $email; ?></h4>
                    <h4><b>Phone : </b><?php echo $rows['booking_user_phone']; ?></h4>
                    <h4><b>Address : </b><?php echo $rows['booking_user_address']; ?></h4>
                    <h4><b>Age : </b><?php echo $rows['booking_user_age']; ?></h4>
                    <h4><b>Gender : </b><?php echo $rows['booking_user_gender']; ?></h4>
                    <h4><b>Salary : It depends on the profit sharing received.</b></h4>
                <?php
                                    }
                                }
                            }
                        }
                    }
                }
                ?>
                </div>
                </div>
            <div>
            <div class="subgrid" align="left">
                <div class="boxcontent2">
                <h2 class="headcolor2" align="center">Admin</h2>
                <?php
                $user_check_query = "SELECT * FROM users WHERE role_id='2'";
                $result = mysqli_query($db, $user_check_query);
                if($result) {
                    $row_cnt = mysqli_num_rows($result);
                    if($row_cnt) {
                        $row = mysqli_fetch_all($result, MYSQLI_ASSOC);
                        foreach ($row as $rows) {
                            $email = $rows['email'];
                            $id = $rows['id'];
                ?>
                <img src="../img/Admin.jpg" alt="Avatar">
                <div class="cardcontainer">
                <h4><b>No. : </b><?php echo $id; ?></h4> 
                <?php
                            $user_check_query = "SELECT * FROM booking WHERE user_id='$id' LIMIT 1";
                            $result = mysqli_query($db, $user_check_query);
                            if($result) {
                                $row_cnt = mysqli_num_rows($result);
                                if($row_cnt) {
                                    $row = mysqli_fetch_all($result, MYSQLI_ASSOC);
                                    foreach ($row as $rows) {
                ?>
                    <h4><b>Name : </b><?php echo $rows['booking_user_name']; ?></h4>
                    <h4><b>Email : </b><?php echo $email; ?></h4>
                    <h4><b>Phone : </b><?php echo $rows['booking_user_phone']; ?></h4>
                    <h4><b>Address : </b><?php echo $rows['booking_user_address']; ?></h4>
                    <h4><b>Age : </b><?php echo $rows['booking_user_age']; ?></h4>
                    <h4><b>Gender : </b><?php echo $rows['booking_user_gender']; ?></h4>
                    <h4><b>Salary : 22000-50000 ฿</b></h4>
                <?php
                                    }
                                }
                            }
                        }
                    }
                }
                ?>
                </div>
                </div>
            <div>
            <div class="subgrid" align="left">
                <div class="boxcontent2">
                <h2 class="headcolor2" align="center">Employee</h2>
                <?php
                $user_check_query = "SELECT * FROM users WHERE role_id='3'";
                $result = mysqli_query($db, $user_check_query);
                if($result) {
                    $row_cnt = mysqli_num_rows($result);
                    if($row_cnt) {
                        $row = mysqli_fetch_all($result, MYSQLI_ASSOC);
                        foreach ($row as $rows) {
                            $email = $rows['email'];
                            $id = $rows['id'];
                ?>
                <img src="../img/Employee.jpg" alt="Avatar">
                <div class="cardcontainer">
                <h4><b>No. : </b><?php echo $id; ?></h4> 
                <?php
                            $user_check_query = "SELECT * FROM booking WHERE user_id='$id' LIMIT 1";
                            $result = mysqli_query($db, $user_check_query);
                            if($result) {
                                $row_cnt = mysqli_num_rows($result);
                                if($row_cnt) {
                                    $row = mysqli_fetch_all($result, MYSQLI_ASSOC);
                                    foreach ($row as $rows) {
                ?>
                    <h4><b>Name : </b><?php echo $rows['booking_user_name']; ?></h4>
                    <h4><b>Email : </b><?php echo $email; ?></h4>
                    <h4><b>Phone : </b><?php echo $rows['booking_user_phone']; ?></h4>
                    <h4><b>Address : </b><?php echo $rows['booking_user_address']; ?></h4>
                    <h4><b>Age : </b><?php echo $rows['booking_user_age']; ?></h4>
                    <h4><b>Gender : </b><?php echo $rows['booking_user_gender']; ?></h4>
                    <h4><b>Salary : 16000-30000 ฿</b></h4>
                <?php
                                    }
                                }
                            }
                        }
                    }
                }
                ?>
                </div>
                </div>
            <div>
            <div class="subgrid" align="left">
                <div class="boxcontent2">
                <h2 class="headcolor2" align="center">Security</h2>
                <?php
                $user_check_query = "SELECT * FROM users WHERE role_id='4'";
                $result = mysqli_query($db, $user_check_query);
                if($result) {
                    $row_cnt = mysqli_num_rows($result);
                    if($row_cnt) {
                        $row = mysqli_fetch_all($result, MYSQLI_ASSOC);
                        foreach ($row as $rows) {
                            $email = $rows['email'];
                            $id = $rows['id'];
                ?>
                <img src="../img/Security.jpg" alt="Avatar">
                <div class="cardcontainer">
                <h4><b>No. : </b><?php echo $id; ?></h4> 
                <?php
                            $user_check_query = "SELECT * FROM booking WHERE user_id='$id' LIMIT 1";
                            $result = mysqli_query($db, $user_check_query);
                            if($result) {
                                $row_cnt = mysqli_num_rows($result);
                                if($row_cnt) {
                                    $row = mysqli_fetch_all($result, MYSQLI_ASSOC);
                                    foreach ($row as $rows) {
                ?>
                    <h4><b>Name : </b><?php echo $rows['booking_user_name']; ?></h4>
                    <h4><b>Email : </b><?php echo $email; ?></h4>
                    <h4><b>Phone : </b><?php echo $rows['booking_user_phone']; ?></h4>
                    <h4><b>Address : </b><?php echo $rows['booking_user_address']; ?></h4>
                    <h4><b>Age : </b><?php echo $rows['booking_user_age']; ?></h4>
                    <h4><b>Gender : </b><?php echo $rows['booking_user_gender']; ?></h4>
                    <h4><b>Salary : 10000-20000 ฿</b></h4>
                <?php
                                    }
                                }
                            }
                        }
                    }
                }
                ?>
                </div>
                </div>
            <div>
            <div class="subgrid" align="left">
                <div class="boxcontent2">
                <h2 class="headcolor2" align="center">Customer</h2>
                <?php
                $user_check_query = "SELECT * FROM users WHERE role_id='5'";
                $result = mysqli_query($db, $user_check_query);
                if($result) {
                    $row_cnt = mysqli_num_rows($result);
                    if($row_cnt) {
                        $row = mysqli_fetch_all($result, MYSQLI_ASSOC);
                        foreach ($row as $rows) {
                            $email = $rows['email'];
                            $id = $rows['id'];
                ?>
                <img src="../img/Customer.jpg" alt="Avatar">
                <div class="cardcontainer">
                <h4><b>No. : </b><?php echo $id; ?></h4> 
                <?php
                            $user_check_query = "SELECT * FROM booking WHERE user_id='$id' LIMIT 1";
                            $result = mysqli_query($db, $user_check_query);
                            if($result) {
                                $row_cnt = mysqli_num_rows($result);
                                if($row_cnt) {
                                    $row = mysqli_fetch_all($result, MYSQLI_ASSOC);
                                    foreach ($row as $rows) {
                ?>
                    <h4><b>Name : </b><?php echo $rows['booking_user_name']; ?></h4>
                    <h4><b>Email : </b><?php echo $email; ?></h4>
                    <h4><b>Phone : </b><?php echo $rows['booking_user_phone']; ?></h4>
                    <h4><b>Address : </b><?php echo $rows['booking_user_address']; ?></h4>
                    <h4><b>Age : </b><?php echo $rows['booking_user_age']; ?></h4>
                    <h4><b>Gender : </b><?php echo $rows['booking_user_gender']; ?></h4>
                    <h4><b>Salary : Unknown</b></h4>
                <?php
                                    }
                                }
                            }
                        }
                    }
                }
                ?>
                </div>
                </div>
            <div>
        <div>

        <div class="right-grid">
        </div>
    </div>
    <div class="paddingtop"></div>
    </body>
</html>