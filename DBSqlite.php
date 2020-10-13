<?php

/*
 * Author: Simin Salari
 * Project Name: Lora
 * Start Date: 1397/04/11
 * End Date: 1397/04/22
 * Version: 1.1.0
 * Latest Update: 1397/05/06
 *             ==== Comment : This page must delete before upload the site. ====
 *             ==== Comment : Data base is by Sqlite3 ====
 */

include './config.php';

/* $query = ("CREATE TABLE setting (
  id INTEGER PRIMARY KEY AUTOINCREMENT,
  frequency int(3) NOT NULL,
  bandwidth  float(5) NOT NULL,
  codingRate float(5) NOT NULL,
  lanGain varchar (3) NOT NULL,
  spreadingFactor int(3) NOT NULL,
  paRamp int(5) NOT NULL ,
  mode varchar (20) NOT NULL,
  Encoding varchar (20) NOT NULL
  )"); // ایجاد جدول تنظیمات */

/* $query =("CREATE TABLE get (
  id INTEGER PRIMARY KEY AUTOINCREMENT,
  date DATETIME NOT NULL DEFAULT '0000-00-00 00:00:00',
  data varchar(50) NOT NULL
  )"); // ایجاد جدول دریافت */

/* $query =("CREATE TABLE send (
  id INTEGER PRIMARY KEY AUTOINCREMENT,
  date datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  data varchar(50) NOT NULL
  )"); // ایجاد جدول ارسال */

/* $query =("CREATE TABLE opinion (
  id INTEGER PRIMARY KEY AUTOINCREMENT,
  name varchar(50) ,
  telefon varchar(20) NOT NULL,
  email varchar(50),
  opinion varchar(500) NOT NULL,
  date datetime NOT NULL DEFAULT '0000-00-00 00:00:00'
  )"); // ایجاد جدول نظر */

/* $query = ("DROP TABLE ?"); // حذف یک جدول */

/* $query = ("DELETE FROM table_name WHERE condition ");//پاک کردن مقادیر یک جدول */

//$pass = md5(?); // رمز کردن مقدار

/* $query = ("INSERT INTO setting(id,frequency,bandwidth,codingRate,lanGain,spreadingFactor, paRamp,mode,Encoding) VALUES ('0',433,250,0.8,'0',7,50,'Both','base64')"); // ذخیره داده در جدول تنظیمات */

/*for ($i = 1; $i <= 20; $i++) {
    $query = ("INSERT INTO get(date,data) VALUES (DateTime('now'),'get$i')");
    $result = $link->query($query);
}// ذخیره داده در جدول دریافت */

/* $query = ("INSERT INTO opinion(name,telefon,email,opinion,date) VALUES ('cdc','1225','hh','vv',DateTime('now'))");//ذخیره داده در جدول نظر */

/* $query = ("SELECT * FROM ?"); // انتخاب از پایگاه داده */

$result = $link->query($query);

if (!$result) {
    echo "error()";
    exit();
}
?>