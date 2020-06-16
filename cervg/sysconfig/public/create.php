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


<?php

/**
 * Use an HTML form to create a new entry in the
 * users table.
 *
 */

require "../config.php";
require "../common.php";

if (isset($_POST['submit'])) {
  if (!hash_equals($_SESSION['csrf'], $_POST['csrf'])) die();

  try  {
    $connection = new PDO($dsn, $username, $password, $options);
    $pass_hash = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $new_user = array(
      "username" => $_POST['username'],
      "firstname"  => $_POST['firstname'],
      "lastname"     => $_POST['lastname'],
      "email"       => $_POST['email'],
      "password"  => $pass_hash
    );

    $sql = sprintf(
      "INSERT INTO %s (%s) values (%s)",
      "users",
      implode(", ", array_keys($new_user)),
      ":" . implode(", :", array_keys($new_user))
    );

    $statement = $connection->prepare($sql);
    $statement->execute($new_user);
  } catch(PDOException $error) {
      echo $sql . "<br>" . $error->getMessage();
  }
}
?>
<?php require "templates/header.php"; ?>

  <?php if (isset($_POST['submit']) && $statement) : ?>
    <blockquote><?php echo escape($_POST['firstname']); ?> successfully added.</blockquote>
  <?php endif; ?>

  <h2>Add New User</h2><br>

  <form method="post">
    <input name="csrf" type="hidden" value="<?php echo escape($_SESSION['csrf']); ?>">
    <label for="username">Username</label>
    <input type="text" name="username" id="username" size="35">
    <label for="firstname">First Name</label>
    <input type="text" name="firstname" id="firstname" size="35">
    <label for="lastname">Last Name</label>
    <input type="text" name="lastname" id="lastname" size="35">
    <label for="email">Email</label>
    <input type="text" name="email" id="email" size="35">
    <label for="password">Password</label>
    <input type="password" name="password" id="password" size="35"><br><br>
    <input type="submit" name="submit" value="Submit"><br><br>
  </form>

<button type="button" class="btn btn-primary btn-lg" onClick="location='update.php'">View Users</button>
<button type="button" class="btn btn-info btn-lg" onClick="location='index.php'">Go Back</button>

<?php require "templates/footer.php"; ?>
