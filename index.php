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
  ?>
  <!DOCTYPE html>
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
        </style>
    </head>

  <body class="bodyimg">
    <ul>
      <li><a href="index.php"><i class="fa-solid fa-hotel">&nbsp;&nbsp;Next-Gen Hotel</i></a></li>
      <li style="float:right"><a href="index.php?logout='1'" class="active" style="text-decoration: none;"><i class="fa fa-user" aria-hidden="true">&nbsp; Logout</i></a></li>
      <li style="float:right"><a href="bookingdetail.php"><i class="fa fa-address-book" aria-hidden="true">&nbsp; My Booking</i></a></li>
    </ul>

    <div class="gridspace">
        <header class="top-grid" align="center"> 
            <div class="slideshow-container ">
                <div class="mySlides fade">
                    <div class="numbertext">1 / 3</div>
                    <img src="img/img1.jpg" style="width:30%">
                    <div class="text">Caption Text</div>
                </div>
                <div class="mySlides fade">
                    <div class="numbertext">2 / 3</div>
                    <img src="img/img2.jpg" style="width:30%">
                    <div class="text">Caption Two</div>
                </div>
                <div class="mySlides fade">
                    <div class="numbertext">3 / 3</div>
                    <img src="img/img3.jpg" style="width:30%">
                    <div class="text">Caption Three</div>
                </div>
                <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
                <a class="next" onclick="plusSlides(1)">&#10095;</a>
            </div>
            <div style="text-align:center">
              <span class="dot"></span> 
              <span class="dot"></span> 
              <span class="dot"></span> 
            </div>    
        </header>
        <div class="left-grid">
          <div class="boxcontent" align="center">
            <h2 class="headcolor">Room Search</h2>
          </div>
          <form action="searchroom.php" method="get" enctype="multipart/form-data" class="boxcontent2" align="center">
          <label>Floor : </label>
            <select name="floor">
              <option align="center" value="0"> -- กรุณาเลือก -- </option>
              <option align="center" value="1">1</option>
              <option align="center" value="2">2</option>
            </select>
            <br><br>
            <label>Room Number : </label>
            <select name="roomnum">
              <option align="center" value="0"> -- กรุณาเลือก -- </option>
              <option align="center" value="A01">A01</option>
              <option align="center" value="A02">A02</option>
              <option align="center" value="B01">B01</option>
              <option align="center" value="B02">B02</option>
            </select>
            <br><br>
            <label>Room Type : </label>
            <select name="roomtype">
              <option align="center" value="0"> -- กรุณาเลือก -- </option>
              <option align="center" value="Single">Single</option>
              <option align="center" value="Double">Double</option>
              <option align="center" value="Quad">Quad</option>
              <option align="center" value="Deluxe">Deluxe</option>
              <option align="center" value="VIP">VIP</option>
            </select>
            <br><br>
            <input type="submit" name="search" value="search"> &nbsp;
           
          </form>
        </div>
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
                <img src="img/room1.jpg" class="roomimg" >
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
                <input type="submit" value="Can't Booking" class="cant cantg">
              <?php
                }
              ?>
              <?php
                if($room_status == 0){
              ?>
                <br>
                <br>
                <a href="booking.php?id=<?php echo $room_id?>"><input type="submit" value="Booking" class="buttoncan buttoncang"></a>
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
        <div class="right-grid">
          <div div class="boxcontent" align="center">
            <h2 class="headcolor">Notification</h2>
          </div>
            <div class="boxcontent2">
              <p class="p2">
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
              </p>
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
      <script>
        var slideIndex = 0;
        showSlides();

        function showSlides() {
          var i;
          var slides = document.getElementsByClassName("mySlides");
          var dots = document.getElementsByClassName("dot");
          for (i = 0; i < slides.length; i++) {
            slides[i].style.display = "none";  
          }
          slideIndex++;
          if (slideIndex > slides.length) {slideIndex = 1}    
          for (i = 0; i < dots.length; i++) {
            dots[i].className = dots[i].className.replace(" active", "");
          }
          slides[slideIndex-1].style.display = "block";  
          dots[slideIndex-1].className += " active";
          setTimeout(showSlides, 1500); // Change image every 2 seconds
        }
      </script>
    </body>
		
</body>
</html>