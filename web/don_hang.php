<?php session_start(); ?>
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
  include_once("./includes/header.php");
  include_once("./includes/message.php");
  ?>
  <section class="container my-4" style="max-width: 1200px;">
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.php">Trang chủ</a></li>
        <li class="breadcrumb-item active" aria-current="page">Thông tin đơn hàng</li>
      </ol>
    </nav>
    <div class="container my-5" style="min-height: 350px;">
      <?php
      if (isset($_SESSION["user"])) {
      ?>
        <table class="table table-bordered text-center" style="min-height: 200px;">
          <thead>
            <tr>
              <td>Ảnh sản phẩm</td>
              <td>Tên sản phẩm</td>
              <td>Giá</td>
              <td>Số lượng</td>
              <td>Thành tiền</td>
            </tr>
          </thead>
          <tbody>
            <?php
            $tong_tien = 0;
            $user_id = $_SESSION["user"]["id"];
            $don_hang = $conn->query("SELECT * FROM chi_tiet_don_hang INNER JOIN don_hang
            ON don_hang.id = chi_tiet_don_hang.don_hang_id 
            INNER JOIN san_pham 
            ON san_pham.id = chi_tiet_don_hang.san_pham_id WHERE don_hang.user_id = $user_id");
            foreach ($don_hang as $p) :
              $tong_tien += ($p["gia_tien"] - ($p["gia_tien"] * $p["giam_gia"] / 100)) * $p["so_luong"];
            ?>
              <tr>
                <td><img src="./assets/images/<?= $p["anh_san_pham"] ?>" class="object-fit-cover" width="150" height="150" alt=""></td>
                <td style="vertical-align: middle">
                  <?= $p["ten_san_pham"] ?>
                </td>
                <td style="vertical-align: middle">
                  <?= number_format($p["gia_tien"] - ($p["gia_tien"] * $p["giam_gia"] / 100), 0, '', '.') ?>đ
                </td>
                <td style="vertical-align: middle">
                  <input type="number" value="<?= $p["so_luong"] ?>" class="form-control shadow-none mx-auto" style="width: 60px;" readonly>
                </td>
                <td style="vertical-align: middle">
                  <?= number_format(($p["gia_tien"] - ($p["gia_tien"] * $p["giam_gia"] / 100)) * $p["so_luong"], 0, '', '.') ?>đ
                </td>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
        <h5>Tổng tiền hoá đơn: <?= number_format($tong_tien, 0, '', '.') ?>đ</h5>
      <?php
      } else { ?>
        <h2 class="text-center text-uppercase">Bạn vui lòng đăng nhập để xem được đơn hàng</h2>
      <?php } ?>
    </div>
  </section>
  <?php include_once("./includes/footer.php"); ?>
  <script src="./assets/js/bootstrap.bundle.min.js"></script>
</body>

</html>