<?php
  // Receive form Post data and Saving it in variables
  $id = $_POST['id'];
  $name = $_POST['name'];
  $email = $_POST['email'];
  $comment = $_POST['comment'];

  // Write the name of text file where data will be store
  $filename = "mydata2.txt";

  // Merge all the variables with text in a single variable
  $f_data = $id . '|' . $name . '|' . $email . '|' . $comment . PHP_EOL;

  echo 'Form data has been saved to '.$filename.' <br>
  <a href="read.php">Click here to read</a>';
  $file = fopen($filename, "a");
  fwrite($file, $f_data);
  fclose($file);
?>