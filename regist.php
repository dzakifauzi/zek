<?php
session_start();
include("config.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = isset($_POST['nama']) ? $_POST['nama'] : '';
    $email = isset($_POST['email']) ? $_POST['email'] : '';
    $password = isset($_POST['password']) ? $_POST['password'] : '';
    $telepon = isset($_POST['telepon']) ? $_POST['telepon'] : '';

    // Check if email and password are not empty
    if(empty($email) || empty($password)) {
        ?>
        <script>
            alert('Email atau password tidak boleh kosong!')
        </script>
        <?php
        exit; // Stop further execution
    }

    $host = "localhost";
    $user = "root";
    $db_password = "";
    $database = "db_users";

    $koneksi = mysqli_connect($host, $user, $db_password, $database);

    if (!$koneksi) {
        die("Koneksi database gagal: " . mysqli_connect_error());
    }

    $query = "INSERT INTO tbl_users (nama, email, password, telepon) VALUES ('$nama', '$email', '$password', '$telepon')";
    $query_result = mysqli_query($koneksi, $query);

    if (!$query_result) {
        die("Query failed: " . mysqli_error($koneksi));
    }

    $jumlah_data = mysqli_affected_rows($koneksi);  
}

if(isset($jumlah_data) && $jumlah_data > 0){
    ?>
    <script>
        alert('Data berhasil dibuat!');
    </script>
    <?php        
} else {
    ?>
    <script>
        alert('Anda gagal membuat akun, silakan coba lagi!');
    </script>
    <?php
}
?>