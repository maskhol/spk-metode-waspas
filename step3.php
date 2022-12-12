<?php
session_start();

if (!isset($_SESSION['subject'])) {
  header('Location: step2.php');
}

// Inisialisasi
$n_criteria = $_SESSION['n_criteria'];
$n_subject = $_SESSION['n_subject'];
$criteria = $_SESSION['criteria'];
$weight = $_SESSION['weight'];
$type = $_SESSION['type'];
$subject = $_SESSION['subject'];
$value = $_SESSION['value'];
$limit = array();
$Q = array();

// Normalisasi matriks
// a.) Mencari nilai minimal atau maksimal sesuai tipe 
for ($i = 0; $i < $n_criteria; $i++) {
  if ($type[$i] == "benefit") {
    $max = $value[$i];

    for ($j = 0; $j < $n_subject * $n_criteria; $j += $n_criteria) {
      $index = $j + $i;
      if ($max < $value[$index]) {
        $max = $value[$index];
      }
    }

    $limit[$i] = $max;
  } else if ($type[$i] == "cost") {
    $min = $value[$i];

    for ($j = 0; $j < $n_subject * $n_criteria; $j += $n_criteria) {
      $index = $j + $i;
      if ($min > $value[$index]) {
        $min = $value[$index];
      }
    }

    $limit[$i] = $min;
  }
}

// b.) Menghitung normalisasi
for ($i = 0; $i < $n_criteria; $i++) {
  if ($type[$i] == "benefit") {
    for ($j = 0; $j < $n_subject * $n_criteria; $j += $n_criteria) {
      $index = $j + $i;
      $value[$index] = $value[$index] / $limit[$i];
    }
  } else if ($type[$i] == "cost") {
    for ($j = 0; $j < $n_subject * $n_criteria; $j += $n_criteria) {
      $index = $j + $i;
      $value[$index] = $limit[$i] / $value[$index];
    }
  }
}

// c.) Menghitung Qi
for ($i = 0; $i < $n_subject; $i++) {
  // step 1
  $row = 0;
  for ($j = 0; $j < $n_criteria; $j++) {
    $index = $j + ($i * $n_criteria);
    $col = $value[$index] * $weight[$j] / 100;
    $row += $col;
  }

  $Q[$i] = 0.5 * $row;

  // step 2
  $row = 1;
  for ($j = 0; $j < $n_criteria; $j++) {
    $index = $j + ($i * $n_criteria);
    $col = pow($value[$index], ($weight[$j] / 100));
    $row *= $col;
  }
  $Q[$i] = 0.5 * $row + $Q[$i];
}

// d.) Mengurutkan berdasarkan nilai terbesar
for ($i = 0; $i < $n_subject; $i++) {
  $Q[$i] = array($Q[$i], $subject[$i]);
}

sort($Q);
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
          <h3 class="text">HASIL PERHITUNGAN</h3>
          <h4 class="text">METODE WASPAS</h4>
          <table class="table text">
            <tr>
              <th>Subjek</th>
              <th>Nilai</th>
              <th>Peringkat</th>
            </tr>
            <?php for ($i = $n_subject - 1; $i >= 0; $i--) { ?>
              <tr>
                <td><?php echo $Q[$i][1]; ?></td>
                <td><?php echo $Q[$i][0]; ?></td>
                <td><?php echo $n_subject - $i; ?></td>
              </tr>
            <?php } ?>
          </table>
          <a href="index.php"><button class="btnNext" type="button">Hitung Lagi</button></a>
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