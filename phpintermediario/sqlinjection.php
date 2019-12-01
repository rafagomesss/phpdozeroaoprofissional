<?php

$autor = addslashes($_POST['autor']); //' or 1=1

$sql = "SELECT * FROM posts WHERE autor = '$autor'";
echo '<pre>' . print_r($sql, true) . '</pre>';
exit();