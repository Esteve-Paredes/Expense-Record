<?php

$base_dir = "/Expense-Record/";
$base_controller = "home";

$request_uri = str_replace($base_dir, "", $_SERVER['REQUEST_URI']);
$request_controller = str_replace("/", "_", $request_uri);

if ($request_controller == $base_controller) {
    header("Location: $base_dir");
    exit;
}

if (empty($request_controller)) {
    $request_controller = $base_controller;
}

$host_dir = str_replace("\\", "/", __DIR__);
$request_controller_path = "$host_dir/src/controllers/$request_controller.controller.php";

if (file_exists($request_controller_path)) {
    require_once $request_controller_path;
}
else{
    header("Location:" . $base_dir . "error");
}