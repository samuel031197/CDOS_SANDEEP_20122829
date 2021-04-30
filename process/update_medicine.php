<?php
require_once '../Models/Medicine.php';

$obj_medicine = new Medicine();
$obj_medicine->update_medicine();
header('Location:'.$_SERVER['HTTP_REFERER']);
die;