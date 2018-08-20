<?php include('server.php') ?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<title>Registration system PHP and MySQL</title>
 

 <body style="background-color:#3399ff;">
<div class="jumbotron" style="background-color: #3399ff;">
    <nav class="navbar navbar-inverse navbar-fixed-top">
  <div class="container-fluid">
    <div class="navbar-header" style="height:60px;">
      <a href="profile.php" class="navbar-brand"> <b> Delhi Metro Rail Corporation </b> <a href="#" > <img src="dmrc.png" height="60" width="60"></a>
    </div>
  </div>
</nav>
  </div>
  <!--<div class="row">
      <div class="col-lg-5  col-lg-offset-5 col-xs-offset-3">
         <div class="row">
          <div class="col-lg-5 col-lg-offset-1 col-xs-offset-1">
        <img src="dmrc.png" height="115" width=115">
      </div>
      </div>
      </div>
    </div>
    <br><br>-->
    <br><br>
  <div class="container   col-lg-4  col-lg-offset-4 col-xs-10  col-xs-offset-1" style="background-color: white;border:2px solid white;border-radius: 15px;"><br>
    <br>
  <div class="row">
    <div class="form-group col-lg-6  col-lg-offset-3">
  <h2 style="color:#3399ff;"><center><b>Login</b></center></h2>
</div>
</div>
  <form action="login.php" method="post">
    <br>
    <div class="row">
   <div class="form-group col-lg-10  col-lg-offset-1">
      <!--<label for="email"> <b>Station ID:</b></label>-->
      <input type="text"  class="form-control input-lg" id="email" name="stationid" placeholder="Enter stationID">
    </div>
    </div>
    <br>
    <div class="row">
    <div class="form-group col-lg-10  col-lg-offset-1">
      <!--<label for="pwd"><b>Password:</b></label>-->
      <input type="password" class="form-control input-lg" id="pwd" name="password" placeholder="Enter password">
    </div>
    </div>
    <br><br>
     <div class="row">
     <div class="form-group col-lg-8  col-lg-offset-5 col-xs-offset-3">
    <button type="submit" class="btn btn-success btn-lg" name="login_user">Login</button>
    </div>
  </div>
  </form>
</div>

</body> 
</html>
