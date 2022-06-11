<?php include('server.php')?>
<!DOCTYPE html>
<html>
<head>
  <title>Login</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <script src="https://kit.fontawesome.com/f180d9c23b.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="css/style.css">
  <style>
    </style>
</head>
<body class="bodyimg">
    <nav>
        <ul>
        <li><a href="index.php"><i class="fa-solid fa-hotel">&nbsp;&nbsp;Next-Gen Hotel</i></a></li>
        <li style="float:right"><a href="register.php"><i class="fa fa-address-book" aria-hidden="true">&nbsp; Register</i></a></li>
        <li style="float:right"><a href="login.php"><i class="fa fa-user" aria-hidden="true">&nbsp; Login</i></a></li>
        </ul>
    </nav>

    <div class="header">
  	    <h2>Login</h2>
    </div>
  <form class="form" method="post" action="login.php">
  	<?php include('errors.php'); ?>
  	<div class="input-group">
  		<label>Username</label>
  		<input type="text" name="username" >
  	</div>
  	<div class="input-group">
  		<label>Password</label> 
  		<input type="password" name="password">
  	</div>

      <div align="center" class="paddingtop">
      <button type="submit" class="btn" name="login_user">Login</button>
    </div>

  	<p class="p2" align="center">
  		Not yet a member? <a href="register.php">Sign up</a>
  	</p>
  </form>
</body>
</html>