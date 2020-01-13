<?php
require 'Db.php';

$db = Db::getConnection();

$id = $_POST['id'];
$sql = 'DELETE FROM `short` WHERE `id` = "'.$id.'"';
$result = $db->prepare($sql);
$result->execute();



?>