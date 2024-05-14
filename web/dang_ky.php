<?php
session_start();
require_once("./config/connect.php");
$error_tentaikhoan = $error_tendangnhap = $error_email = $error_sodienthoai = $error_diachi = $error_matkhau = $error_confirm = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $tentaikhoan = trim($_POST["ten_tai_khoan"]);
  $tendangnhap = trim($_POST["ten_dang_nhap"]);
  $email = trim($_POST["email"]);
  $sodienthoai = trim($_POST["so_dien_thoai"]);
  $diachi = trim($_POST["dia_chi"]);
  $matkhau = trim($_POST["mat_khau"]);
  $confirm = trim($_POST["confirm"]);
  if (empty($tentaikhoan)) {
    $error_tentaikhoan = "Vui lòng nhập tên tài khoản";
  }
  if (empty($tendangnhap)) {
    $error_tendangnhap = "Vui lòng nhập tên đăng nhập";
  }
  if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $error_email = "Email chưa đúng định dạng";
  }
  if (!preg_match("/(84|0[3|5|7|8|9])+([0-9]{8})\b/", $sodienthoai)) {
    $error_sodienthoai = "Số điện thoại không hợp lệ";
  }
  if (empty($diachi)) {
    $error_diachi = "Vui lòng nhập địa chỉ";
  }
  if (empty($matkhau)) {
    $error_matkhau = "Vui lòng nhập mật khẩu";
  }
  if ($matkhau != $confirm) {
    $error_confirm = "Mật khẩu không trùng khớp";
  }

  if (empty($error_tentaikhoan) && empty($error_tendangnhap) && empty($error_email) && empty($error_sodienthoai) && empty($error_diachi) && empty($error_matkhau) && empty($error_confirm)) {
    $check = $conn->query("SELECT * FROM tai_khoan WHERE ten_dang_nhap = '$tendangnhap' OR email = '$email'");
    if ($check->num_rows > 0) {
      echo '<script>alert("Tài khoản đã tồn tại")</script>';
    } else {
      $result = $conn->query("INSERT INTO tai_khoan(ten_tai_khoan,ten_dang_nhap,email,mat_khau,so_dien_thoai,dia_chi) 
      VALUES('$tentaikhoan','$tendangnhap','$email','$matkhau','$sodienthoai','$diachi')");
      if ($result) {
        echo '<script>alert("Đã đăng ký tài khoản thành công")</script>';
        header("Location: dang_nhap.php");
      }
    }
  }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="./assets/fonts/css/all.min.css">
  <link rel="stylesheet" href="./assets/css/bootstrap.min.css">
  <link rel="stylesheet" href="./assets/css/main.css">
  <title>Nhóm 2</title>
</head>

<body>
  <?php
  include_once("./includes/message.php");
  ?>
  <div class="form-bg min-vh-100 d-flex align-items-center justify-content-center">
    <div class="form-container shadow-lg bg-white p-3" style="width: 500px;">
      <h1 class="text-uppercase text-center pb-5">Đăng ký</h1>
      <form action="" method="post">
        <div class="form-group mb-3">
          <input type="text" class="form-control" id="ten_tai_khoan" name="ten_tai_khoan" placeholder="Tên tài khoản">
          <span style="color: red;"><?= $error_tentaikhoan ?></span>
        </div>
        <div class="form-group mb-3">
          <input type="text" class="form-control" id="ten_dang_nhap" name="ten_dang_nhap" placeholder="Tên đăng nhập">
          <span style="color: red;"><?= $error_tendangnhap ?></span>
        </div>
        <div class="form-group mb-3">
          <input type="text" class="form-control" id="email" name="email" placeholder="Email">
          <span style="color: red;"><?= $error_email ?></span>
        </div>
        <div class="form-group mb-3">
          <input type="text" class="form-control" id="so_dien_thoai" name="so_dien_thoai" placeholder="Số điện thoại">
          <span style="color: red;"><?= $error_sodienthoai ?></span>
        </div>
        <div class="form-group mb-3">
          <input type="text" class="form-control" id="dia_chi" name="dia_chi" placeholder="Địa chỉ">
          <span style="color: red;"><?= $error_diachi ?></span>
        </div>
        <div class="form-group mb-3">
          <input type="password" class="form-control" id="mat_khau" name="mat_khau" placeholder="Mật khẩu">
          <span style="color: red;"><?= $error_matkhau ?></span>
        </div>
        <div class="form-group mb-3">
          <input type="password" class="form-control" id="confirm" name="confirm" placeholder="Nhập lại mật khẩu">
          <span style="color: red;"><?= $error_confirm ?></span>
        </div>
        <div class="mb-3 row align-items-center">
          <div class="col-6">
            <button type="submit" class="btn btn-primary">Đăng ký</button>
          </div>
          <div class="col-6">
            <span class="d-block text-end">
              Đã có tài khoản?
              <a href="./dang_nhap.php">Đăng nhập</a>
            </span>
          </div>
        </div>
      </form>
    </div>
  </div>
  <script src="./assets/js/bootstrap.bundle.min.js"></script>
</body>

</html>