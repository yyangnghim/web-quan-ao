<?php
session_start();
require_once("./config/connect.php");
$error_tendangnhap = $error_matkhau = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $tendangnhap = trim($_POST["ten_dang_nhap"]);
  $matkhau = trim($_POST["mat_khau"]);
  if (empty($tendangnhap)) {
    $error_tendangnhap = "Vui lòng nhập tên đăng nhập";
  }
  if (empty($matkhau)) {
    $error_matkhau = "Vui lòng nhập mật khẩu";
  }

  if (empty($error_tendangnhap) && empty($error_matkhau)) {
    $query = $conn->query("SELECT * FROM tai_khoan WHERE ten_dang_nhap = '$tendangnhap' AND mat_khau = '$matkhau'");
    $result = $query->fetch_assoc();
    if ($query->num_rows > 0) {
      $_SESSION["user"]["id"] = $result["id"];
      $_SESSION["user"]["ten_tai_khoan"] = $result["ten_tai_khoan"];
      $_SESSION["user"]["email"] = $result["email"];
      $_SESSION["user"]["so_dien_thoai"] = $result["so_dien_thoai"];
      header("Location: index.php");
    } else {
      echo '<script>alert("Tên đăng nhập hoặc mật khẩu không trùng khớp")</script>';
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
      <h1 class="text-uppercase text-center pb-5">Đăng nhập</h1>
      <form action="" method="post" onsubmit="return validateFormDangNhap()">
        <div class="form-group mb-3">
          <input type="text" class="form-control" id="ten_dang_nhap" name="ten_dang_nhap" placeholder="Tên đăng nhập">
          <span style="color: red;"><?= $error_tendangnhap ?></span>
        </div>
        <div class="form-group mb-3">
          <input type="password" class="form-control" id="mat_khau" name="mat_khau" placeholder="Mật khẩu">
          <span style="color: red;"><?= $error_matkhau ?></span>
        </div>
        <div class="form-group mb-3 row align-items-center">
          <div class="col-6">
            <button type="submit" class="btn btn-primary">Đăng nhập</button>
          </div>
          <div class="col-6">
            <span class="d-block text-end">
              Chưa có tài khoản?
              <a href="./dang_ky.php">Đăng ký</a>
            </span>
          </div>
        </div>
      </form>
    </div>
  </div>
  <script src="./assets/js/bootstrap.bundle.min.js"></script>
</body>

</html>