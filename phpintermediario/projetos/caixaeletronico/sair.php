<?php
session_start();

unset($_SESSION['banco']);
session_destroy();
header('Location: index.php');