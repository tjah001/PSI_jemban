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



    <section id="appointment" data-stellar-background-ratio="3">
      <div class="container">
        <?php
        include "../conf/koneksi.php";
        $nik_pelapor = $_GET['nik_pelapor'];
        $sql = "SELECT * FROM jemput WHERE nik_pelapor='$nik_pelapor'";
        $hasil = $koneksi->query($sql);
        if ($hasil->num_rows) {
          echo "<form action='p_update_admin.php' method='POST'>";
        	while ($baris = $hasil->fetch_array()) {
        	  $nik_pelapor = $baris['nik_pelapor'];
                $nama_korban = $baris['nama_korban'];
            $dusun = $baris['dusun'];
            $alamat_detail = $baris['alamat_detail'];

            $nama_pelapor = $baris['nama_pelapor'];
            $telepon_pelapor = $baris['telepon_pelapor'];

            $nik_korban = $baris['nik_korban'];
            $telepon_korban = $baris['telepon_korban'];

            $j_lansia = $baris['j_lansia'];
            $j_bayi = $baris['j_bayi'];
            $j_anak = $baris['j_anak'];

            $j_remaja = $baris['j_remaja'];
            $j_dewasa = $baris['j_dewasa'];

            $j_sapi = $baris['j_sapi'];
            $j_kambing = $baris['j_kambing'];
            $j_ungas = $baris['j_ungas'];
            $j_kucing = $baris['j_kucing'];

            $kecamatan = $baris['kecamatan'];
            $kelurahan = $baris['kelurahan'];

            $nama_lengkap = $baris['nama_lengkap'];
            $status = $baris['status'];
        		?>
            <h3><?php echo "$nama_korban"; ?></h3>

            <div class="col-md-12 col-sm-12">
              <hr>
            </div>

              <div class="col-md-6 col-sm-6">
                <label for="dusun">Dusun</label>
                <input class="form-control" type='text' name='dusun' readonly
                value='<?php echo "$baris[dusun]";?>'>
              </div>

              <div class="col-md-6 col-sm-6">
                <label for="alamat_detail">Alamat Detail</label>
                <input class="form-control" type='text' name='alamat_detail' readonly
                value='<?php echo "$baris[alamat_detail]";?>'>
              </div>

              <div class="col-md-6 col-sm-6">
                <label for="status">Status</label>
                <select class="form-control" type='text' name='status'>
                <?php
                if ($baris['status'] == "Menunggu") echo "<option value='Menunggu' selected>Menunggu</option>";
                else echo "<option value='Menunggu'>Menunggu</option>";
                if ($baris['status'] == "Penjemputan") echo "<option value='Penjemputan' selected>Penjemputan</option>";
                else echo "<option value='Penjemputan'>Penjemputan</option>";
                if ($baris['status'] == "Selesai") echo "<option value='Selesai' selected>Selesai</option>";
                else echo "<option value='Selesai'>Selesai</option>";
                ?>
                </select>
              </div>

              <div class="col-md-6 col-sm-6">
                <label for="nama_lengkap">Penjemput</label>
                <select class="form-control" type='text' name='nama_lengkap'>
                <?php
                if ($baris['nama_lengkap'] == "Belum Ada") echo "<option value='Belum Ada' selected>Belum Ada</option>";
                else echo "<option value='Belum Ada'>Belum Ada</option>";

                if ($baris['nama_lengkap'] == "Aditya Putra Irawan") echo "<option value='Aditya Putra Irawan' selected>Aditya Putra Irawan</option>";
                else echo "<option value='Aditya Putra Irawan'>Aditya Putra Irawan</option>";

                if ($baris['nama_lengkap'] == "Aditya Mahavira") echo "<option value='Aditya Mahavira' selected>Aditya Mahavira</option>";
                else echo "<option value='Aditya Mahavira'>Aditya Mahavira</option>";

                if ($baris['nama_lengkap'] == "Moch Dian Nafi") echo "<option value='Moch Dian Nafi' selected>Moch Dian Nafi</option>";
                else echo "<option value='Moch Dian Nafi'>Moch Dian Nafi</option>";

                if ($baris['nama_lengkap'] == "Muhammad Yasin") echo "<option value='Muhammad Yasin' selected>Muhammad Yasin</option>";
                else echo "<option value='Muhammad Yasin'>Muhammad Yasin</option>";
                ?>
                </select>
              </div>

              <div class="col-md-12 col-sm-12">
                <p>
                  <input class="btn btn-link" type="submit" name="submit" value="UPDATE" onClick="return confirm('Apakah anda yakin?')">
                  <a class="btn btn-link" href='../view/home_admin.php'>CANCEL</a>
                  <a class='btn btn-link' href='p_hapus_admin.php?nik_pelapor=<?php echo "$nik_pelapor" ?>' onClick="return confirm('Apakah anda yakin ?')">HAPUS</a>
                </p>
              </div>

              <h3>Informasi</h3><br>

              <div class="col-md-4 col-sm-4">
                <label for="nik_pelapor">NIK Pelapor</label>
                <input class="form-control" type='text' name='nik_pelapor' readonly
                value='<?php echo "$baris[nik_pelapor]";?>'>
              </div>

              <div class="col-md-4 col-sm-4">
                <label for="nama_pelapor">Nama Pelapor</label>
                <input class="form-control" type='text' name='nama_pelapor' readonly
                value='<?php echo "$baris[nama_pelapor]";?>'>
              </div>

              <div class="col-md-4 col-sm-4">
                <label for="telepon_pelapor">Telepon Pelapor</label>
                <input class="form-control" type='text' name='telepon_pelapor' readonly
                value='<?php echo "$baris[telepon_pelapor]";?>'>
              </div>

              <div class="col-md-1 col-sm-1 visible-sm visible-xs">
                <label for="">Tlp:</label>
                <a class="btn btn-link" href="tel:<?php echo "$baris[telepon_pelapor]";?>"> CALL </a>
              </div>

              <div class="col-md-12 col-sm-12">
                <hr>
              </div>

              <div class="col-md-4 col-sm-4">
                <label for="nik_korban">NIK Korban</label>
                <input class="form-control" type='text' name='nik_korban' readonly
                value='<?php echo "$baris[nik_korban]";?>'>
              </div>

              <div class="col-md-4 col-sm-4">
                <label for="nama_korban">Nama Korban</label>
                <input class="form-control" type='text' name='nama_korban' readonly
                value='<?php echo "$baris[nama_korban]";?>'>
              </div>

              <div class="col-md-4 col-sm-4">
                <label for="telepon_korban">Telepon Korban</label>
                <input class="form-control" type='text' name='telepon_korban' readonly
                value='<?php echo "$baris[telepon_korban]";?>'>
              </div>

              <div class="col-md-1 col-sm-1 visible-sm visible-xs">
                <label for="">Tlp:</label>
                <a class="btn btn-link" href="tel:<?php echo "$baris[telepon_korban]";?>"> CALL </a>
              </div>

              <div class="col-md-12 col-sm-12">
                <hr>
              </div>

              <div class="col-md-2 col-sm-2">
                <label for="j_lansia">Lansia</label>
                <input class="form-control" type='text' name='j_lansia' readonly
                value='<?php echo "$baris[j_lansia]";?>'>
              </div>

              <div class="col-md-2 col-sm-2">
                <label for="j_bayi">Bayi</label>
                <input class="form-control" type='text' name='j_bayi' readonly
                value='<?php echo "$baris[j_bayi]";?>'>
              </div>

              <div class="col-md-2 col-sm-2">
                <label for="j_anak">Anak-Anak</label>
                <input class="form-control" type='text' name='j_anak' readonly
                value='<?php echo "$baris[j_anak]";?>'>
              </div>

              <div class="col-md-2 col-sm-2">
                <label for="j_remaja">Remaja</label>
                <input class="form-control" type='text' name='j_remaja' readonly
                value='<?php echo "$baris[j_remaja]";?>'>
              </div>

              <div class="col-md-2 col-sm-2">
                <label for="j_dewasa">Dewasa</label>
                <input class="form-control" type='text' name='j_dewasa' readonly
                value='<?php echo "$baris[j_dewasa]";?>'>
              </div>

              <div class="col-md-12 col-sm-12">
                <hr>
              </div>

              <div class="col-md-2 col-sm-2">
                <label for="j_sapi">Sapi</label>
                <input class="form-control" type='text' name='j_sapi' readonly
                value='<?php echo "$baris[j_sapi]";?>'>
              </div>

              <div class="col-md-2 col-sm-2">
                <label for="j_kambing">Kambing</label>
                <input class="form-control" type='text' name='j_kambing' readonly
                value='<?php echo "$baris[j_kambing]";?>'>
              </div>

              <div class="col-md-2 col-sm-2">
                <label for="j_ungas">Ungas</label>
                <input class="form-control" type='text' name='j_ungas' readonly
                value='<?php echo "$baris[j_ungas]";?>'>
              </div>

              <div class="col-md-2 col-sm-2">
                <label for="j_kucing">Kucing & Anjing</label>
                <input class="form-control" type='text' name='j_kucing' readonly
                value='<?php echo "$baris[j_kucing]";?>'>
              </div>

              <div class="col-md-12 col-sm-12">
                <hr>
              </div>

              <div class="col-md-2 col-sm-2">
                <label for="kecamatan">Kecamatan</label>
                <input class="form-control" type='text' name='kecamatan' readonly
                value='<?php echo "$baris[kecamatan]";?>'>
              </div>

              <div class="col-md-2 col-sm-2">
                <label for="kelurahan">Kelurahan</label>
                <input class="form-control" type='text' name='kelurahan' readonly
                value='<?php echo "$baris[kelurahan]";?>'>
              </div>

              <div class="col-md-2 col-sm-2">
                <label for="dusun">Dusun</label>
                <input class="form-control" type='text' name='dusun' readonly
                value='<?php echo "$baris[dusun]";?>'>
              </div>

              <div class="col-md-2 col-sm-2">
                <label for="alamat_detail">Alamat Detail</label>
                <input class="form-control" type='text' name='alamat_detail' readonly
                value='<?php echo "$baris[alamat_detail]";?>'>
              </div>




            <?php
          }
        }
        $koneksi->close();
        ?>
      </div>
    </section>




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
