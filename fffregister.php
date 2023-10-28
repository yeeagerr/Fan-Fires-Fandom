<?php
include('admin/db.php');


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';

//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);




?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Fan Fires Fandom Auth</title>
  <link rel="stylesheet" href="style/fffregister.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" />
</head>

<body>
  <div class="container">
    <div class="loginpart">
      <div class="top">
        <h1>join FANDOM Today</h1>
        <p>Already have account? <a href="ffflogin.php">Sign In</a></p>
      </div>

      <div class="bottom">
        <i class="fa-solid fa-fire logo" style="color: red; font-size: 30px"></i>

        <div class="formpart">
          <div class="left">
            <p>Connect a Social Account</p>
            <div class="social">
              <div class="signwith1">
                <i class="fa-brands fa-facebook" style="
                      font-size: 25px;
                      color: blue;
                      padding: 5px;
                      margin-right: 20px;
                      border-radius: 5px;

                      background-color: white;
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
                      border-radius: 5px;

                      background-color: white;
                    "></i>
                <p style="letter-spacing: 1px; color: white; font-weight: bold">
                  SIGN IN WITH GOOGLE
                </p>
              </div>

              <div class="signwith3">
                <i class="fa-brands fa-x-twitter" style="
                      font-size: 25px;
                      color: black;
                      padding: 5px;
                      margin-right: 20px;
                      border-radius: 5px;

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

            <form action="<?php htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
              <input type="email" placeholder="Email" name="email" autocomplete="off" />
              <input type="text" placeholder="Username" name="username" />
              <input type="password" placeholder="Password" name="pass" />
              <input type="date" name="tgl_lahir" />
              <input value="SIGN IN" class="submit" type="submit" name="submitbtn" id="" />
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>

</html>

<?php
if (isset($_POST['submitbtn'])) {
  $date = date('Y-m-d H-i-s');
  $codehash = hash('crc32b', $date);

  $email = $_POST['email'];
  $username = $_POST['username'];
  $pass = $_POST['pass'];
  $tgl_lahir = $_POST['tgl_lahir'];

  if (empty($email) or empty($username) or empty($pass) or empty($tgl_lahir)) {
    echo "<script>alert('jangan kosong le')</script>";
  } else {

    $sql = "INSERT INTO user (email, username, password, tgl_lahir, kode, status) 
    VALUES ('$email', '$username', '$pass', '$tgl_lahir', '$codehash', 'Tidak Aktif')";
    $rowresult = mysqli_query($conn, "SELECT * FROM user WHERE email = '$email'");


    try {
      if (mysqli_num_rows($rowresult) > 0) {
        echo "email sudah ada";
      } else {
        try {
          //Server settings
          $mail->SMTPDebug = SMTP::DEBUG_OFF;                      //Dissable verbose debug output
          $mail->isSMTP();                                            //Send using SMTP
          $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
          $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
          $mail->Username   = 'nezseco@gmail.com';                     //SMTP username
          $mail->Password   = 'unvd iacb kpwq lgdt';                               //SMTP password
          $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
          $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

          //Recipients
          $mail->setFrom('VerificationDude@gmail.com', 'HABIB ABDILLAH');
          $mail->addAddress($email, 'name');     //Add a recipient


          //Content
          $mail->isHTML(true);                                  //Set email format to HTML
          $mail->Subject = 'VERIFICATION';
          $mail->Body    = 'Kode Verifikasi Anda <b>' . $codehash . '</b> Atau silahkan menuju link ini <a href="http://localhost/iconweb/verif.php?kode=' . $codehash . ' ">menuju verifikasi</a>';
          $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

          $mail->send();
          echo 'Message has been sent';
        } catch (Exception $e) {
          echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
        echo "<script>alert('Akun anda berhasil di buat');</script>";
        mysqli_query($conn, $sql);
      }
    } catch (mysqli_sql_exception) {
      echo "SOMETHING WENT WRONG";
      echo "<script>alert('something went wrong');</script>";
    }
  }
}
?>