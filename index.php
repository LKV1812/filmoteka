<!DOCTYPE html>
<html lang="ru">
  <head>
    <meta charset="UTF-8"/>
    <title>UI-kit и HTML фреймворк - Документация</title>
    <!--[if IE]>
      <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <![endif]-->
    <meta name="viewport" content="width=device-width,initial-scale=1"/>
    <meta name="keywords" content=""/>
    <meta name="description" content=""/><!-- build:cssVendor css/vendor.css -->
    <link rel="stylesheet" href="libs/normalize-css/normalize.css"/>
    <link rel="stylesheet" href="libs/bootstrap-4-grid/grid.min.css"/>
    <link rel="stylesheet" href="libs/jquery-custom-scrollbar/jquery.custom-scrollbar.css"/><!-- endbuild -->
<!-- build:cssCustom css/main.css -->
    <link rel="stylesheet" href="./css/main.css"/><!-- endbuild -->
    <link rel="stylesheet" href="css/custom.css">
<link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800&amp;subset=cyrillic-ext" rel="stylesheet">
<!--[if lt IE 9]>
    <script src="http://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.2/html5shiv.min.js"></script><![endif]-->
  </head>
  <body>
    <?php  
     
      $link = mysqli_connect("localhost", "root", "", "hw-php-6-films");

      if(mysqli_connect_error($link)) {
        die("Ошибка подключения к базе данных!");
      }

      $success = "";
      $error = array();

      if (array_key_exists('add-film', $_POST)) {

        if ($_POST['title'] == '') {
          $error[] = "Введите название фильма!";
        }

        if ($_POST['genre'] == '') {
          $error[] = "Введите жанр фильма!";
        }

        if ($_POST['year'] == '') {
          $error[] = "Введите год выпуска фильма!";
        }


        
        if (($_POST["title"] != "") && ($_POST["genre"] != "") && ($_POST["year"] != "")) {

          $query = "INSERT INTO `user` (`title`,`genre`,`year`) VALUES (
                  '".mysqli_real_escape_string($link, $_POST['title'])."',
                  '".mysqli_real_escape_string($link, $_POST['genre'])."',
                  '".mysqli_real_escape_string($link, $_POST['year'])."' 
                )";
        
          if ($result = mysqli_query($link, $query)) {

            $success = "Фильм успешно добавлен!";
                
          }

        }

      }
      
      $query = "SELECT * FROM `user`";
      $resultFromTheDatabase = mysqli_query($link, $query);
      $receivedDataLine  = mysqli_fetch_array($resultFromTheDatabase);
      $films = array();

      if ($resultFromTheDatabase = mysqli_query($link, $query)) {
        
        while ($receivedDataLine = mysqli_fetch_array($resultFromTheDatabase)) {
         
          $films[] = $receivedDataLine;
    
        }

      }

    ?>
    <div class="container user-content pt-35">
      <?php  
        if ($success == "Фильм успешно добавлен!") {
          echo '<div class="success">'.$success.'</div>';
        }
      ?>
      <h1 class="title-1"> Фильмотека</h1>
      
      <?php  
        foreach ($films as $key => $value) {

          echo 
          '<div class="card mb-20">
            <h4 class="title-4">'.$value['title'].'</h4>
            <div class="badge">'.$value['genre'].'</div>
            <div class="badge">'.$value['year'].'</div>
          </div>';

        }

      ?>
     
      <div class="panel-holder mt-80 mb-40">
        <div class="title-4 mt-0">Добавить фильм</div>
        <form action="index.php" method="POST">

          <?php  

            for ($i = 0; $i < count($error); $i++) {
              echo '<div class="error">'.$error[$i].'</div>';
            }
            
          ?>
          
          <label class="label-title">Название фильма</label>
          <input class="input" type="text" placeholder="Введите название фильма..." name="title"/>
          <div class="row">
            <div class="col">
              <label class="label-title">Жанр</label>
              <input class="input" type="text" placeholder="Введите жанр фильма..." name="genre"/>
            </div>
            <div class="col">
              <label class="label-title">Год</label>
              <input class="input" type="text" placeholder="Введите год выпуска фильма..." name="year"/>
            </div>
          </div><input type="submit" class="button button--submit" href="regular" value="Добавить" name="add-film">
        </form>
      </div>
    </div><!-- build:jsLibs js/libs.js -->
    <script src="libs/jquery/jquery.min.js"></script><!-- endbuild -->
<!-- build:jsVendor js/vendor.js -->
    <script src="libs/jquery-custom-scrollbar/jquery.custom-scrollbar.js"></script><!-- endbuild -->
<!-- build:jsMain js/main.js -->
    <script src="js/main.js"></script><!-- endbuild -->
    <script defer="defer" src="https://use.fontawesome.com/releases/v5.0.6/js/all.js"></script>
  </body>
</html>