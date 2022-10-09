<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>My Form</title>
</head>
<body>
  <?php
    $id = $_GET['id'];
    $file = fopen("mydata2.txt", "r");

    while (!feof($file)) {
      $line = fgets($file);
      $data = explode("|", $line);

      if ($data[0] == $id) {
        $id = $data[0];
        $nama = $data[1];
        $email = $data[2];
        $komen = $data[3];
      }
    } 
  ?>

  <form action="aksiedit.php" name="myForm" method="POST">
    <p>
      ID: <input type="text" name="id" readonly value="<?php echo $id ?>"> <br>
      Your Name: <input type="text" name="name" value="<?php echo $nama ?>"> <br />
      Email Address: <input type="text" name="email" id="" value="<?php echo $email ?>"><br>
      Comment: <br> <textarea name="comment" id="" cols="30" rows="10"><?php echo $komen ?></textarea>
      <br>
      <input type="submit" value="Save"><br>
    </p>
  </form>
</body>
</html>