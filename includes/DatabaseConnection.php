<?php
$pdo = new PDO("mysql:host=localhost;dbname=cwdb;charset=utf8mb4"
                ,"root","");
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);