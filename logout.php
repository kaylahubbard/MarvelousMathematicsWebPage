<?php
session_start();
session_destroy();
header('Location: MMLogin.php');
exit;