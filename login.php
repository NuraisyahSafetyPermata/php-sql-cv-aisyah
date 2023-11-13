<?php
// Untuk penghubung dengan file koneksi
include 'koneksi.php';

// Cara menangkap data yang dikirim dari form
if (isset($_POST['input'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Ambil data dari database tabel login dengan username dan password yang sesuai
    $data = mysqli_query($koneksi, "SELECT * FROM login WHERE username='$username' AND password='$password'");
    if (mysqli_num_rows($data)) {
        // Jika login berhasil, arahkan pengguna ke halaman dashboard.php
        header("Location: index.php");
        exit(); // Pastikan untuk keluar setelah melakukan pengalihan header
    } else {
        echo "Login Gagal";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
 <title>Halaman Login</title>
 <!-- Versi CDN Bootstrap -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
 <link rel="stylesheet" type="text/css" href="main.css">
</head>

<body>
<h1>Login</h1>
    <div class="form">
        <form action="login.php" method="post" name="form_input">
            <div class="username">
                Username : <input type="text" name="username" placeholder="Masukan Username" required="">
            </div>
            <div class="password">
                Password : <input type="text" name="password" placeholder="Masukan Password" required="">
            </div>

            <div class="tombol">
                <input type="submit" name="input" value="LOGIN">
                <input type="reset" name="reset" value="RESET">
            </div>
        </form>
    </div>
 
</body>
</html>