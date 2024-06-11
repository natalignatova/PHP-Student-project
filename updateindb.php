<?php
//подключение к базе данных в файле отдельном
	include 'dbstudents_connect.php';
// подключение функций для проверок
	include 'validate.php';
	
// Обработка данных из формы	
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $firstisikukood = test_data($_POST["firstisikukood"]);
    $isikukood = test_data($_POST["isikukood"]);
	$lastname = test_data($_POST["lastname"]);
	$firstname = test_data($_POST["firstname"]);
	$grade = (int)test_data($_POST["grade"]);
    $email = test_data($_POST["email"]);
    $message = test_data($_POST["message"]) . "<br>".'Upd.'. date('Y-m-d H:i:s');
};
// проверка непустых полей
	if (!$isikukood == '' && !$lastname == '' && !$firstname == '' && !$grade == '' && !$email == '' && !$message == ''){
	
//проверка email и isikukood
		if(checkEmail($email) || checkIsik($isikukood)){
//преобразование строк
			$lastname = convertString($lastname);
			$firstname = convertString($firstname);
			$email = convertString($email);
			$info = "Information about $firstname $lastname was updated in database at " . date('Y-m-d H:i:s');
// SQL-запрос для обновления данных в таблице
$sql = "UPDATE students 
        SET isikukood = '$isikukood',
            lastname = '$lastname', 
            firstname = '$firstname', 
            grade = '$grade', 
            email = '$email', 
            message = '$message'
        WHERE isikukood = '$firstisikukood'";
//проверка отправки запроса
		if ($link->query($sql) === TRUE) {
// Запрос отправлен
		header("Location: view.php?info=$info"); // Перенаправление с параметром info=$info
		exit(); // Завершение скрипта после вызова header()
		} 
}
//Запрос не отправлен. Возврат к форме на предыдущей странице с заполнением уже введенных данных в непустых графах
}else {
		$info = "Fill in the values of the form.";
		header("Location: edit.php?firstisikukood=$firstisikukood&isikukood=$isikukood&lastname=$lastname&firstname=$firstname&email=$email&grade=$grade&message=$message&info=$info"); // Перенаправление с параметром info=$info
		exit(); // Завершение скрипта после вызова header()
	};

//закрытие соединения в dbstudents_connect.php	
	mysqli_close($link);
?>