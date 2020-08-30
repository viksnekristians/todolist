<?php
include "includes/head.php" // Visu lapu ķermenis, augšdaļa
?>

<div class = "container-fluid py-1" style = "background-color:#696c6d">
  <h4 class = "text-center font-weight-bold ">Pievienot jaunu</h4>
</div>

<div class = "container mt-2" style = "width:50%">

  
  <form action = "includes/article.php" method = "post">
    <label>Virsraksts:</label><br>
    <input type = "text" name = "title" style = "width:100%" placeholder = "Virsraksts"><br>
    <label>Apraksts:</label><br>
    <textarea style = "width:100%; height: 15em" name = "desc" placeholder = "Apraksts"></textarea>
    <div class = "row">
      <div class = "col">
        
        <button class = "btn btn-warning" style = "color:white; overflow:hidden" type= "submit" name = "back">Doties atpakaļ</button>
      </div>
      <div class = "col">
       
        <button class = "btn btn-success" style = "overflow:hidden; float:right" type= "submit" name = "add">Pievienot</button>
      </div>
    </div>
  </form>

  <?php
  
  if (isset($_GET['emp'])) {
    if ($_GET['emp'] == 1) {
      echo "Jums jāievada virsraksts un/vai apraksts!";
    }
  }
  ?>
</div>



</body>
</html>
