<?php
session_start();
echo "<script>alert('Anda telah logout'); window.location.href=('index.php');</script>";
session_destroy();
