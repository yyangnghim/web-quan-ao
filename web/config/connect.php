<?php
$conn = new mysqli("localhost", "root", "", "tui_xach");
if ($conn->connect_error) {
  die("Kết nối tới cơ sở dữ liệu thất bại");
}
$conn->set_charset("utf8");