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
  if (isset($_SESSION['username'])) {
    $table_rooms = "SELECT rooms.room_id, rooms.room_number, rooms.room_type FROM rooms;";
    $run_posts = mysqli_query($db, $table_rooms);
    while($rooms = mysqli_fetch_array($run_posts)){
        $roomnumber = $rooms['room_number'];
        $roomtype = $rooms['room_type'];
    }

    $table_booking = "SELECT booking.book_id, booking.num_group FROM booking;";
    $run_posts2 = mysqli_query($db, $table_booking);
    $allreser = mysqli_num_rows($run_posts2);
    while($booking = mysqli_fetch_array($run_posts2)){
        $group = $booking['num_group'];

    }

    $group_single = "SELECT booking.num_group, booking.book_id FROM booking WHERE (((booking.num_group)='Single'));";
    $run_posts3 = mysqli_query($db, $group_single);
    $allsingle = mysqli_num_rows($run_posts3);

    $group_dual = "SELECT booking.num_group, booking.book_id FROM booking WHERE (((booking.num_group)='Dual'));";
    $run_posts4 = mysqli_query($db, $group_dual);
    $alldual = mysqli_num_rows($run_posts4);

    $group_fam = "SELECT booking.num_group, booking.book_id FROM booking WHERE (((booking.num_group)='Family'));";
    $run_posts5 = mysqli_query($db, $group_fam);
    $allfam = mysqli_num_rows($run_posts5);

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
      <style type="text/css">
            .highcharts-figure,
            .highcharts-data-table table {
                min-width: 320px;
                max-width: 660px;
                margin: 1em auto;
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
          .boxcontent3{
              background: black;
              border: 1px #000000;
              box-sizing: border-box;
              padding: 10px;
              height: 475px;
           
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
            font-size: 50px;
            color:#708FFF;
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
            <h2 class="headcolor">Statics booking rooms</h2>
          </div>

            <div class="boxcontent2">
                <script src="highcharts/highcharts.js"></script>
                <script src="highcharts/modules/data.js"></script>
                <script src="highcharts/modules/drilldown.js"></script>
                <script src="highcharts/modules/exporting.js"></script>
                <script src="highcharts/modules/export-data.js"></script>
                <script src="highcharts/modules/accessibility.js"></script>

                <figure class="highcharts-figure">
                    <div id="container"></div>
                    <p class="highcharts-description">
                    </p>
                </figure>


                <!-- Data from www.netmarketshare.com. Select Browsers => Desktop share by version. Download as tsv. -->
                <pre id="tsv" style="display:none"></pre>

                <script type="text/javascript">
                // Create the chart
                Highcharts.chart('container', {
                    chart: {
                        type: 'pie'
                    },
                    title: {
                        text: 'A graph showing the results of bookings for each room'
                    },
                    subtitle: {
                        text: 'Every month in 2022'
                    },

                    accessibility: {
                        announceNewData: {
                            enabled: true
                        },
                        point: {
                            valueSuffix: '%'
                        }
                    },

                    plotOptions: {
                        series: {
                            dataLabels: {
                                enabled: true,
                                format: '{point.name}: {point.y:1f} Booking'
                            }
                        }
                    },

                    tooltip: {
                        headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
                        pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y:2f} Booking<br/>'
                    },

                    series: [
                        {
                            name: "Room",
                            colorByPoint: true,
                            data: [
                                <?php
                                   if (isset($_SESSION['username'])) {
                                    $table_rooms = "SELECT rooms.room_id, rooms.room_number, rooms.room_type FROM rooms;";
                                    $run_posts = mysqli_query($db, $table_rooms);
                                    while($rooms = mysqli_fetch_array($run_posts)){
                                        $num_booking = "SELECT rooms.room_id, rooms.room_number, booking.book_id
                                        FROM rooms INNER JOIN booking ON rooms.room_id = booking.room_id
                                        WHERE (((rooms.room_number)='$roomnumber'));";
                                        $query = mysqli_query($db, $num_booking);
                                        $num = mysqli_num_rows($query);
                                        $roomnumber = $rooms['room_number'];
                                        $roomtype = $rooms['room_type'];
                                
                                ?>
                                    {
                                        name: "<?php echo $roomnumber; ?>",
                                        y: <?php echo $num; ?>,
                                        drilldown: "<?php echo $roomnumber; ?>"
                                    }, 
                                <?php
                                    }
                                  }   
                                ?>
                            ]
                        }
                    ],
                    drilldown: {
                        series: [
                            <?php
                                   if (isset($_SESSION['username'])) {
                                    $table_rooms = "SELECT rooms.room_id, rooms.room_number, rooms.room_type FROM rooms;";
                                    $run_posts = mysqli_query($db, $table_rooms);
                                    while($rooms = mysqli_fetch_array($run_posts)){
                                        $Single = "SELECT rooms.room_id, rooms.room_number, booking.num_group, rooms.room_type
                                        FROM rooms INNER JOIN booking ON rooms.room_id = booking.room_id
                                        WHERE (((rooms.room_number)='$roomnumber') AND ((booking.num_group)='Single'));";

                                        $Dual = "SELECT rooms.room_id, rooms.room_number, booking.num_group, rooms.room_type
                                        FROM rooms INNER JOIN booking ON rooms.room_id = booking.room_id
                                        WHERE (((rooms.room_number)='$roomnumber') AND ((booking.num_group)='Dual'));";

                                        $Family = "SELECT rooms.room_id, rooms.room_number, booking.num_group, rooms.room_type
                                        FROM rooms INNER JOIN booking ON rooms.room_id = booking.room_id
                                        WHERE (((rooms.room_number)='$roomnumber') AND ((booking.num_group)='Family'));";

                                        $query1 = mysqli_query($db, $Single);
                                        $query2 = mysqli_query($db, $Dual);
                                        $query3 = mysqli_query($db, $Family);

                                        $groupnum1 = mysqli_num_rows($query1);
                                        $groupnum2 = mysqli_num_rows($query2);
                                        $groupnum3 = mysqli_num_rows($query3);

                                        $roomnumber = $rooms['room_number'];
                                        $roomtype = $rooms['room_type'];
                                
                                ?>
                                    {
                                        name: "<?php echo $roomnumber; ?>",
                                        
                                        
                                        id: "<?php echo $roomnumber; ?>",
                                        data: [
                                            [
                                                "Single",
                                                <?php echo $groupnum1; ?>
                                            ],
                                            [
                                                "Dual",
                                                <?php echo $groupnum2; ?>
                                            ],
                                            [
                                                "Family",
                                                <?php echo $groupnum3; ?>
                                            ],
                                        ],
                                    },
                                <?php
                                    }
                                  }   
                                ?>
                        ]
                    }
                });
                        </script>
            </div>
        


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

        <div class="right-grid">
            <div class="boxcontent1" align="center">
                    <h2 class="headcolor">Summary of bookings in 2022</h2>
            </div>
            <div class="boxcontent2 "align="center">
                <h1 class="fontstyle"><?php  
                echo $allreser;
                
                ?>  Reservations</h1>
            </div>
            <div class="boxcontent1" align="center">
                    <h2 class="headcolor">Reservations for each group</h2>
            </div>
            <div class="boxcontent2 ">

                <h1 class="fontstyle2">Single: &nbsp;<?php  
                echo $allsingle;
                
                ?>  Reservations</h1>
                <h1 class="fontstyle2">Dual: &nbsp;&nbsp;&nbsp;&nbsp;<?php  
                echo $alldual;
                
                ?>  Reservations</h1>
                <h1 class="fontstyle2">Family: &nbsp;<?php  
                echo $allfam;
                
                ?> Reservations</h1>
            </div>
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
		
</body>
</html>