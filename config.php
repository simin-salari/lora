<?php

/*
 * Author: Simin Salari
 * Project Name: Lora
 * Start Date: 1397/04/11
 * End Date: 1397/04/22
 * Version: 1.1.0
 * Latest Update: 1397/05/06
 */

/* $ServerName = "localhost";
  $UserName = "root";
  $Password = "";
  $DBName = "Lora";

  $link = mysqli_connect($ServerName, $UserName, $Password, $DBName);
  if (!$link) {
  echo mysqli_connect_error();
  exit;
  } else {
  $link->set_charset("utf8");
  } */
$link = new PDO('sqlite:C:\xampp\htdocs\completed_projects\lora\DataBase\Lora.db');
?>