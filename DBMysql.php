<?php

/*
 * Author: Simin Salari
 * Project Name: Lora
 * Start Date: 1397/04/11
 * End Date: 1397/04/22
 * Version: 1.1.0
 * Latest Update: 1397/05/06
 *             ==== Comment : This page must delete before upload the site. ====
 */

include './config.php';

/*$query = ("CREATE TABLE setting (
  id int AUTO_INCREMENT,
  frequency int(3) NOT NULL,
  bandwidth  float(5) NOT NULL,
  codingRate float(5) NOT NULL,
  lanGain varchar (3) NOT NULL,
  spreadingFactor int(3) NOT NULL,
  paRamp int(5) NOT NULL ,
  mode varchar (20) NOT NULL,
  Encoding varchar (20) NOT NULL,
  PRIMARY KEY (id)
  )"); // ایجاد جدول تنظیمات  */

/*$query =("CREATE TABLE get (
  id int AUTO_INCREMENT,
  date datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  data varchar(50) NOT NULL,
  PRIMARY KEY (id)
  )"); // ایجاد جدول دریافت */

/*$query =("CREATE TABLE send (
  id int AUTO_INCREMENT,
  date datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  data varchar(50) NOT NULL,
  PRIMARY KEY (id)
  )"); // ایجاد جدول ارسال */

/*$query =("CREATE TABLE opinion (
  id int AUTO_INCREMENT,
  name varchar(50) ,
  telefon varchar(20) NOT NULL,
  email varchar(50),
  opinion varchar(500) NOT NULL,
  date datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (id)
  )"); // ایجاد جدول نظر */

/*$query = ("DROP TABLE ?"); // حذف یک جدول */

/*$query = ("DELETE FROM table_name WHERE condition ");//پاک کردن مقادیر یک جدول */

//$pass = md5(?); // رمز کردن مقدار

/*$query = ("INSERT INTO setting(id,frequency,bandwidth,codingRate,lanGain,spreadingFactor, paRamp,mode,Encoding) VALUES ('0',433,250,0.8,'0',7,50,'Both','base64')"); // ذخیره داده در جدول تنظیمات */

/*for($i=1;$i<=20;$i++){
  $query = ("INSERT INTO get(id,date,data) VALUES ('0',NOW(),'get$i')");
  $result = mysqli_query($link, $query);
  }// ذخیره داده در جدول دریافت */

/*$query = ("INSERT INTO opinion(id,name,telefon,email,opinion,date) VALUES ('0','cdc','1225','hh','vv',NOW())");//ذخیره داده در جدول نظر*/
 
/*$query = ("SELECT * FROM ?"); // انتخاب از پایگاه داده */

$result = mysqli_query($link, $query);
mysqli_close($link);

if (!$result) {
    echo mysqli_error();
    exit();
}
?>