<?php
// Initialize the session
session_start();
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name=”viewport” content=”width=device-width, initial-scale=1″>
    <title>Cervg</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
        body{ font: 14px sans-serif; text-align: center; }
    </style>
</head>


<body>
    <div class="page-header">
        <h1>Hi, <b><?php echo htmlspecialchars($_SESSION["username"]); ?></b>. Welcome to the Server.</h1>
    </div>
    <p>
        <a href="/reset-password.php" class="btn btn-warning">Reset Your Password</a>
        <a href="/logout.php" class="btn btn-danger">Sign Out of Your Account</a>
    </p>
</body>
</html>

<style>
  body { background-color: black; color: green; }

.button {

  background-color: #BCBCBE;
  border: 1px solid orange;
  border-radius: 12px;
  width: 180px;
  height: 120px;
  color: black;
  padding: 10px 13px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  font-weight: 540;
  margin: 1px 1px;
  transition-duration: 0.2s;
  cursor: pointer;

}

.button:hover {
  background-color: orange;
}

.logbutton {

  background-color: #BCBCBE;
  border: 1px solid orange;
  border-radius: 12px;
  width: 180px;
  height: 120px;
  color: black;
  padding: 10px 13px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  font-weight: 540;
  margin: 1px 1px;
  transition-duration: 0.2s;
  cursor: pointer;
  float: right;

}

.logbutton:hover {
 background-color: red;
}


.menu-container{
  width:100%;
  margin:0 auto;
}
.menu {
  margin:0 auto;
  display:table;
}

</style>

<div class="menu-container">
  <div class="menu">
    <input type="button" class="button" value="Books" onClick="location='books/books.php'" />
    <input type="button" class="button" value="Courses" onClick="location='courses/stguoa1/sm1/list_courses.php'" />
    <input type="button" class="button" value="Files" onclick="location='files/notes.php'" />
    <input type="button" class="button" value="Movies" onClick="location='movies/movies.php'" />
    <input type="button" class="button" value="Music" onClick="location='music/music.php'" />
    <input type="button" class="button" value="Calculus" onclick="location='calculus/math.php'" />
    <input type="button" class="button" value="Server Users" onclick="location='/cervg/sysconfig/public/index.php'" />
    <input type="button" class="button" value="Cervg Web" onclick="location='https://cervg.com/'" />
  </div>
</div>
