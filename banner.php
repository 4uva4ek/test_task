<?php
require_once "DB.php";
$db = new DB();
$db->saveUserData();
echo "/images/" . rand(1, 3) . ".svg";