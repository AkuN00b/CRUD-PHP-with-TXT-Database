<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Read Data From Text</title>
  <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
</head>
<body>
  <?php
    if (isset($_GET['id'])) {
      $id = $_GET['id'];
      deletedata($id);
    }

    function deletedata($id)
    {
      $file = fopen("mydata2.txt", "r");
      $temp = fopen("temp.txt", "w");

      while (!feof($file)) {
        $line = fgets($file);
        $data = explode("|", $line);
        if ($data[0] != $id) {
          fwrite($temp, $line);
        }
      }

      fclose($file);
      fclose($temp);

      unlink("mydata2.txt");
      rename("temp.txt", "mydata2.txt");

      header("Location: read.php");
    }
  ?>
  <a href="form.php">+ Tambah</a>
  <br><br>

  <table id="example" class="display" style="width: 100%;">
    <thead>
      <tr>
        <th>No</th>
        <th>Nama</th>
        <th>E-mail</th>
        <th>Comment</th>
        <th>Aksi</th>
      </tr>
    </thead>
    <tbody>
      <?php
        $handle = fopen("mydata2.txt", "r");

        if ($handle) {
          while (($line = fgets($handle)) !== false) {
            // proces the line read
            // echo $line;

            $data_explode = explode("|", $line);

            if ((!($data_explode[0] < 2)) || ($data_explode[0] == 1)) {
              echo '
                <tr>
                  <td>' . $data_explode[0] . '</td>
                  <td>' . $data_explode[1] . '</td>
                  <td>' . $data_explode[2] . '</td>
                  <td>' . $data_explode[3] . '</td>
                  <td>
                    <a href="edit.php?id=' . $data_explode[0] . '">Ubah</a>
                    <a href="?id=' . $data_explode[0] . '">Hapus</a>
                  </td>
                </tr>
              ';
            }
          }

          fclose($handle);
        } else {
          echo "Error: File not found";
        }
      ?>
    </tbody>
  </table>

  <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
  <script src="https://cdn.datatables.net/1.10.1/js/jquery.dataTables.min.js"></script>
  <script>
    $(document).ready(function() {
      $('#example').DataTable();
    });
  </script>
</body>
</html>