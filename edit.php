
<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta charset="utf-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;700&display=swap" rel="stylesheet">

    <title>Students.Update</title>
    
    <style>
        body {
            padding-bottom: 20px;
            background-color: black;
            color: white;
            font-family: Montserrat;
        }
        input[type="text"],
        input[type="email"],
        textarea {
             background-color: #fce095 !important;
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
              <h4 class="text-uppercase">Student.update</h4><br />
			  
			    <form action="updateindb.php" method="post">
                <!--скрытый input для передачи isikukood для обновления в таблице-->
                <input hidden type="text" name="firstisikukood" value="<?php if (isset($_GET['isikukood'])){print $_GET['isikukood'];};?>" required>
				  
					<div class="row mb-3">
                          <label for="isikukood" class="col-sm-2 col-form-label">Isikukood</label>
                          <div class="col-sm-10">
                              <input type="text" class="form-control" pattern="[0-9]{11,11}"  name="isikukood" 
							  placeholder="Add isikukood" value="<?php if (isset($_GET['isikukood'])){print $_GET['isikukood'];};?>" required>
                          </div>
                      </div>

                      <div class="row mb-3">
                          <label for="lastname" class="col-sm-2 col-form-label">Lastname</label>
                          <div class="col-sm-10">
                              <input type="text" class="form-control" pattern="[a-zA-Z]{1,20}"  name="lastname" 
							  placeholder="Add lastname" 
							  value="<?php if (isset($_GET['lastname'])){print $_GET['lastname'];};?>" required>
                          </div>
                      </div>
					  
					  <div class="row mb-3">
                          <label for="firstname" class="col-sm-2 col-form-label">Firstname</label>
                          <div class="col-sm-10">
                              <input type="text" class="form-control" pattern="[a-zA-Z]{1,20}"  name="firstname" 
							  placeholder="Add firstname" 
							  value="<?php if (isset($_GET['firstname'])){print $_GET['firstname'];};?>" required>
                          </div>
                      </div>
					  
					  <div class="row mb-3">
                          <label for="grade" class="col-sm-2 col-form-label">Grade</label>
                          <div class="col-sm-10">
                              <input type="text" class="form-control" pattern="[1-3]{1,1}"  name="grade" 
							  placeholder="Add grade: 1, 2, 3" 
							  value="<?php if (isset($_GET['grade'])){print $_GET['grade'];};?>" required>
                          </div>
                      </div>

                      <div class="row mb-3">
                          <label for="email" class="col-sm-2 col-form-label">Email</label>
                          <div class="col-sm-10">
                              <input type="email" class="form-control" name="email" 
							  placeholder="Add email: example@example.ex" 
							  value="<?php if (isset($_GET['email'])){print $_GET['email'];};?>" required>
                          </div>
                      </div>
                    

                      <div class="row mb-3">
                          <label for="message" class="col-sm-2 col-form-label">Message</label>
                          <div class="col-sm-10">
                              <textarea rows="2" cols="60" name="message" class="form-control" 
							  value="<?php if (isset($_GET['message'])){print $_GET['message'];};?>" ><?php if (isset($_GET['message'])){print $_GET['message'];};?></textarea>
                          </div>
                      </div>

                      <div class="row mb-3">
                          <div class="offset-sm-2 col-sm-10">
                             <br>
                              <input type="submit" name="submit" value="ОБНОВИТЬ" class="btn" style="background-color:#ffb900;" />
                              <input type="reset" name="reset" value="ОТМЕНА" class=" btn btn-secondary" />

                          </div>
                      </div>

                  </form>
			 
		</div>
		</div>
		</div>
  
  
  </body>
</html>
