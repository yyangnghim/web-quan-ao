<?php
session_start();
require_once(__DIR__ . "/../config/connect.php");
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (isset($_SESSION["user"])) {
    $ten_tai_khoan = $_SESSION["user"]["ten_tai_khoan"];
    $email = $_SESSION["user"]["email"];
    $so_dien_thoai = $_SESSION["user"]["so_dien_thoai"];
    $chu_de = $_POST["chu_de"];
    $noi_dung = $_POST["noi_dung"];
    $result = $conn->query("INSERT INTO lien_he(ten_tai_khoan,email,so_dien_thoai,chu_de,noi_dung) 
    VALUES ('$ten_tai_khoan','$email','$so_dien_thoai','$chu_de','$noi_dung')");
    if ($result) {
      $_SESSION["msg"] = "Yêu cầu của bạn đã được gửi";
    }
    header("Location: {$_SERVER['HTTP_REFERER']}");
  } else {
    $_SESSION["msg"] = "Vui lòng đăng nhập";
    header("Location: ../dang_nhap.php");
  }
}
