<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>My Form</title>
</head>
<body>
  <form action="test3.php" name="myForm" method="POST">
    <p>
      ID: <input type="text" name="id" readonly value="<?php echo idotomatis() ?>"> <br>
      Your Name: <input type="text" name="name"> <br />
      Email Address: <input type="text" name="email" id=""><br>
      Comment: <br> <textarea name="comment" id="" cols="30" rows="10"></textarea>
      <br>
      <input type="submit" value="Save"><br>
    </p>
  </form>
</body>
</html>

<?php
  function idotomatis()
  {
    $file = fopen("mydata2.txt", "r");
    $id = 0;

    if (!('' == file_get_contents("mydata2.txt"))) {
      if ($file) {
        while (($line = fgets($file)) !== false) {
          $data = explode("|", $line);
          $id = $data[0];
        }
        
        $id = $id + 1;
        echo $id;
      }
    } else {
      echo "1";
    }
  }
?>