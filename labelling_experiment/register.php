<?php include 'header.php'; ?>
<h3>Please register:</h3>
<p></p>
<form action="login.php" method="post">
  <table>
    <tr>
      <td>Name:</td>
      <td><input type="text" name="user"></td>
    </tr>
    <tr>
      <td>Email:</td>
      <td><input type="text" name="email"></td>
    </tr>
    <tr>
      <td colspan=2><input class="rightline" type="submit"></td>
    </tr>
  </table>
</form>
<?php include 'footer.php'; ?>
