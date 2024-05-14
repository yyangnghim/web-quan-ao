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
  ?>
  <section class="container mt-4">
    <div class="text-center">
      <h1 class="text-uppercase">Sản phẩm khuyến mãi</h1>
      <p>Ưu đãi cực khủng</p>
    </div>
    <div class="row row-gap-4 mt-3">
      <?php
      $result = $conn->query("SELECT * FROM san_pham WHERE giam_gia > 0");
      while ($row = $result->fetch_assoc()) :
      ?>
        <div class="col-3">
          <div class="card overflow-hidden">
            <div class="card-body position-relative">
              <img src="./assets/images/<?= $row["anh_san_pham"] ?>" class="card-img-top" loading="lazy" alt="..." />
              <h5 class="card-title">
                <a href="chi_tiet_san_pham.php?id=<?= $row["id"] ?>" class="text-decoration-none text-muted">
                  <div class="pro__name">
                    <small><?= $row["ten_san_pham"] ?></small>
                  </div>
                </a>
              </h5>
              <div class="position-absolute top-0 start-0 <?= $row["giam_gia"] == 0 ? 'd-none' : '' ?>">
                <span class="badge rounded-circle bg-danger py-2 ms-2 mt-2">-<?= $row["giam_gia"] ?>%</span>
              </div>
            </div>
            <div class="card-footer d-flex align-items-center justify-content-between">
              <h6 class="m-0">
                <?= number_format($row["gia_tien"] - ($row["gia_tien"] * $row["giam_gia"] / 100), 0, '', '.') ?>đ
                <small class="fw-light text-decoration-line-through <?= $row["giam_gia"] == 0 ? 'd-none' : '' ?>" style="font-size: 12px;opacity: 0.6">
                  <?= number_format($row["gia_tien"], 0, '', '.') ?>
                </small>
              </h6>
              <a href="./xuly/them_vao_gio_hang.php?id=<?= $row["id"] ?>" class="btn btn-primary" title="Thêm vào giỏ hàng">
                <i class="fa-solid fa-cart-shopping"></i>
              </a>
            </div>
          </div>
        </div>
      <?php endwhile; ?>
    </div>
  </section>
  <script src="./assets/js/bootstrap.bundle.min.js"></script>
  <?php include_once("./includes/footer.php"); ?>
</body>

</html>