<?php

session_start();

if (!isset($_SESSION['id_admin'])) {
  echo '<script>window.alert("Maaf, anda wajib login dahulu");window.location=("../index.php");</script>';
}

else{
  include "../conf/koneksi.php";
  $id_admin = $_SESSION['id_admin'];
  $sql = "SELECT * FROM admin WHERE id_admin = '$id_admin'";
  $hasil=$koneksi->query($sql);
  $cetak=$hasil->fetch_assoc();
  extract($cetak);
}
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Admin - Sistem Penjemput Korban Bencana Alam</title>
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="author" content="ZOOM">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link rel="shortcut icon" type="image/png" href="../style/images/icon.png"/>
    <link rel="stylesheet" href="../style/css/bootstrap.min.css">
    <link rel="stylesheet" href="../style/css/font-awesome.min.css">
    <link rel="stylesheet" href="../style/css/animate.css">
    <link rel="stylesheet" href="../style/css/owl.carousel.css">
    <link rel="stylesheet" href="../style/css/owl.theme.default.min.css">
    <link rel="stylesheet" href="../style/css/tooplate-style.css">
  </head>
  <body id="top" data-spy="scroll" data-target=".navbar-collapse" data-offset="50">

    <section class="preloader">
          <div class="spinner">

               <span class="spinner-rotate"></span>

          </div>
     </section>

    <header>
      <div class="container">
        <div class="row">

          <div class="col-md-4 col-sm-5">
            <p>Jemban - Sistem Penjemput Korban Bencana Alam</p>
          </div>
          <div class="col-md-8 col-sm-7 text-align-right">
            <span class="phone-icon"><i class="fa fa-phone"></i><a href="tel:+6282177329234"> +62 821 7732 9234</a></span>
            <span class="date-icon"><i class="fa fa-calendar-plus-o"></i> 8:00 AM - 17:00 PM (Mon-Fri)</span>
            <span class="email-icon"><i class="fa fa-envelope-o"></i> <a href="mailto:bangadit.irawan@gmail.com">mail@adtputr.com</a></span>
          </div>

        </div>
      </div>
    </header>

    <section class="navbar navbar-default navbar-static-top" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="icon icon-bar"></span>
            <span class="icon icon-bar"></span>
            <span class="icon icon-bar"></span>
          </button>
          <a href="../index.php" onClick="return confirm('Anda harus logout untuk melihat, apakah anda yakin?')">
            <img style="margin-top:10px;" src="../style/images/logo.png" width="230" alt="">
          </a>
        </div>

        <div class="collapse navbar-collapse">
          <ul class="nav navbar-nav navbar-right">
              <li><a><?php echo "$nama_lengkap";?></a></li>
              <li><a href="../model/p_logout_admin.php" onClick="return confirm('Apakah anda yakin ?')">Logout</a></li>
          </ul>
        </div>

      </div>
    </section>



    <div class="table-responsive">
    <div class="container">

      <?php
      $sql = "SELECT * FROM jemput";
      $hasil = $koneksi->query($sql);
      ?>
      <table style="margin-top:10px;" class="table table-hover text-center col-md-12">
      <tr>
        <th class="text-center">NAMA KORBAN</th>
        <th class="text-center">TELEPON KORBAN</th>
        <th class="text-center">DUSUN</th>
        <th class="text-center">STATUS</th>
      </tr>
      <?php
      if ($hasil->num_rows > 0){
        while ($baris = $hasil->fetch_assoc()){
          $nik_pelapor = $baris['nik_pelapor'];
          $nama_korban = $baris['nama_korban'];
          $telepon_korban = $baris['telepon_korban'];
          $dusun = $baris['dusun'];
          $status = $baris['status'];
      ?>
          <tr>
            <td>
              <a class='btn btn-link' href='../model/p_edit_admin.php?nik_pelapor=<?php echo "$nik_pelapor" ?>'>
              <?php echo "$nama_korban" ?>
              </a>
            </td>

            <td>
              <a style='color:#a5c422;' href='tel:<?php echo "$telepon_korban" ?>'><?php echo "$telepon_korban" ?></a>
            </td>
            <td><?php echo "$dusun" ?></td>
            <td><?php echo "$status" ?></td>
          </tr>
      <?php
        }
      }else{
        echo "<h5 style='color:red;' class='text-center'>Belum Ada Pengajuan Penjemputan</h5>";
      }

      $koneksi->close();
      ?>
      </table></div></div>

      <footer data-stellar-background-ratio="5">
        <div class="container">
          <div class="row">
            <div class="col-md-6 col-sm-6">
              <div class="footer-thumb">
                <h4 class="wow fadeInUp" data-wow-delay="0.4s">Contact Info</h4>
                <p>Silahkan hubungi kami secara langsung jika ada kendala dalam proses penjemputan.</p>

                <div class="contact-info">
                  <p><i class="fa fa-phone"></i> +62-821-7732-9234</p>
                  <p><i class="fa fa-envelope-o"></i> <a href="mailto:bangadit.irawan@gmail.com">mail@adtputr.com</a></p>
                </div>

              </div>
            </div>

            <div class="col-md-6 col-sm-6">
              <div class="footer-thumb">

                <div class="opening-hours">
                  <h4 class="wow fadeInUp" data-wow-delay="0.4s">Opening Hours</h4>
                  <p>Monday - Friday <span>08:00 AM - 17:00 PM</span></p>
                  <p>Saturday <span>08:00 AM - 14:00 PM</span></p>
                  <p>Sunday <span>Closed</span></p>
                </div>

                <ul class="social-icon">
                  <li><a href="https://www.facebook.com/adityacakil" class="fa fa-facebook"></a></li>
                  <li><a href="https://www.instagram.com/adtputr" class="	fa fa-instagram"></a></li>
                  <li><a href="https://www.youtube.com/channel/UCny9g9FHbEMOovZv6KLsLaQ?view_as=subscriber" class="fa fa-youtube-play"></a></li>
                </ul>

              </div>
            </div>

            <div class="col-md-12 col-sm-12 border-top">
              <div class="col-md-10 col-sm-12">
                <div class="copyright-text">
                  <p>Copyright &copy; 2018 Zoom Studio</p>
                </div>
              </div>

              <div class="col-md-2 col-sm-2 text-align-center">
                <div class="angle-up-btn">
                  <a href="#top" class="smoothScroll wow fadeInUp" data-wow-delay="1.2s"><i class="fa fa-angle-up"></i></a>
                </div>
              </div>
            </div>

          </div>
        </div>
      </footer>

    <script src="../style/js/jquery.js"></script>
    <script src="../style/js/bootstrap.min.js"></script>
    <script src="../style/js/jquery.sticky.js"></script>
    <script src="../style/js/jquery.stellar.min.js"></script>
    <script src="../style/js/wow.min.js"></script>
    <script src="../style/js/smoothscroll.js"></script>
    <script src="../style/js/owl.carousel.min.js"></script>
    <script src="../style/js/custom.js"></script>

  </body>
</html>
