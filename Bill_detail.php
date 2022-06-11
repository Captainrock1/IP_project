<?php
    include('server.php'); 

    if (!isset($_SESSION['username'])) {
      $_SESSION['msg'] = "You must login first";
      header('location: welcome.php');
    }
    if(isset($_GET['id'])){
        $Booking_id = $_GET['id'];
        $Bill_select = "SELECT booking.book_id, booking.booking_user_name, rooms.room_number, rooms.room_type, rooms.room_price, bill.bill_id, bill.bill_status, bill.bill_total
        FROM (rooms INNER JOIN booking ON rooms.room_id = booking.room_id) INNER JOIN bill ON booking.book_id = bill.book_id
        WHERE (((booking.book_id)='$Booking_id'));";
        $Bill_value = mysqli_query($db, $Bill_select);
        while($Bill_table =  mysqli_fetch_array($Bill_value)){
            $Bill_id = $Bill_table['bill_id'];
            $Bill_booking_id = $Bill_table['book_id'];
            $Bill_name = $Bill_table['booking_user_name'];
            $Bill_roomnum = $Bill_table['room_number'];
            $Bill_roomtype = $Bill_table['room_type'];
            $Bill_roomprice = $Bill_table['room_price'];
            $Bill_total = $Bill_table['bill_total'];
        }
    }
?>  
<html>
    <head>
      <title>NextGen Hotel</title>
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
      <link rel="stylesheet" href="css/style.css">
      <link rel="stylesheet" href="../css/manager_style.css">
      <script src="https://kit.fontawesome.com/f180d9c23b.js" crossorigin="anonymous"></script>
      <style>
        
          .gridspace{
              display: grid;
              grid-template-columns: auto 500px auto;
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
        .bcolor{
          color:black;
        }
        .lefttab{
          padding-left: 60px; 
        }

</style>
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
            <h2 class="headcolor">Bill Complete</h2>
          </div>

          <div class="boxcontent2">
            <p class="bcolor" align="center">----- Receipt Complete -----<br>----- NextGen Hotel -----<br>--------------------------------------------------------<br>Bill Detail</p>
            <p class="bcolor">
               <div class="lefttab">
               Bill ID : <?php echo $Bill_id; ?><br>
               Name : <?php echo $Bill_name; ?><br>
               Booking ID : <?php echo $Bill_booking_id;?><br><br>
               Room Detail : <br>
                  Room Number <?php echo $Bill_roomnum;?>, <?php echo $Bill_roomtype;?> : <?php echo $Bill_roomprice;?> BATH<br><br>

               Total : <?php echo $Bill_total;?> BATH
              </div>
            </p>
            <p class="bcolor" align="center">--------------------------------------------------------<br>
            Please keep this receipt for your rights<br><br>
              THANK YOU<br>
              --------------------------------------------------------</p><br>
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
</html>