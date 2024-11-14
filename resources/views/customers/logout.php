<?php
session_start();
session_unset();
session_destroy();
header('Location: http://localhost/e-project/online_shop/index.php');
