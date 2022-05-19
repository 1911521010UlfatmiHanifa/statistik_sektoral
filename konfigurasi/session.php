<?php
    include "koneksi.php";
    if (!isset($_SESSION)) {
      session_start();
      if (!isset($_SESSION["id_user"]) && !isset($_SESSION["username"])) {
        header("Location: ../konfigurasi/login.php");
        exit;
      }
    }
?>