<?php
session_start();
$pdo = new PDO("mysql:host=localhost;dbname=pgto;charset=utf8","root","");
$page = $_GET["page"] ?? "home";
require "routes.php";
