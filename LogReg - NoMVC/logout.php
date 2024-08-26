<?php
session_start(); // memulai sesi baru
session_destroy(); // menghapus sesi secara tertulis
echo '<script>alert("Berhasil logout");
location.href="login.php"</script>';
?>