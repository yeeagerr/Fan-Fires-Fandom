<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
</head>

<body>
    <form action="<?php htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
        <input type="text" name="nama" placeholder="nama / panjang sisi">
        <input type="text" name="kelas" placeholder="kelas / keliling">
        <input type="number" name="nilai" placeholder="nilai">


        <input type="submit" name="submit">

    </form>

    <form action="latihan.php" method="post">
        <input type="number" name="umur" placeholder="umur">
        <input type="submit" name="submit2">

    </form>
    <?php
    if (isset($_POST['submit'])) {
        $nama = $_POST['nama'];
        $kelasi = $_POST['kelas'];
        $nilai = $_POST['nilai'];

        echo "Nama : $nama" . "<br>";
        echo "Kelas : $kelasi" . "<br>";
        echo "Nilai Web : $nilai" . "<br> <br>";
    }

    //nilai variabel
    $_nmsiswa = "Indah Merwati";
    $kelas = "XI RPL ";
    $nilai_web = 100;
    echo "Nama : $_nmsiswa" . "<br>";
    echo "Kelas : $kelas" . "<br>";
    echo "Nilai Web : $nilai_web" . "<br> <br>";

    //mtk
    if (isset($_POST['submit'])) {
        $panjangsisi = $_POST['nama'];
        $keliling = $_POST['kelas'] * $panjangsisi;

        echo "Panjang sisi persegi: " . $panjangsisi . "<br>";
        echo "Keliluing persegi: " . $keliling . "<br> <br>";
    }

    $panjangsisi = 5;
    $keliling = 4 * $panjangsisi;
    echo "Panjang sisi persegi: " . $panjangsisi . "<br>";
    echo "Keliluing persegi: " . $keliling . "<br> <br>";

    // if else
    $angka = -2;

    if ($angka > 0) {
        echo "$angka adalah positif <br>";
    } else {
        echo "$angka adalah negatif <br>";
    }

    $batasan = "admin";
    if ($batasan == "admin") {
        echo "Anda memiliki hak akses penuh, Selamat datang $batasan<br>";
    } else {
        echo "Anda memiliki hak akses terbatas.<br>";
    }
    $total_belanja = 150000;
    if ($total_belanja > 100000) {
        echo "anda dapat sertifikat rumah <br>";
    }

    $umur = 13;
    if ($umur < 18) {
        echo "kamu tidak boleh mmebuka situs ini<br>";
    } else {
        echo "selamat datang di situs ini";
    }

    $nilai = 60;

    echo "memeriksa variabel $nilai <br>";
    echo "nilai : $nilai <br>";

    if ($nilai >= 70) {
        echo "Selamat anda lulus, siswa ! <br>";
    } else {
        echo "mohon maaf siswa tidak lulus <br>";
    }


    if (isset($_POST['submit2'])) {
        $umur = $_POST['umur'];

        if ($umur >= 17) {
            echo "Kamu udah bisa";
        } else {
            echo "BELOM";
        }
    }


    ?>
</body>

</html>