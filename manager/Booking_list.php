<?php 
	include('../server.php');

  if (!isset($_SESSION['username'])) {
  	$_SESSION['msg'] = "You must login first";
  	header('location: welcome.php');
  }
  if (($_SESSION['role']!=1) AND ($_SESSION['role']!=2)) {

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
          .highcharts-figure,
            .highcharts-data-table table {
                min-width: 310px;
                max-width: 800px;
                margin: 1em auto;
            }

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
          .footers{
          position: fixed;
          left: 0;
          bottom: 0;
        }
        table{
    width: 100%;
}
#customers {
font-family: Arial, Helvetica, sans-serif;
border-collapse: collapse;

}

#customers td, #customers th {
border: 1px solid #ddd;
padding: 8px;
}

#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}

#customers td{
  text-align: center;
}
#customers th {
padding-top: 12px;
padding-bottom: 12px;
text-align: center;
background-color: #04AA6D;
color: white;
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
        <div class="subgrid" align="left">
        <div class="boxcontent" align="center">
            <h2 class="headcolor">Room List</h2>
            </div>
        <div class="boxcontent2">
          <input type="text" name="search" placeholder="Search.."> 
            <table id="customers">
              <br>
                <tr>
                    <th>No.</th>
                    <th>Name</th>
                    <th>Phone</th>
                    <th>Gender</th>
                    <th>Bill status</th>
                    <th>Check in</th>
                    <th>Check out</th>
                    <th>Number of guests</th>
                    <th>Room Detail</th>
                    <th>Room status</th>
                </tr>
                <tr>
                <?php
                $user_check_query = "SELECT * FROM booking";
                $result = mysqli_query($db, $user_check_query);
                if($result) {
                  $row_cnt = mysqli_num_rows($result);
                  if($row_cnt) {
                    $row = mysqli_fetch_all($result, MYSQLI_ASSOC);
                    foreach ($row as $rows) {
                ?>
                </tr>
                    <td><?php echo $rows['book_id']; ?></td>
                    <td><?php echo $rows['booking_user_name']; ?></td>
                    <td><?php echo $rows['booking_user_phone']; ?></td>
                    <td><?php echo $rows['booking_user_gender']; ?></td>
                    <td><?php echo $rows['checkin']; ?></td>
                    <td><?php echo $rows['checkout']; ?></td>
                    <td><?php echo $rows['num_group']; ?></td>
                    <?php
                    $book_id = $rows['book_id'];
                    $user_check_query = "SELECT * FROM bill WHERE book_id='$book_id'";
                    $result = mysqli_query($db, $user_check_query);
                    $user = mysqli_fetch_assoc($result);
                    if($user) {
                    ?>
                    <td><?php echo $user['bill_status']; ?></td>
                    <?php
                    }
                    $user_check_query = "SELECT * FROM rooms WHERE room_id=(SELECT room_id FROM booking WHERE book_id='$book_id')";
                    $result = mysqli_query($db, $user_check_query);
                    $user = mysqli_fetch_assoc($result);
                    ?>
                    <td>
                    <?php
                    if($user) {
                        $arr = array("Floor:<br>", $user['room_floor'],"<br>NumID: ", $user['room_number'], "<br>Type: ", $user['room_type'], "<br>Price: ", $user['room_price']);
                        $room_detail = join("",$arr);
                        echo $room_detail;
                    ?>
                    </td>
                    <td>
                    <?php
                    if ($user['room_status'] == 1) {
                        echo "unavailable";
                    } else {
                        echo "available";
                    }
                    ?>
                    </td>
                </tr>
                <?php
                      }
                    }
                  }
                }
                ?>
            </table>
        </div>
        </div>
        </div>

        <div class="right-grid">
        </div>
    </div>
    <div class="paddingtop"></div> 
    </body>
		
</body>
</html>