<?php
//подключение к базе данных в файле отдельном
	include 'dbstudents_connect.php';
// подключение функций для проверок
	include 'validate.php';
	
// Обработка данных из формы	
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $isikukood = test_data($_POST["isikukood"]);
	$lastname = test_data($_POST["lastname"]);
	$firstname = test_data($_POST["firstname"]);
	$grade = (int)test_data($_POST["grade"]);
    $email = test_data($_POST["email"]);
    $message = test_data($_POST["message"]);
};
// проверка непустых полей
	if (!$isikukood == '' && !$lastname == '' && !$firstname == '' && !$grade == '' && !$email == '' && !$message == ''){
	
//проверка email и isikukood
		if(checkEmail($email) || checkIsik($isikukood)){
//преобразование строк
			$lastname = convertString($lastname);
			$firstname = convertString($firstname);
			$email = convertString($email);
			$info = "$firstname $lastname is added to database.";
// SQL-запрос для вставки данных в таблицу
    $sql = "INSERT INTO students (isikukood, lastname, firstname, grade, email, message) 
	VALUES ('$isikukood', '$lastname', '$firstname', '$grade', '$email', '$message' )";
//проверка отправки запроса
		if ($link->query($sql) === TRUE) {
// Запрос отправлен
		header("Location: add.php?info=$info"); // Перенаправление с параметром info=$info
		exit(); // Завершение скрипта после вызова header()
		} 
}
//Запрос не отправлен. Возврат к форме на предыдущей странице с заполнением уже введенных данных в непустых графах
}else {
		$info = "Fill in the values of the form.";
		header("Location: add.php?isikukood=$isikukood&lastname=$lastname&firstname=$firstname&email=$email&grade=$grade&message=$message&info=$info"); // Перенаправление с параметром info=$info
		exit(); // Завершение скрипта после вызова header()
	};

//закрытие соединения в dbstudents_connect.php	
	
	mysqli_close($link);
?>