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
  require_once("./config/connect.php");
  $id = $_GET["id"]; //Lấy biến id trên URL
  $result = $conn->query("SELECT * FROM san_pham INNER JOIN thong_tin_san_pham ON san_pham.id = thong_tin_san_pham.id WHERE san_pham.id = $id");
  $sanpham = $result->fetch_assoc();
  ?>
  <section class="container mt-4">
    <div class="row mb-3">
      <div class="col-md-6">
        <img src="./assets/images/<?= $sanpham["anh_san_pham"] ?>" class="object-fit-cover" width="80%" height="400" alt="" />
      </div>
      <div class="col-md-6">
        <h1 class="pb-3"><?= $sanpham["ten_san_pham"] ?></h1>
        <div class="d-flex align-items-center justify-content-between pb-3">
          <h5>
            <?= number_format($sanpham["gia_tien"] - ($sanpham["gia_tien"] * $sanpham["giam_gia"] / 100), 0, '', '.') ?>đ
            <small class="fw-light fs-6 text-decoration-line-through px-2 <?= $sanpham["giam_gia"] == 0 ? 'd-none' : '' ?>" style="opacity: 0.6">
              <?= number_format($sanpham["gia_tien"], 0, '', '.') ?>
            </small>
            <span class="badge bg-danger <?= $sanpham["giam_gia"] == 0 ? 'd-none' : '' ?>">-<?= $sanpham["giam_gia"] ?>%</span>
          </h5>
        </div>
        <ul class="fs-6 mb-3">
          <li><strong class="pe-2">Sản xuất:</strong><?= $sanpham["san_xuat"] ?></li>
          <li><strong class="pe-2">Màu sắc:</strong><?= $sanpham["mau_sac"] ?></li>
          <li><strong class="pe-2">Chất liệu:</strong><?= $sanpham["chat_lieu"] ?>.</li>
        </ul>
        <a href="./xuly/them_vao_gio_hang.php?id=<?= $sanpham["id"] ?>" class="btn btn-outline-primary rounded-0" title="Thêm vào giỏ hàng">
          Thêm vào giỏ hàng
        </a>
      </div>
    </div>
  </section>
  <?php include_once("./includes/footer.php"); ?>
  <script src="./assets/js/bootstrap.bundle.min.js"></script>
</body>

</html>