<?php include 'header.php';
include 'connect.php';

if (!isset($_POST['user']) || !isset($_POST['email'])) {
  echo 'Name and email are both required. Please <a class="link" href="register.php">try again</a>.';
  die();
}

$user = mysqli_real_escape_string($con, $_POST['user']);

if (!ctype_alnum($user)) {
  echo 'Name needs to be alphanumeric. Please <a class="link" href="register.php">try again</a>.';
  die();
}

$email = mysqli_real_escape_string($con, $_POST['email']);

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
  echo 'Please supply a valid email address. Please <a class="link" href="register.php">try again</a>.';
  die();
}

$sql="INSERT INTO responses (user, email) VALUES ('" . $user . "', '" . $email . "')";

if (!mysqli_query($con,$sql)) {
  echo 'Error: ' . mysqli_error($con) . '. Please <a class="link" href="register.php">register here</a>.';
  die();
}

echo '<h3>Registered successfully</h3>';
echo '<form action="index.php" method="post">';
echo '<input type="hidden" name="user" value="' . $user . '">';
echo '<input type="submit" value="Continue">';
echo '</form>';

mysqli_close($con);

include 'footer.php'; ?>
