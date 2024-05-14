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
  <section class="container mt-5" style="min-height: 46vh;">
    <?php
    if (isset($_SESSION["gio_hang"])) {
      $tong_cong = 0;
    ?>
      <table class="table">
        <thead>
          <tr>
            <td>Ảnh sản phẩm</td>
            <td>Tên sản phẩm</td>
            <td>Số lượng</td>
            <td>Giá</td>
            <td>Thành tiền</td>
            <td>Xoá</td>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($_SESSION["gio_hang"] as $i) : ?>
            <tr>
              <td><img src="./assets/images/<?= $i["anh_san_pham"] ?>" height="160" alt=""></td>
              <td style="vertical-align: middle">
                <h6><?= $i["ten_san_pham"] ?></h6>
              </td>
              <td style="vertical-align: middle">
                <form action="./xuly/cap_nhat_gio_hang.php" method="post">
                  <input type="hidden" name="id" value="<?= $i["id"] ?>">
                  <input type="number" name="so_luong" value="<?= $i["so_luong"] ?>" class="form-control" min=0 style="width: 60px;" onchange="this.form.submit()">
                </form>
              </td>
              <td style="vertical-align: middle">
                <?= number_format($i["gia_tien"], 0, '', '.') ?>đ
              </td>
              <td style="vertical-align: middle">
                <?= number_format($i["so_luong"] * $i["gia_tien"], 0, '', '.') ?>đ
              </td>
              <td style="vertical-align: middle">
                <a href="./xuly/xoa_gio_hang.php?id=<?= $i["id"] ?>" class="btn btn-danger">
                  <i class="fa-solid fa-xmark"></i>
                </a>
              </td>
            </tr>
          <?php
            $tong_cong += $i["so_luong"] * $i["gia_tien"];
          endforeach;
          ?>
        </tbody>
      </table>
      <div class="d-flex align-items-end justify-content-between">
        <p>Tổng tiền phải thanh toán: <?= number_format($tong_cong, 0, '', '.') ?>đ</p>
        <a href="./checkout.php" class="btn btn-primary">Mua ngay</a>
      </div>
    <?php } ?>
  </section>
  <?php include_once("./includes/footer.php"); ?>
  <script src="./assets/js/bootstrap.bundle.min.js"></script>
</body>

</html>