<?php
session_start();

if (!isset($_SESSION['criteria'])) {
  header('Location: step1.php');
}

$n_criteria = $_SESSION['n_criteria'];
$n_subject = $_SESSION['n_subject'];

$criteria = $_SESSION['criteria'];
$weight = $_SESSION['weight'];
$type = $_SESSION['type'];

if (isset($_POST['button'])) {
  $_SESSION['subject'] = $_POST['subject'];
  $_SESSION['value'] = $_POST['value'];

  header('Location: step3.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <link rel="stylesheet" href="css/style.css">
  <title>Aplikasi Sistem Pendukung Keputusan</title>
</head>

<body class="body">
  <div class="container register">
    <div class="row register-form">
      <div class="col-md-12">
        <form method="POST" target="_self">
          <h3 class="text">SISTEM PENDUKUNG KEPUTUSAN</h3>
          <h4 class="text">METODE WASPAS</h4>
          <table class="table text">
            <?php for ($i = 0; $i < $n_subject + 1; $i++) { ?>
              <tr>
                <?php for ($j = 0; $j < $n_criteria + 1; $j++) { ?>
                  <?php if ($i == 0 && $j == 0) { ?>
                    <th>Subjek</th>
                  <?php } else if ($i == 0) { ?>
                    <th><?php echo $criteria[$j - 1] ?></th>
                  <?php } else if ($j == 0) { ?>
                    <td><input name="subject[]" class="form-control" type="text" required></td>
                  <?php } else { ?>
                    <td><input name="value[]" class="form-control" type="number" required></td>
                  <?php } ?>
                <?php } ?>
              </tr>
            <?php } ?>
          </table>
          <button name="button" type="submit" class="btnNext">NEXT</button>
        </form>
      </div>
    </div>
  </div>

  <div class="footer-basic">
    <footer>
      <ul class="list-inline">
        <li class="list-inline-item"><a href="#">Elga F</a></li>
        <li class="list-inline-item"><a href="#">Ibnu F</a></li>
        <li class="list-inline-item"><a href="#">Kholik Z</a></li>
        <li class="list-inline-item"><a href="#">Krisman J</a></li>
        <li class="list-inline-item"><a href="#">Rizan R</a></li>
      </ul>
      <p class="copyright">Tugas Sistem Pendukung Keputusan © 2022</p>
    </footer>
  </div>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/js/bootstrap.bundle.min.js"></script>


</body>

</html>