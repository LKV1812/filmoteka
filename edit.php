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

      if (array_key_exists('update-film', $_POST)) {

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

          $query = "UPDATE `films` SET 
            title = '".mysqli_real_escape_string($link, $_POST['title'])."', 
            genre = '".mysqli_real_escape_string($link, $_POST['genre'])."', 
            year = '".mysqli_real_escape_string($link, $_POST['year'])."' 
            WHERE id = ".mysqli_real_escape_string($link, $_GET['id']);
        
          if ($film = mysqli_query($link, $query)) {

            $success = "Фильм успешно отредактирован!";
                
          }

        }

      }

      $query = "SELECT * FROM `films` WHERE `id` = '".mysqli_real_escape_string($link, $_GET['id'])."'LIMIT 1";
      $result = mysqli_query($link, $query);
      $film = mysqli_fetch_array($result);

    ?>
    <div class="container user-content pt-35">
      <?php  

        if ($success == "Фильм успешно отредактирован!") {
          echo '<div class="success success--edit">'.$success.'</div>';
        }

      ?> 
      <h1 class="title-1">Фильм <?=$film['title']?></h1>
     
      <div class="panel-holder mb-20">
        <div class="title-4 mt-0">Редактировать фильм</div>
        <form action="edit.php?id=<?=$film['id']?>" method="POST">

          <?php  

            for ($i = 0; $i < count($error); $i++) {
              echo '<div class="error">'.$error[$i].'</div>';
            }
            
          ?>
          
          <label class="label-title">Название фильма</label>
          <input class="input" type="text" name="title" value="<?=$film['title']?>" />
          <div class="row">
            <div class="col">
              <label class="label-title">Жанр</label>
              <input class="input" type="text" name="genre" value="<?=$film['genre']?>" />
            </div>
            <div class="col">
              <label class="label-title">Год</label>
              <input class="input" type="text" name="year" value="<?=$film['year']?>" />
            </div>
          </div><input type="submit" class="button button--submit" href="regular" value="Изменить" name="update-film">
        </form>
      </div>
      <div class="mb-100">
        <a href="index.php" class="button">На главную</a>
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