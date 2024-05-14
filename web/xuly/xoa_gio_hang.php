<?php
session_start();
if (isset($_GET["id"])) {
  unset($_SESSION["gio_hang"][$_GET["id"]]); //Xoá giỏ hàng theo id
  header("Location: {$_SERVER['HTTP_REFERER']}"); //Trở về trang trước
  exit();
}
