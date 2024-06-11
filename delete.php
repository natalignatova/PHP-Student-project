<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta charset="utf-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;700&display=swap" rel="stylesheet">

    <title>Students.Delete</title>

    <style>
        body {
            padding-bottom: 20px;
            background-color: black;
            color: white;
            font-family: Montserrat;
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
		</div>  
  
  
   <div class="row">
       <div class="d-none d-md-block col-xl-2 col-md-2 col-lg-2 col-xxl-2 lg-l"></div>
          <div class="col-xl-8 col-md-8 col-lg-8 col-xxl-8 m-3">
              <h4 class="text-uppercase">Студенты.DELETE</h4><br />
			  
			    <form action="delfromdb.php" method="post">
				  
					      <div class="row mb-3">
                          <div class="offset-sm-2 col-sm-10">
                             <br>
                              <input type="submit" name="submit" value="УДАЛИТЬ ИЗ БАЗЫ ДАННЫХ" class="btn" style="background-color:#ffb900;" />

							  		<?php 
								    echo "<br>";
									if (isset($_GET['info'])) {
										echo $_GET['info'];
									};
									?>
                          </div>
                      </div>

                  </form>
			  
			  
			  
			  
			  
			  
		</div>
		</div>
		</div>
  
  
  </body>
</html>
