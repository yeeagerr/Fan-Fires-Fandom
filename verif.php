<?php
include('db/db.php');

$kode = $_GET['kode'];

if (isset($kode)) {
    $sql = mysqli_query($conn, "SELECT * FROM user WHERE kode = '$kode'");
    $result = mysqli_fetch_assoc($sql);

    if ($result['kode'] == $kode) {

        try {
            mysqli_query($conn, "UPDATE user SET status = 'Aktif' WHERE kode = '$kode'");
            mysqli_query($conn, "UPDATE user SET kode = 'verified' WHERE kode = '$kode'");

            echo "<script>alert('Akun anda sudah terverifikasi silahkan login');</script>" . "<script> window.location='ffflogin.php';</script>";
        } catch (mysqli_sql_exception) {
            echo "Something wrong";
        }
    } else {
        echo "<script>alert('Verifikasi Sudah Expired'); window.location='fffregister.php';</script>";
    }
}
