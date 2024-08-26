<?php
session_start();
include "koneksi.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
   <!-- Link Style Bootstrap -->
   <link rel="stylesheet" href="bootstrap-5.3.3-dist/css/bootstrap.min.css">
    <!-- Icon Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <!-- Link Css Kustom -->
    <link rel="stylesheet" href="style.css">
</head>
<body>

<?php
if(isset($_POST['email'])) {
    $email = $_POST['email'];
    $password = md5($_POST['password']);

    $query = mysqli_query($koneksi, "SELECT*FROM user where email='$email' and password='$password'");

    if(mysqli_num_rows($query) > 0){
        $data = mysqli_fetch_array($query);
        $_SESSION['user'] = $data;
        echo '<script>alert("selamat datang");
          location.href="home.php"</script>';
          $_SESSION['loggedin'] = true;
          $_SESSION['username'] = $email;
    } else {
        echo '<script>alert("email/password tidak sesuai");</script>';
    }
}
?>
    
    <div class="container-fluid vh-100 d-flex justify-content-center align-items-center">
        <div class="login-card border border-3 col-12 col-sm-10 col-md-8 col-lg-6 col-xl-4 col-xxl-3 p-4 p-sm-5 shadow-lg rounded rounded-4 bg-light">
            <h1 class="fw-bold text-success text-center py-3 display-4">Login</h1>
            <form action="" method="post"> 
                <div class="d-flex flex-column my-3">
                    <label for="email" class="fw-bold text-success">Email</label>
                    <div class="d-flex position-relative">
                        <i class="bi bi-envelope-at icon"></i>
                        <input type="email" name="email" class="w-100 rounded rounded-3 border-1 ps-5 py-1" required>
                    </div>
                    <!-- Pesan kesalahan dinamis -->
                    <?php if (isset($data['error']['email'])): ?>
                        <span class="text-danger my-1 text-nowrap">
                            <i class="bi bi-exclamation-triangle me-2"></i><?= $data['error']['email']; ?>
                        </span>
                    <?php endif; ?>
                </div>
                <div class="d-flex flex-column my-3">
                    <label for="password" class="fw-bold text-success">Password</label>
                    <div class="d-flex position-relative">
                        <i class="bi bi-lock icon"></i>
                        <input type="password" name="password" class="w-100 rounded rounded-3 border-1 ps-5 py-1" required>
                    </div>
                    <!-- Pesan kesalahan dinamis -->
                    <?php if (isset($data['error']['password'])): ?>
                        <span class="text-danger my-1 text-nowrap">
                            <i class="bi bi-exclamation-triangle me-2"></i><?= $data['error']['password']; ?>
                        </span>
                    <?php endif; ?>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="remember_me" id="flexCheckDefault">
                    <label class="form-check-label text-nowrap" for="flexCheckDefault">
                        Remember me
                    </label>
                </div>
                <button type="submit" class="w-100 btn btn-outline-success fw-bold rounded rounded-3 my-3">Login</button>
            </form>
            <p class="text-center">Belum Punya akun? <a href="register.php">Daftar Sekarang!</a></p>
        </div>
    </div>

    <!-- Js Bootstrap -->
    <script src="bootstrap-5.3.3-dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
