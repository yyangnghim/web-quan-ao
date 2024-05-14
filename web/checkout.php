<?php
session_start();
require_once("./config/connect.php");
if (isset($_SESSION["user"])) {
  $tong_tien = 0;
  foreach ($_SESSION["gio_hang"] as $i) {
    $tong_tien += $i["so_luong"] * $i["gia_tien"];
  }
  $user_id = $_SESSION["user"]["id"];
  $conn->query("INSERT INTO don_hang(user_id,tong_tien) VALUES ($user_id, $tong_tien)");
  $query = $conn->query("SELECT max(id) FROM don_hang WHERE user_id = $user_id");
  $don_hang_id = $query->fetch_assoc()["max(id)"];
  foreach ($_SESSION["gio_hang"] as $i => $value) {
    $so_luong = $value["so_luong"];
    $conn->query("INSERT INTO chi_tiet_don_hang(don_hang_id,san_pham_id,so_luong) VALUES ('$don_hang_id','$i','$so_luong')");
  }
  unset($_SESSION["gio_hang"]);
  $_SESSION["msg"] = "Đã đặt hàng thành công";
  header("Location: {$_SERVER['HTTP_REFERER']}");
} else {
  $_SESSION["msg"] = "Vui lòng đăng nhập";
  header("Location: dang_nhap.php");
}
