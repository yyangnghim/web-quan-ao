<?php
session_start();
require_once(__DIR__ . "/../config/connect.php");
//Kiểm tra xem trên url có biến id không thì mới thực 
if (isset($_GET["id"])) {
  $id = $_GET["id"]; //Lấy biến id trên URL
  $result = $conn->query("SELECT * FROM san_pham WHERE id = $id"); //Lấy thông tin sản phẩm từ db
  $thong_tin_san_pham = $result->fetch_assoc();
  if (!isset($_SESSION["gio_hang"][$id])) { //Nếu sản phẩm chưa có trong giỏ hàng
    $_SESSION["gio_hang"][$id]["id"] = $thong_tin_san_pham["id"];
    $_SESSION["gio_hang"][$id]["ten_san_pham"] = $thong_tin_san_pham["ten_san_pham"];
    $_SESSION["gio_hang"][$id]["so_luong"] = 1;
    $_SESSION["gio_hang"][$id]["gia_tien"] = $thong_tin_san_pham["gia_tien"] - ($thong_tin_san_pham["gia_tien"] * $thong_tin_san_pham["giam_gia"] / 100);
    $_SESSION["gio_hang"][$id]["anh_san_pham"] = $thong_tin_san_pham["anh_san_pham"];
    $_SESSION["msg"] = "Đã thêm sản phẩm vào giỏ hàng thành công";
  } else { //Nếu sản phẩm có trong giỏ hàng thì chỉ tăng số lượng lên 1
    $_SESSION["gio_hang"][$id]["so_luong"] += 1;
    $_SESSION["msg"] = "Sản phẩm đã có trong giỏ hàng";
  }
  header("Location: {$_SERVER['HTTP_REFERER']}"); //Quay về trang trước
}
