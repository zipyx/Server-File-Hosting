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
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Cervg</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">

    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/jq-3.3.1/jszip-2.5.0/dt-1.10.20/af-2.3.4/b-1.6.1/b-colvis-1.6.1/b-flash-1.6.1/b-html5-1.6.1/b-print-1.6.1/cr-1.5.2/fc-3.3.0/fh-3.1.6/kt-2.5.1/r-2.2.3/rg-1.1.1/rr-1.2.6/sc-2.0.1/sp-1.0.1/sl-1.3.1/datatables.min.css"/>

    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/v/bs4/jq-3.3.1/jszip-2.5.0/dt-1.10.20/af-2.3.4/b-1.6.1/b-colvis-1.6.1/b-flash-1.6.1/b-html5-1.6.1/b-print-1.6.1/cr-1.5.2/fc-3.3.0/fh-3.1.6/kt-2.5.1/r-2.2.3/rg-1.1.1/rr-1.2.6/sc-2.0.1/sp-1.0.1/sl-1.3.1/datatables.min.js"></script>


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

</style>

<form method="POST" action="up_movies.php" enctype="multipart/form-data">
    <input type="file" name="file">
    <input type="submit" class="button" value="Upload">
    <input type="button" class="button" value="Anime" onclick="location='anime/list_anime.php'" />
    <input type="button" class="button" value="Back" onclick="location='http://fam.cervg.com'" />
</form>
<br><br>

<div class="table-responsive-sm">
<table id="table_id" class="table table-hover table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
    <thead class="thead-dark">
        <tr>
            <th> Movie Title </th>
            <th> Watch </th>
            <th> Download </th>
            <th> Delete </th>
        </tr>
    </thead>
    <tbody>
       <?php $files = scandir("/var/www/hdrive/web_php/Movies"); for ($a = 2; $a < count($files); $a++){ ?>
        <tr>
            <td><?php echo $files[$a]; ?></td>
            <td><a target="_blank" href="/hdrive/web_php/Movies/<?php echo $files[$a]; ?>">Watch</a></td>
            <td><a href="/hdrive/web_php/Movies/<?php echo $files[$a]; ?>" download="<?php echo $files[$a]; ?>">Download</a></td>
            <td><a href="delete.php?name=/var/www/hdrive/web_php/Movies/<?php echo $files[$a]; ?>" style="color: red;">Delete</a></td>
        </tr>
       <?php } ?>
    </tbody>
</table>
</div>




<script text="text/javascript">

$(document).ready(function() {
    $('#table_id').DataTable();
} );
</script>

