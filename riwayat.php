<?php
session_start();
require_once 'config/connection.php';
require_once 'models/database.php';
include 'models/product.php';

$connection = new Database($host, $user, $pass, $database);
$product = new Product($connection);

if (!isset($_SESSION['pelanggan']) OR empty($_SESSION['pelanggan'])) {
    echo "<script>
    window.location.href = 'login/index.php';
    </script>";
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <title>Cheese Roll</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <meta content="Free HTML Templates" name="keywords" />
    <meta content="Free HTML Templates" name="description" />

    <!-- Favicon -->
    <link href="assets/img/favicon.ico" rel="icon" />

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com" />
    <link
      href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap"
      rel="stylesheet"
    />

    <!-- Font Awesome -->
    <link
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css"
      rel="stylesheet"
    />

    <!-- Libraries Stylesheet -->
    <link href="assets/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="assets/css/style.css" rel="stylesheet" />

    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }

      .b-example-divider {
        height: 3rem;
        background-color: rgba(0, 0, 0, .1);
        border: solid rgba(0, 0, 0, .15);
        border-width: 1px 0;
        box-shadow: inset 0 .5em 1.5em rgba(0, 0, 0, .1), inset 0 .125em .5em rgba(0, 0, 0, .15);
      }

      .b-example-vr {
        flex-shrink: 0;
        width: 1.5rem;
        height: 100vh;
      }

      .bi {
        vertical-align: -.125em;
        fill: currentColor;
      }

      .nav-scroller {
        position: relative;
        z-index: 2;
        height: 2.75rem;
        overflow-y: hidden;
      }

      .nav-scroller .nav {
        display: flex;
        flex-wrap: nowrap;
        padding-bottom: 1rem;
        margin-top: -1px;
        overflow-x: auto;
        text-align: center;
        white-space: nowrap;
        -webkit-overflow-scrolling: touch;
      }

      .logo-image{
        width: 230px;
        height: 46px;
        margin-top: -120px;
      }
    </style>

  </head>

  <body>
    <!-- Topbar Start -->
    <div class="container-fluid bg-dark">
      <div class="row py-2 px-lg-5">
        <div class="col-lg-6 text-center text-lg-left mb-2 mb-lg-0">
          <div class="d-inline-flex align-items-center text-white">
            <small><i class="fa fa-phone-alt mr-2"></i>089531852238</small>
            <small class="px-3">|</small>
            <small
              ><i class="fa fa-envelope mr-2"></i
              >miftahfadilah71@gmail.com</small
            >
          </div>
        </div>
        <div class="col-lg-6 text-center text-lg-right">
          <div class="d-inline-flex align-items-center">
            <a class="text-white px-2" href="">
              <i class="fab fa-facebook-f"></i>
            </a>
            <a class="text-white px-2" href="">
              <i class="fab fa-twitter"></i>
            </a>
            <a class="text-white px-2" href="">
              <i class="fab fa-linkedin-in"></i>
            </a>
            <a class="text-white px-2" href="">
              <i class="fab fa-instagram"></i>
            </a>
            <a class="text-white pl-2" href="">
              <i class="fab fa-youtube"></i>
            </a>
          </div>
        </div>
      </div>
    </div>
    <!-- Topbar End -->

    <!-- Navbar Start -->
    <div class="container-fluid sticky-top p-0">
      <nav
        class="navbar navbar-expand-lg bg-dark navbar-dark py-3 py-lg-0 px-lg-5"
      >
      <a href="index.html" class="navbar-brand ml-lg-3">
          <div class="logo-image">
            <img class="img-fluid" src="assets/img/cheese.png">
          </div>
        </a>
        <button
          type="button"
          class="navbar-toggler"
          data-toggle="collapse"
          data-target="#navbarCollapse"
        >
          <span class="navbar-toggler-icon"></span>
        </button>
        <div
          class="collapse navbar-collapse justify-content-between px-lg-3"
          id="navbarCollapse"
        >
          <div class="navbar-nav m-3 py-0">
            <a href="index.php" class="nav-item nav-link mx-5">Home</a>
            <a href="product.php" class="nav-item nav-link mx-5">Produk</a>
            <a href="cart.php" class="nav-item nav-link mx-5">keranjang</a>
            <?php if(isset($_SESSION['pelanggan'])) : ?>
              <a href="riwayat.php" class="nav-item nav-link active mx-5">Riwayat</a>
            <?php endif; ?>
          </div>
          <!-- Jika sudah login (ada session pelanggan) -->
			    <?php if (isset($_SESSION['pelanggan'])): ?>
				  <a class="btn btn-primary py-2 px-4 d-none d-lg-block" href="login/logout.php" onclick="return confirm('Apakah anda ingin logout ?')">Logout</a>
			    <!-- Jika belum login (tidak ada session pelanggan) -->
				  <?php else: ?>
			    <a href="login/index.php" class="btn btn-primary py-2 px-4 d-none d-lg-block"
            >Login</a
          >
			    <?php endif ?>
        </div>
      </nav>
    </div>
    <!-- Navbar End -->

    <!-- Team Start -->
    <div class="container-fluid pt-5">
  <main>
    <div class="py-5 text-center">
      <h2 class="text-primary">Riwayat</h2>
    </div>
    <div class="container">
    <table class="table table-bordered">
  <thead class="table-warning">
    <tr>
      <th scope="col">No.</th>
      <th scope="col">Tanggal Pembelian</th>
      <th scope="col">Total</th>
      <th scope="col">Status</th>
      <th scope="col">Opsi</th>
    </tr>
  </thead>
  <tbody>
    <?php
    $no = 1;
    $id_pelanggan = $_SESSION['pelanggan']['id_pelanggan']; 
    $ambil = $connection->conn->query("SELECT * FROM pembelian WHERE id_pelanggan = '$id_pelanggan'");
    while ($pecah = $ambil->fetch_object()) : ?>
    <tr>
      <th scope="row"><?= $no; ?></th>
      <td><?= $pecah->tanggal_pembelian; ?></td>
      <td>Rp. <?= number_format($pecah->total_pembelian); ?></td>
      <td>
        <?php echo $pecah->status_pembelian; ?><br>
			<?php if(!empty($pecah->resi_pembelian)): ?>
			Nomor Resi : <?php echo $pecah->resi_pembelian; ?>
			<?php endif ?>
	</td>
      <td>
        <a href="nota.php?id=<?= $pecah->id_pembelian; ?>" class="btn btn-info">Lihat Invoice</a>
        <?php if($pecah->status_pembelian == "Pending") :  ?>
        <a href="pembayaran.php?id=<?= $pecah->id_pembelian ?>" class="btn btn-success">Pembayaran</a>
        <?php else: ?>
            <a href="lihat_pembayaran.php?id=<?= $pecah->id_pembelian ?>" type="button" class="btn btn-success">Lihat Pembayaran</a>
        <?php endif; ?>
      </td>
    </tr>
    <?php
    $no++;
    endwhile;
    ?>
  </tbody>
</table>
    </div>
  </main>
</div>
        </div>
      </div>
    </div>
    <!-- Team End -->

    <!-- Footer Start -->
    <div class="container-fluid bg-dark text-white mt-5 py-5 px-sm-3 px-md-5">
      <div class="row pt-5">
        <div class="col-lg-7 col-md-6">
          <div class="row">
            <div class="col-md-6 mb-5">
              <h3 class="text-primary mb-4">Cheese Roll Loetjo</h3>
              <p>
                <i class="fa fa-map-marker-alt mr-2"></i>Cibanteng Grya Raharja Blok B4 no 2 RT 01
RW 08 Desa Cibanteng Kec. Ciampea, Bogor. 
              </p>
              <p>
              <a target="_blank" href="https://wa.me/628989543968">  
              <i class="fa fa-phone-alt mr-2"></i>0898-9543-968</p>
              </a>
              <p>
                <i class="fa fa-envelope mr-2"></i>cheeserollloetjoe@gmail.com
              </p>
            </div>
          </div>
        </div>
        <div class="col-lg-5 col-md-6 mb-5">
          <h3 class="text-primary mb-4">Ikuti Kami</h3>
          <a class="btn btn-outline-light btn-social mr-2" target="_blank" href="https://twitter.com/loetjoecheese?t=sAj2hzYlr7bHN_ZYm-nUeA&s=09
"
                  ><i class="fab fa-twitter"></i
                ></a>
                <a class="btn btn-outline-light btn-social mr-2" target="_blank" href="https://www.facebook.com/profile.php?id=100086273923445"
                  ><i class="fab fa-facebook-f"></i
                ></a>
                <a class="btn btn-outline-light btn-social mr-2" target="_blank" href="#"
                  ><i class="fab fa-tiktok"></i
                ></a>
                <a class="btn btn-outline-light btn-social" target="_blank" href="https://instagram.com/cheeseroll.loetjoe?igshid=YmMyMTA2M2Y="
                  ><i class="fab fa-instagram"></i
                ></a>
            </div>
          </div>
        </div>
    <div
      class="container-fluid bg-dark text-white border-top py-4 px-sm-3 px-md-5"
      style="border-color: #3e3e4e !important"
    >
      <div class="row">
        <div class="col-lg-6 text-center text-md-left mb-3 mb-md-0">
          <p class="m-0 text-white">
            &copy; <a href="#">Cheese Roll</a>. All Rights Reserved.

            <!--/*** This template is free as long as you keep the footer author’s credit link/attribution link/backlink. If you'd like to use the template without the footer author’s credit link/attribution link/backlink, you can purchase the Credit Removal License from "https://htmlcodex.com/credit-removal". Thank you for your support. ***/-->
            Designed by <a href="https://htmlcodex.com">HTML Codex</a>
            <br />Distributed By:
            <a href="https://themewagon.com" target="_blank">ThemeWagon</a>
          </p>
        </div>
        <div class="col-lg-6 text-center text-md-right">
          <ul class="nav d-inline-flex">
            <li class="nav-item">
              <a class="nav-link text-white py-0" href="#">Privacy</a>
            </li>
            <li class="nav-item">
              <a class="nav-link text-white py-0" href="#">Terms</a>
            </li>
            <li class="nav-item">
              <a class="nav-link text-white py-0" href="#">FAQs</a>
            </li>
            <li class="nav-item">
              <a class="nav-link text-white py-0" href="#">Help</a>
            </li>
          </ul>
        </div>
      </div>
    </div>
    <!-- Footer End -->

    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary back-to-top"
      ><i class="fa fa-angle-double-up"></i
    ></a>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="assets/lib/easing/easing.min.js"></script>
    <script src="assets/lib/waypoints/waypoints.min.js"></script>
    <script src="assets/lib/counterup/counterup.min.js"></script>
    <script src="assets/lib/owlcarousel/owl.carousel.min.js"></script>

    <!-- Contact Javascript File -->
    <script src="assets/mail/jqBootstrapValidation.min.js"></script>
    <script src="assets/mail/contact.js"></script>

    <!-- Template Javascript -->
    <script src="assets/js/main.js"></script>
  </body>
</html>
