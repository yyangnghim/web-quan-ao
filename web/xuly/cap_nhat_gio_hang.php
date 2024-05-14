<?php
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $id = $_POST["id"];
  $so_luong = $_POST["so_luong"];
  if ($so_luong == 0) {
    unset($_SESSION["gio_hang"][$id]); //Nếu số lượng gửi lên = 0 thì xoá giỏ hàng có id = $_POST["id"]
  } else {
    $_SESSION["gio_hang"][$id]["so_luong"] = $so_luong; //Nếu không thì cập nhật lại số lượng bằng $so_luong
  }
  header("Location: {$_SERVER['HTTP_REFERER']}"); //Quay về trang trước
  exit();
}
