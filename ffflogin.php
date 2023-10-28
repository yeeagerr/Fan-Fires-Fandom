<?php
include('admin/db.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Fan Fires Fandom Auth</title>
  <link rel="stylesheet" href="style/ffflogin.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" />
</head>

<body>
  <div class="container">
    <div class="loginpart">
      <div class="top">
        <h1>Welcome Back</h1>
        <p>Don't have account? <a href="fffregister.php">Register now</a></p>
      </div>

      <div class="bottom">
        <i class="fa-solid fa-fire logo" style="color: red; font-size: 30px"></i>

        <div class="formpart">
          <div class="left">
            <p>Sign In with a Social Account</p>
            <div class="social">
              <div class="signwith1">
                <i class="fa-brands fa-facebook" style="
                      font-size: 25px;
                      color: blue;
                      padding: 5px;
                      margin-right: 20px;
                      background-color: white;
                      border-radius: 5px;
                    "></i>
                <p style="letter-spacing: 1px; color: white; font-weight: bold">
                  SIGN IN WITH FACEBOOK
                </p>
              </div>

              <div class="signwith2">
                <i class="fa-brands fa-google" style="
                      font-size: 25px;
                      padding: 5px;
                      margin-right: 20px;
                      background-color: white;
                      border-radius: 5px;
                    "></i>
                <p style="letter-spacing: 1px; color: white; font-weight: bold">
                  SIGN IN WITH GOOGLE
                </p>
              </div>

              <div class="signwith3">
                <i class="fa-brands fa-x-twitter" style="
                      font-size: 25px;
                      border-radius: 5px;

                      color: black;
                      padding: 5px;
                      margin-right: 20px;
                      background-color: white;
                    "></i>
                <p style="letter-spacing: 1px; color: white; font-weight: bold">
                  SIGN IN WITH TWITTER
                </p>
              </div>
            </div>
          </div>

          <div class="right">
            <p>Sign In with Username</p>

            <form action="" <?php htmlspecialchars($_SERVER['PHP_SELF']); ?> method="post">
              <input type="text" placeholder="Username" name="nama" />
              <input type="password" placeholder="Password" name="pass" />
              <input value="SIGN IN" class="submit" type="submit" name="submit" id="" />
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>

</html>

<?php
if (isset($_POST['submit'])) {
  $nama = $_POST['nama'];
  $pass = $_POST['pass'];

  if (empty($nama) or empty($pass)) {
    echo "<script>alert('JANGAN KOSONG ')</script>";
  } else {
    $row = mysqli_query($conn, "SELECT * FROM user WHERE username = '$nama'");

    if (mysqli_num_rows($row) > 0) {
      $fetch = mysqli_fetch_assoc($row);

      if ($fetch['status'] == 'Tidak Aktif') {
        echo "Verifikasi email anda terlebih dahulu";
      } else {
        if ($fetch['username'] == $nama and $fetch['password'] == $pass) {
          echo "sama";
        } else {
          echo "gasama";
        }
      }
    }
  }
}
?>