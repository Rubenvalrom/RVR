<?php

// Variables
$hostDB = '127.0.0.1';
$nombreDB = 'rvr';
$usuarioDB = 'root';
$contraseñaDB = '12345';

// Conecta con base de datos
$hostPDO = "mysql:host=$hostDB;dbname=$nombreDB;";
$pdo = new PDO($hostPDO, $usuarioDB, $contraseñaDB);

