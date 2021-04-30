<?php
require_once '../Models/Medicine.php';

$obj_medicine = new Medicine();
$obj_medicine->add_medicine();
header('Location:'.$_SERVER['HTTP_REFERER']);
die;