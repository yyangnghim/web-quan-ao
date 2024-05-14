<?php
session_start();
unset($_SESSION["user"]); //Xoá session có key = user
header("Location: index.php");
