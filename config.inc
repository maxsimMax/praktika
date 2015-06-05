<?php
  
  $dblocation = "localhost";    // имя хоста: номер порта
  $dbname = "praktica2";   	// имя БД
  $dbuser = "root";		// имя пользователя
  $dbpasswd = "";		// пароль
 
  // Устанавливаем соединение с базой данных
  $dbcnx =@mysql_connect($dblocation, $dbuser, $dbpasswd) or die ("В настоящий момент сервер базы данных не доступен");
  // выбираем базу данных
  mysql_select_db($dbname,$dbcnx)  or  die("В настоящий момент база данных не доступна"); 
  ?>
