<?php
include 'dbstudents_connect.php';

// Проверяем, была ли нажата кнопка "Отмена"
if (isset($_GET['reset'])) {
    // Устанавливаем значение search_term в пустую строку
    $_GET['search_term'] = '';
}

// Проверяем, был ли выполнен поиск
if (isset($_GET['search_term']) && $_GET['search_term'] !== '') {
    $search_term = $_GET['search_term'];
    // Создаем SQL-запрос с использованием введенного значения
    
    $sql = "SELECT * FROM students WHERE lastname LIKE '%$search_term%' 
            OR firstname LIKE '%$search_term%' 
            OR isikukood LIKE '%$search_term%' 
            OR grade LIKE '%$search_term%' 
            OR email LIKE '%$search_term%' 
            OR message LIKE '%$search_term%'
            ORDER BY lastname";

} else {
    // Если поиск не был выполнен или поле search_term пустое, выбираем все записи
    $sql = "SELECT * FROM students ORDER BY lastname";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta charset="utf-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;700&display=swap" rel="stylesheet">

    <title>Студенты.View</title>

    <style>
        body {
            padding-bottom: 20px;
            background-color: black;
            color: white;
            font-family: Montserrat;
        }
        table {
            width: 100%;
        }

        td {
            border: 2px solid #ffb900;
            text-align: left;
            padding: 8px;
        }

        th {
            border: 3px solid #ffb900;
            text-align: center;
            padding: 8px;
        }
    </style>

</head>
<body>
<div class="row">
    <div class="d-none d-md-block col-xl-2 col-md-2 col-lg-2 col-xxl-2 lg-l"></div>
    <div class="col-xl-8 col-md-8 col-lg-8 col-xxl-8 m-3">
        <nav class="navbar navbar-expand-sm navbar-dark">
            <div class="container-fluid">
                <div class="collapse navbar-collapse d-flex justify-content-end" id="navbarCollapse">
                    <div>
                    <a style="color: white; font-family: Montserrat; font-weight: bold;" href="view.php" class="nav-item nav-link">ПОКАЗАТЬ </a>
            </div>
            <div>
                <a style="color: white; font-family: Montserrat; font-weight: bold;" href="add.php" class="nav-item nav-link">ДОБАВИТЬ </a>
            </div>
            <div>
                <a style="color: white; font-family: Montserrat; font-weight: bold;" href="delete.php" class="nav-item nav-link">УДАЛИТЬ</a>
                    </div>
                </div>
            </div>
        </nav>
    </div>
</div>
<div class="row">
    <div class="d-none d-md-block col-xl-2 col-md-2 col-lg-2 col-xxl-2 lg-l"></div>
    <div class="col-xl-8 col-md-8 col-lg-8 col-xxl-8 m-3">
        <h4 class="text-uppercase">Студенты.View</h4><br />
        <!-- Форма для поиска -->
        <form method="GET" action="" class="row">
     <div class="col">
         <input type="text" name="search_term" placeholder="Search..." value="<?php if (isset($_GET['search_term'])){print $_GET['search_term'];};?>" class="form-control">
     </div>
     <div class="col-auto">
         <input type="submit" name="submit" value="ПОИСК" class="btn" style="background-color:#ffb900;">
     </div>
     <div class="col-auto">
         <input type="submit" name="reset" value="ОТМЕНА" class="btn btn-secondary">
     </div>
</form>
<br>

<?php
//запрос, представленный вторым параметром, на соединении, 
//указанном первым параметром, возвращает результат запроса в виде объекта результата
if ($result = mysqli_query($link, $sql)) {
    //функция используется для получения количества строк в результирующем наборе
    if (mysqli_num_rows($result) > 0) {
        echo "<table><tr><th>isikukood</th><th>lastname</th><th>firstname</th><th>grade</th><th>email</th><th>message</th><th>edit</th>"; // Добавляем заголовок "Actions"
        //извлечение строки результата запроса из базы данных в виде массива
        while ($row = mysqli_fetch_array($result)) {
            echo getRow($row);
        }
        //функция освобождает ресурсы, занимаемые результата запроса,
        // после того как все данные из результата были извлечены и больше не нужны.
        mysqli_free_result($result);
        echo "</table>";
        //обновление информации при использовании update.php
        echo "<br>";
        if (isset($_GET['info'])) {
            echo $_GET['info'];
        };
        
    } else {
        echo "Error: No records were found in database";
        echo mysqli_error($link);
    }
} else {
    echo "Error: Could not able to execute database";
    echo mysqli_error($link);
}
mysqli_close($link);

function getRow(array $arr){
    $arrayStringRow = "<tr>";
    for ($i = 0; $i < count($arr)/2; $i++) {
        $arrayStringRow .= "<td>$arr[$i]</td>";
    };
    // ссылка "Edit" с передачей isikukood записи
    $arrayStringRow .= "<td><a href='edit.php?isikukood={$arr['isikukood']}&lastname={$arr['lastname']}&firstname={$arr['firstname']}&grade={$arr['grade']}&email={$arr['email']}&message={$arr['message']}'>Edit</a></td>"; 
    $arrayStringRow .= "</tr>";
    return $arrayStringRow;
};
?>
    </div>
</div>
</body>
</html>