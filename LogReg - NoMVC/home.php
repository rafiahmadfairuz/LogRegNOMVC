<?php
// Memulai sesi / Inisialisasi sesi
session_start();
//  Cek apakah ada sesion user aktif? jika tidak
// if(!isset($_SESSION["user"])) {
//     header('location:login.php'); // arahkan ke login.php
// };
// tidak perlu karena saya ingin saat pertama kali masuk langsung ke home
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
   <!-- Link Style Bootstrap -->
   <link rel="stylesheet" href="bootstrap-5.3.3-dist/css/bootstrap.min.css">
    <!-- Icon Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <!-- Link Css Kustom -->
    <link rel="stylesheet" href="style.css">
</head>
<body>

<nav class="navbar shadow-sm bg-body-tertiary border-bottom sticky-top z-3 border" >
      <div class="container-fluid px-2 px-md-3 px-lg-5 ">
        <button class="btn d-block d-md-none" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <a class="navbar-brand fw-bold fs-1 d-none d-md-block logo mb-2" href="index.html">Skamart</a>
          <form class="d-flex input-group  p-1 col  mx-2  mx-lg-4" role="search" >
            <input required="" type="text" name="text" autocomplete="off" class="input w-100 rounded rounded-4 p-2" placeholder="Cari Produk"  id="cariProduk">
          </form>
          <div class="d-flex ms-auto align-items-center ">
            <i class="bi bi-cart2 position-relative fs-1  me-md-3 " type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasScrolling" aria-controls="offcanvasScrolling"></i>
            <div class="offcanvas offcanvas-bottom" data-bs-scroll="true" data-bs-backdrop="false" tabindex="-1" id="offcanvasScrolling" aria-labelledby="offcanvasScrollingLabel">
              <div class="offcanvas-header border-bottom">
                <h5 class="offcanvas-title fw-bold fs-2" id="offcanvasScrollingLabel">Keranjang Belanja</h5>
                <button type="button" class="btn-close fs-4" data-bs-dismiss="offcanvas" aria-label="Close"></button>
              </div>
              <div class="offcanvas-body">
                <div class="container-fluid  border-bottom py-2">
                  <div class=" cart-item d-flex justify-content-between">
                      <div class="d-flex column-gap-0 column-gap-sm-1 column-gap-md-5">
                          <input type="checkbox">        
                      <div >
                          <img src="asset/img/download (6).jpeg" alt="Product Image">
                      </div>
                      <div class="d-flex flex-column justify-content-center align-items-center">
                              <div class="cart-item-title">Chitato</div>
                              <div class="cart-item-price text-secondary">$20.00</div>
                      </div>
                     </div>
                      <div class=" cart-item-controls">
                          <button class="btn btn-sm btn-outline-secondary">-</button>
                          <input type="number" value="1" min="1">
                          <button class="btn btn-sm btn-outline-secondary">+</button>
                      </div>
                  </div>
                </div>

              </div>
              <div class="sticky-bottom border rounded-top-5 shadow-lg px-3 px-lg-5 py-3 bg-light z-3">
                <div class="d-flex flex-column">
                  <div class="d-flex justify-content-between">
                    <span class="fw-bold">Selected Item (2)</span>
                    <span class="fw-bold">Rp.400.324</span>
                  </div>
                  <button class="btn btn-success fw-bold my-2 my-lg-4">Beli Sekarang</button>
                </div>
              </div>
            </div>
  
            
  
            <div class="log border-start border-2 ps-1 ps-md-4 d-none d-md-block">

            <?php if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true): ?>
                <div class="d-block">
                <div class="dropdown">
                   <i class="bi bi-person-circle fs-2"  type="button" data-bs-toggle="dropdown" aria-expanded="false"></i>
                  <ul class="dropdown-menu dropdown-menu-light border shadow-sm dropdown-menu-end">
                   <li class="d-flex align-items-center justify-content-center"><i class="bi bi-person-circle dropdown-item "><span class="ms-2"><?php echo htmlspecialchars($_SESSION['username']); ?></span></i></li>
                   <li><hr class="dropdown-divider"></li>
                   <li><a class="dropdown-item" href="#">rafiahmad@yahoo.com</a></li>
                   <li><hr class="dropdown-divider"></li>
                  <li ><a class="dropdown-item d-flex align-items-center" href="logout.php" ><i class="bi bi-box-arrow-in-left mx-2"></i> Sign Out</a></li>
                  </ul>
                 </div>
                </div>
                
                <div class="d-none">
                <a href="login.php "><button class="btn btn-outline-success">Masuk</button></a>
                <a href="register.php "><button class="btn btn-success">Daftar</button></a>
                </div>
            <?php else: ?>
                <div class="dropdown d-none">
                <i class="bi bi-person-circle fs-3  "  type="button" data-bs-toggle="dropdown" aria-expanded="false"></i>
                <ul class="dropdown-menu dropdown-menu-light border shadow-sm">
                  <li class="d-flex align-items-center justify-content-center"><i class="bi bi-person-circle dropdown-item">Rafi' ahmad</i></li>
                  <li><hr class="dropdown-divider"></li>
                  <li><a class="dropdown-item" href="#">rafiahmad@yahoo.com</a></li>
                  <li><hr class="dropdown-divider"></li>
                  <li ><a class="dropdown-item d-flex align-items-center" href="logout.php" ><i class="bi bi-box-arrow-in-left mx-2"></i> Sign Out</a></li>
                </ul>
              </div>
              <div class="d-block">
                <a href="login.php "><button class="btn btn-outline-success">Masuk</button></a>
                <a href="register.php "><button class="btn btn-success">Daftar</button></a>
              </div>
            <?php endif; ?>

                
            </div>
            <i class="bi bi-box-arrow-right fs-2 mt-1 ms-2 d-block d-md-none"></i>
          </div>
      </div>
      <div class="navbar-expand-md d-flex w-100  ">
        <div class="offcanvas offcanvas-navbar offcanvas-start" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
          <div class="offcanvas-header border-bottom">
             <a class="offcanvas-title fw-bold fs-1 logo" id="offcanvasNavbarLabel" href="index.html">Skamart</a>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
          </div>
          <div class="offcanvas-body">
            <div class="mx-md-auto d-flex flex-column flex-md-row column-gap-5 row-gap-4 fw-bold py-1">
              <ul class="navbar-nav "><li><a href="#beranda">Beranda</a></li></ul>
              <ul class="navbar-nav "><li><a href="#promo">Promo</a></li></ul>
              <ul class="navbar-nav "><li><a href="#produk">Produk</a></li></ul>
              <ul class="navbar-nav "><li><a href="#palinglaris">Paling Laris</a></li></ul>
              <ul class="navbar-nav "><li><a href="#tentang">Tentang Kami</a></li></ul>
            </div>
            
          </div>
        </div>
      </div>
    </nav>

    



  

     <!-- Js Bootstrap -->
     <script src="bootstrap-5.3.3-dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>



