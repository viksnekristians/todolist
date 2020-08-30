<?php
include "autoloader.php";

//Pogas failā articleform.php
if (isset($_POST['back'])) {
  header("Location: ../index.php");
} else if (isset($_POST['add'])) {
    $title = $_POST['title'];
    $desc = $_POST['desc'];
    $date = date("Y.m.d")." ".date("H:i:s");

    if (empty($title) && empty($desc)) { // Pārbauda vai gan virsraksts, gan apraksts nav tukši
      header("Location: ../articleform.php?emp=1");
    } else {
      $a = new ArticleContr();
      $a->createArticle ($title, $desc, $date);
      header("Location: ../index.php");
    }

}
