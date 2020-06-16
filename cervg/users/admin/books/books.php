<?php
// Initialize the session
session_start();
// Check if the user is logged in, if not then redirect to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: /login.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Cervg</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
        body{ font: 15px sans-serif; text-align: center; }
    </style>
</head>


<body>
    <div class="page-header">
        <h1>Hi, <b><?php echo htmlspecialchars($_SESSION["username"]); ?></b>. Welcome to the Server</h1>
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

//    <input type="button" class="logbutton" value="Logout" onClick="location='http://fam.cervg.com/cervg/users/admin/books/books.php?logout=1'" />

</style>

<form method="POST" action="up_books.php" enctype="multipart/form-data">
    <input type="file" name="file">
    <input type="submit" class="button" value="Upload">
    <input type="button" class="button" value="Back" onclick="location='http://fam.cervg.com'" />
</form>
<br><br>

<?php

$files = scandir("/var/www/hdrive/web_php/Books");
for ($a = 2; $a < count($files); $a++)
{
    ?>
    <p>
        <?php echo $files[$a]; ?>

        <a href="/hdrive/web_php/Books/<?php echo $files[$a]; ?>" download="<?php echo $files[$a]; ?>">
            Download
        </a>

    </p>
    <?php
}
