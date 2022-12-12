<?php
session_start();
session_destroy();
session_start();

if (isset($_POST['button'])) {
  $_SESSION['n_criteria'] = $_POST['n_criteria'];
  $_SESSION['n_subject'] = $_POST['n_subject'];

  header('Location: step1.php');
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
    <div class="row justify-content-center register-form">
      <div class="col-md-12">
        <form method="POST" target="_self">
          <h3 class="text justify-conter-center">SISTEM PENDUKUNG KEPUTUSAN</h3>
          <h4 class="text">METODE WASPAS</h4>
          <div class="form-group">
            <label class="text">Masukkan jumlah kriteria</label>
            <input type="number" class="form-control" name="n_criteria" required>
          </div>
          <div class="form-group">
            <label class="text">Masukkan jumlah subjek</label>
            <input type="number" class="form-control" name="n_subject" required>
          </div>
          <button type="submit" name="button" class="btnNext">START</button>
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