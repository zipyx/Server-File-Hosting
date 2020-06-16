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
    <title><?php echo htmlspecialchars($_SESSION["username"]); ?></title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
        body{ font: 15px sans-serif; text-align: center; }
        body { background-color: black; color: green; }
    </style>
</head>

<body>
    <div class="page-header">
        <h1><b><?php echo htmlspecialchars($_SESSION["username"]); ?></b> - Cervg</h1>
    </div>
    <p>
        <a href="/reset-password.php" class="btn btn-warning">Reset Your Password</a>
        <a href="/logout.php" class="btn btn-danger">Sign Out of Your Account</a>
    </p>
</body>
</html>


<?php include "templates/header.php"; ?>

<br><br>
<div class="btn-toolbar">
  <div class="btn-group-vertical">

    <button type="button" style="width: 300px; border-radius: 12px" class="btn btn-primary btn-lg" onClick="location='create.php'">Add New User</button><br>
    <button type="button" style="width: 300px; border-radius: 12px" class="btn btn-primary btn-lg" onClick="location='read.php'">Search Users</button><br>
    <button type="button" style="width: 300px; border-radius: 12px" class="btn btn-primary btn-lg" onClick="location='update.php'">View Users</button><br>
    <button type="button" style="width: 300px; border-radius: 12px" class="btn btn-primary btn-lg" onClick="location='delete.php'">Delete Users</button><br>
    <button type="button" style="width: 300px; border-radius: 12px" class="btn btn-info btn-lg" onClick="location='/index.php'">Go Back</button>

  </div>
</div>

<?php include "templates/footer.php"; ?>

