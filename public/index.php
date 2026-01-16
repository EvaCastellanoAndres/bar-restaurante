<?php
require "../app/controllers/ProductosController.php";
require "../app/models/Plato.php";
require "../app/config/Db.php";

use controllers\ProductosController;

$controller = new ProductosController();
$controller->listarPlatos();
