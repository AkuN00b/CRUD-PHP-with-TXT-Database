<?php
  $id = $_POST['id'];
  $nama = $_POST['name'];
  $email = $_POST['email'];
  $komen = $_POST['comment'];

  $file = fopen("mydata2.txt", "r");
  $data = "";

  while (!feof($file)) {
    $line = fgets($file);
    $line = explode("|", $line);

    if (!($line[0] < 2) || ($line[0] == 1)) {
      if ($line[0] == $id) {
        $line[1] = $nama;
        $line[2] = $email;
        $line[3] = $komen . PHP_EOL;
      }
      $data .= $line[0] . "|" . $line[1] . "|" . $line[2] . "|" . $line[3];
    }
  }
  
  // $data = substr($data, 0, -1);
  fclose($file);

  $file = fopen("mydata2.txt", "w");

  fwrite($file, $data);
  fclose($file);

  header("Location: read.php");
?>
