<?php
include "includes/head.php" // Visu lapu ķermenis, augšdaļa
?>

<div class = "container-fluid py-1" style = "background-color:#696c6d">
  <h4 class = "text-center font-weight-bold ">Labot</h4>
</div>

<div class = "container mt-2" style = "width:50%">
<?php

if (isset($_GET['articleid'])) {
  $id =  $_GET['articleid'];
  $a = new ArticleView(); //article view objekts
  $res = $a->getRowCount($id);
  
  if ($res['count(*)'] == 1) {
    
       $result = $a->getRow($id);
       
    
    echo '<form method = "post">
      <label>Virsraksts:</label><br>
      <input type = "text" style = "width:100%" name = "title" value = "'.$result[0]["a_title"].'"><br>
      <label>Apraksts:</label><br>
      <textarea style = "width:100%; height: 15em" name = "desc" >'.$result[0]["a_desc"].'</textarea>'; ?>

      <div class = "row">
        <div class = "col">
          <button class = "btn btn-warning" style = "overflow:hidden; color:white; width:60%" type= "submit" name = "back">Doties atpakaļ</button>
        </div>
        <div class = "col">
          <button class = "btn btn-danger" style = "overflow:hidden; width:60%; display:block; margin-left:auto; margin-right:auto;" type= "submit" name = "delete">Dzēst</button>
        </div>
        <div class = "col">
          <button class = "btn btn-success float-right" style = "overflow:hidden; width:60%" type= "submit" name = "save">Saglabāt</button>
        </div>
      </div>
    </form>';

    <?php
    //Ja nospiesta poga 'Atpakaļ'
    if (isset($_POST['back'])) {
      header("Location: index.php");
    }

    // Ja nospiesta poga 'Dzēst'
    if (isset($_POST['delete'])) {
      $c = new ArticleContr();
      $c->removeArticle($id);
      header("Location: index.php");
    }

    //Ja nospiesta poga 'Saglabāt'
    if (isset($_POST['save'])) {
      if (empty($_POST['title']) && empty($_POST['desc'])) { // Pārbauda , vai ieraksti nav tukši
        echo "Jums jāievada virsraksts un/vai apraksts!";
      } else {
        $c = new ArticleContr();
        $c->changeArticle($id , $_POST['title'] , $_POST['desc']);
        header("Location: index.php?update=success");
      }
    }

  } else {
    header("Location: index.php");
  }
  } else {
    header("Location: index.php");
  }
?>
</div>

</body>
</html>
