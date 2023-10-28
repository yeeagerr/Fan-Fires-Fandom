<?php
include('db.php');
$error = '';
$sukses = '';

$email = '';
$username = '';
$password = '';
$tglLahir = '';
$kode = '';
$status = '';

//untuk update
if (isset($_GET['op'])) {
  $op = $_GET['op'];
} else {
  $op = '';
}

if ($op == 'update') {
  $id = $_GET['id'];

  $updateqry = mysqli_query($conn, "SELECT * FROM user WHERE id = '$id'");
  $fetchup = mysqli_fetch_array($updateqry);
  $email = $fetchup['email'];
  $username = $fetchup['username'];
  $password = $fetchup['password'];
  $tglLahir = $fetchup['tgl_lahir'];
  $kode = $fetchup['kode'];
  $status = $fetchup['status'];
}

//delete
if ($op == 'delete') {
  $deleteqry = mysqli_query($conn, "DELETE FROM user WHERE id = '$_GET[id]'");

  if ($deleteqry) {
    $sukses = "Data Berhasil Di Hapus";
  } else {
    $error = "Data Gagal Di Hapus";
  }
}

//untuk create dan update
if (isset($_POST['simpanbtn'])) {
  $email = $_POST['cemail'];
  $username = $_POST['cuser'];
  $password = $_POST['cpass'];
  $tglLahir = $_POST['ctgl'];
  $kode = $_POST['ckode'];
  $status = $_POST['cstatus'];


  if ($op == 'update') { // update
    $updatesql = "UPDATE user SET email = '$email', username = '$username', 
    password = '$password', tgl_lahir = '$tglLahir', kode = '$kode', status = '$status' WHERE id = '$_GET[id]'";
    $updatestart = mysqli_query($conn, $updatesql);

    if ($updatestart) {
      $sukses = "Akun Berhasil Di Edit";
    } else {
      $sukses = "Akun Tidak Berhasil Di Edit";
    }
  } else {
    if ( //create
      $email and $username and $password and $tglLahir
      and $kode and $status
    ) {

      $createqry = "INSERT INTO user (email, username, password, tgl_lahir, kode, status) 
                              VALUES ('$email', '$username', '$password', '$tglLahir', '$kode', '$status')";
      $rowscreate = mysqli_query($conn, "SELECT * FROM user WHERE email = '$email'");
      if (mysqli_num_rows($rowscreate) > 0) {
        $error = "Email Sudah Terdaftar !!";
      } else {
        $sqlcreate = mysqli_query($conn, $createqry);
        if ($sqlcreate) {
          $sukses = "Form Berhasil Di Isi, Akun Berhasil Di Buat";
        }
      }
    } else {
      $error = "Form Masih Kosong, Silahkan Isi Ulang !!";
    }
  }
}

//untuk batal
if (isset($_POST['batalbtn'])) {
  header("refresh:0;url=user.php"); //5 : detik
}





?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>ADMIN PANEL</title>
  <link rel="stylesheet" type="text/css" href="/iconweb/style/user.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css
    " />
</head>

<body>
  <div class="navbar">
    <div class="topnav">
      <div class="userpart">
        <img src="/iconweb/source/other/profil-default.png" alt="" />
      </div>

      <p>USERNAME</p>
    </div>

    <div class="nav-content">
      <div class="ncontent dashboard">
        <i class="fa-solid fa-gauge" style="margin-right: 20px; margin-left: 30px; font-size: 30px"></i>
        <p>DASHBOARD</p>
      </div>

      <div class="ncontent user">
        <i class="fa-solid fa-users" style="margin-right: 20px; margin-left: 30px; font-size: 30px"></i>
        <p>USER</p>
      </div>

      <div class="ncontent pages">
        <i class="fa-solid fa-window-restore" style="margin-right: 20px; margin-left: 30px; font-size: 30px"></i>
        <p>PAGES</p>
      </div>
    </div>
  </div>
  <div class="content">
    <div class="top">
      <div class="threeline-container">
        <div class="threeline">
          <div></div>
          <div></div>
          <div></div>
        </div>
      </div>

      <div class="title">
        <p>Dashboard</p>
        <p>Admin / Dashboard</p>
      </div>

      <div class="userinfo">
        <div class="notif"></div>
        <div class="pesan">
          <i class="fa-solid fa-message" style="color: #fafcff; font-size: 22px"></i>
        </div>
        <div class="profil">
          <img src="/iconweb/source/other/profil-default.png" />
        </div>
      </div>
    </div>

    <div class="bottom">
      <div class="create">
        <div class="ctop">
          <h2>Create / Update User</h2>
          <button>TAMBAH USER</button>
        </div>
        <!--




          -->
        <?php if ($sukses) {
          echo "
          <div class='alert alert-success' role='alert'>
            " . $sukses . "
          </div>
          ";
          header("refresh:2;url=user.php");
        } ?>

        <?php
        if ($error) {
          echo "
              <div class='alert alert-danger' role='alert'>
                 " . $error . "
              </div>
            ";
          header("refresh:2;url=user.php");
        }
        ?>

        <form action="<?php htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
          <div class="inputpart">
            <p>Email</p>
            <input value="<?= $email ?>" type="email" name="cemail" />
          </div>

          <div class="inputpart">
            <p>Username</p>
            <input value="<?= $username ?>" type="text" name="cuser" />
          </div>

          <div class="inputpart">
            <p>Password</p>
            <input value="<?= $password ?>" type="text" name="cpass" />
          </div>

          <div class="inputpart">
            <p>Tanggal Lahir</p>
            <input value="<?= $tglLahir ?>" type="date" name="ctgl" />
          </div>

          <div class="inputpart">
            <p>Kode</p>
            <input value="<?= $status ?>" type="text" name="ckode" />
          </div>

          <div class="inputpart">
            <p>Status</p>
            <select type="text" name="cstatus">
              <option <?php if ($status = "Aktif") echo "selected" ?> value="Aktif">Aktif</option>
              <option <?php if ($status = "Tidak Aktif") echo "selected"; ?> value="Tidak Aktif">Tidak Aktif</option>
            </select>

          </div>

          <div class="inputbtn">
            <button type="submit" name="simpanbtn">Simpan</button>
            <button type="submit" name="batalbtn">Batal</button>
          </div>
        </form>
      </div>

      <div class="tabeldata">
        <div class="toptabel">
          <p>DATA USER</p>
        </div>
        <table class="table table-striped">
          <thead>
            <tr>
              <th scope="col">ID</th>
              <th scope="col">EMAIL</th>
              <th scope="col">USERNAME</th>
              <th scope="col">PASSWORD</th>
              <th scope="col">TANGGAL LAHIR</th>
              <th scope="col">KODE</th>
              <th scope="col">STATUS</th>

              <th scope="col">AKSI</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $selectqry = "SELECT * FROM user ORDER BY id ASC ";
            $sqlselect = mysqli_query($conn, $selectqry);

            while ($fetch = mysqli_fetch_assoc($sqlselect)) :
            ?>
              <tr>
                <th scope="row"><?= $fetch['id'] ?></th>
                <td><?= $fetch['email'] ?></td>
                <td><?= $fetch['username'] ?></td>
                <td class="password-col"><?= $fetch['password'] ?></td>
                <td><?= $fetch['tgl_lahir'] ?></td>
                <td class="password-col"><?= $fetch['kode'] ?></td>
                <td><?= $fetch['status'] ?></td>
                <td>
                  <a href="user.php?op=update&id=<?= $fetch['id'] ?>">
                    <button type="button" class="btn btn-warning">Update</button>
                  </a>
                  <a href="user.php?op=delete&id=<?= $fetch['id'] ?>" onclick="return confirm('Apakah Kamu Yakin?')">
                    <button type="button" class="btn btn-danger">Delete</button>
                  </a>
                </td>
              </tr>

            <?php endwhile; ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</body>

<script src="/iconweb/js/admin.js"></script>

</html>