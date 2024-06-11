<?php
//подключение к базе данных в файле отдельном
	include 'dbstudents_connect.php';
	
// SQL-запрос для удаления данных из таблицы
    $sql = "DELETE FROM students";
//проверка отправки запроса
	if ($link->query($sql) === TRUE) {
// Запрос отправлен
		$info = "All information was deleted from database.";
		header("Location: delete.php?info=$info"); // Перенаправление с параметром info=$info
		exit(); // Завершение скрипта после вызова header()

//Запрос не отправлен. Возврат к форме на предыдущей странице 
	}else {
		$info = "No connection to database. Try again.";
		header("Location: delete.php?info=$info"); // Перенаправление с параметром info=$info
		exit(); // Завершение скрипта после вызова header()
	};

//закрытие соединения в dbstudents_connect.php	
	
	mysqli_close($link);
?>