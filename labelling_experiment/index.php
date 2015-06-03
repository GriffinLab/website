<?php include 'header.php';
include 'connect.php';

if (empty($_POST['user'])) {
  echo 'You are not logged in. Please <a class="link" href="register.php">register here</a>.';
  die();
}

$user = mysqli_real_escape_string($con, $_POST['user']);
$last_response = 0;

if (!empty($_POST['1'])) {
  $last_response = 1;
}

if (!empty($_POST['2'])) {
  $last_response = 2;
}

if (!empty($_POST['image'])) {
  // Update the list of seen images to avoid user voting for the same image twice.
  $last_image = mysqli_real_escape_string($con, $_POST['image']);
  $last_incorrect_bag = mysqli_real_escape_string($con, $_POST['bag']);

  $result = mysqli_query($con, "INSERT INTO image_pairs (user, image_id, incorrect_bag_id, response) VALUES ('" . $user . "', '" . $last_image . "', '" . $last_incorrect_bag .  "', '" . $last_response . "')");

  if ($result === false) {
     echo '<span class="error">You have already seen this image.</span>';
     die();
  }
}


if (!empty($_POST['1'])) {
  mysqli_query($con, "UPDATE responses SET incorrect=incorrect+1 WHERE user='" . $user . "'");
}

if (!empty($_POST['2'])) {
  mysqli_query($con, "UPDATE responses SET correct=correct+1 WHERE user='" . $user . "'");
}

unset($_POST['1']);
unset($_POST['2']);

echo '<h3>Hello ' . $user . '</h3>';
echo '<p>Please select the bag of words that best labels this image:</p>';

$originals_dir = 'originals';
$labels_dir = 'labels';

$image_files = array_diff(scandir($originals_dir), array('..', '.'));
$text_files =array_diff(scandir($labels_dir), array('..', '.'));

// Sadly array_rand() is heavily cached by my systems so we use mt_rand instead:
$image_name = $image_files[mt_rand(0, count($image_files))];
$correct_image = $originals_dir . '/' . $image_name;
$correct_label = $labels_dir . '/' . str_replace('gif', 'jpg', $image_name) . '.desc';
$incorrect_label = $labels_dir . '/' . $text_files[mt_rand(0, count($text_files))];

echo '<div id="image-holder">';
echo '<canvas id="canvas" height="200" img_src=' . $correct_image . '>';
echo '</div><br />';

echo '<form action="index.php" method="post">';
echo '<input type="hidden" name="user" value="' . $user . '">';
echo '<input type="hidden" name="image" value="' . $correct_image . '">';
echo '<input type="hidden" name="bag" value="' . $incorrect_label . '">';

$display_correct_first = mt_rand(0, 1);
$words1k = preg_split('/$\R?^/m', file_get_contents('words1k.txt'));

function in_words1k($word) {
  global $words1k;
  return in_array($word, $words1k);
}

function shuffle_and_prune($string) {
  $words = preg_split('/$\R?^/m', $string);
  $pruned_words = array_filter($words, "in_words1k");

  shuffle($pruned_words);
  return implode('&#10;', $pruned_words);
}


if ($display_correct_first == 1) {
  echo '<input style="min-width:100px;" type="submit" name="2" value="' . shuffle_and_prune(file_get_contents($correct_label)) . '">';
  echo '<input style="min-width:100px;" type="submit" name="1" value="' . shuffle_and_prune(file_get_contents($incorrect_label)) . '">';
}
else {
  echo '<input style="min-width:100px;" type="submit" name="1" value="' . shuffle_and_prune(file_get_contents($incorrect_label)) . '">';
  echo '<input style="min-width:100px;" type="submit" name="2" value="' . shuffle_and_prune(file_get_contents($correct_label)) . '">';
}

echo '</form><br />';

$completed = 0;
$correct = mysqli_fetch_array(mysqli_query($con, "SELECT correct FROM responses WHERE user='" . $user . "'"), MYSQLI_NUM);
$incorrect = mysqli_fetch_array(mysqli_query($con, "SELECT incorrect FROM responses WHERE user='" . $user . "'"), MYSQLI_NUM);
$completed = $correct[0] + $incorrect[0];
echo '<div class="rightline"><span class="rightline">Results are automatically saved. <a class="link" href="index.php">Log out</a>.</span><br /><br />';
echo '<span class="rightline tag outline">' . $completed . ' completed.</span><br /><br />';
echo '<div class="smallprint tag outline">I take no responsibility for the content of the images and description words.<br />';
//echo 'Too pixellated? <a class="info" href="#" onclick="toggle_block(\'original_image\');">Show original image</a>.<br />';
echo '<div id="original_image" style="display:none;"><img style="max-height:200px;" src=' . $correct_image . '></div></div></div>';

mysqli_close($con);


include 'footer.php'; ?>

<script type="text/javascript" src="toggle.js" ></script>
<script type="text/javascript" src="imageblit.js" ></script>
