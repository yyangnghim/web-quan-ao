<header>
  <div class="bg-dark text-white py-3">
    <div class="container">
      <div class="row align-items-center justify-content-between">
        <div class="col-6 d-flex align-items-center">
          <marquee>Nhóm 2: Xây dựng Website bán túi xách</marquee>
        </div>
        <div class="col-6">
          <div class="d-flex align-items-end justify-content-end">
            <form action="./tim_kiem.php" method="get">
              <div class="input-group">
                <input type="search" name="s" class="form-control shadow-none rounded-0 bg-dark border-0 text-white border-bottom" autocomplete="off" placeholder="Tìm kiếm...">
                <button type="submit" class="input-group-text rounded-0 bg-dark text-white border-0 border-bottom"><i class="fa-solid fa-magnifying-glass"></i></button>
              </div>
            </form>
            <div class="list-inline ms-5">
              <?php
              //Nếu tồn tại user thì hiển thị tên tài khoản
              if (isset($_SESSION["user"])) {
              ?>
                <a href="./dang_xuat.php" class="list-inline-item text-white fs-6">
                  <?= $_SESSION["user"]["ten_tai_khoan"] ?>
                </a>
              <?php
              } else {
              ?>
                <a href="./dang_nhap.php" class="list-inline-item text-white fs-6">
                  <i class="fa-solid fa-user"></i>
                </a>
              <?php
              }
              ?>
              <a href="./gio_hang.php" class="text-decoration-none list-inline-item text-white fs-6">
                <i class="fa-solid fa-cart-shopping"></i>
                <span class="badge bg-danger" style="position: relative; top: -10px">
                  <?php
                  //Kiểm tra nếu tồn tại giỏ hàng thì hiển thị số lượng sp trong giỏ hàng
                  if (isset($_SESSION["gio_hang"])) {
                    echo count($_SESSION["gio_hang"]);
                  } else {
                    echo "0";
                  }
                  ?>
                </span>
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="border-bottom">
    <div class="container">
      <nav class="navbar navbar-expand">
        <div class="container-fluid">
          <a class="navbar-brand" href="index.php">
            <img src="./assets/images/logo.svg" width="200" height="50" alt="">
          </a>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link" href="index.php">Trang chủ</a>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button">
                  Sản phẩm
                </a>
                <ul class="dropdown-menu">
                  <?php
                  require_once("./config/connect.php");
                  $result = $conn->query("SELECT * FROM danh_muc");
                  //Dùng vòng lặp để hiển thị tất cả các danh mục
                  while ($row = $result->fetch_assoc()) :
                  ?>
                    <li><a class="dropdown-item" href="danh_muc_san_pham.php?id=<?= $row["id"] ?>"><?= $row["ten_danh_muc"] ?></a></li>
                  <?php endwhile; ?>
                </ul>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="san_pham_giam_gia.php">Sản phẩm giảm giá</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="./don_hang.php">Đơn hàng của bạn</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#" role="button" data-bs-toggle="modal" data-bs-target="#contactModal">Liên hệ</a>
              </li>
            </ul>
          </div>
        </div>
      </nav>
    </div>
  </div>
  <div class="modal fade" id="contactModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5">Liên hệ</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form action="./xuly/xu_ly_lien_he.php" method="post" onsubmit="return validateFormLienHe()">
            <div class="form-group mb-3">
              <label for="chu_de" class="form-label">Vấn đề bạn gặp phải:</label>
              <input type="text" name="chu_de" id="chu_de" class="form-control" />
            </div>
            <div class="form-group mb-3">
              <label for="noi_dung" class="form-label">Nội dung:</label>
              <textarea name="noi_dung" id="noi_dung" class="form-control" rows="3"></textarea>
            </div>
            <button type="submit" class="btn btn-primary px-4">Gửi</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</header>