<?php
$pdo = new PDO(
    'mysql:host=localhost;dbname=coursemanagement;charset=utf8',
    'thomas',
    'thomas'
);
$pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
