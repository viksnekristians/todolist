<?php
include "autoloader.php";
$id = $_POST['id'];
$aw = new ArticleView;
$row = $aw->getRow($id);
$status = $row[0]['a_isDone'];
$ac = new ArticleContr;
if ($status == 0) {
  $ac->changeArticleStatus ($id, 1);
} else {
  $ac->changeArticleStatus ($id, 0);
}

 ?>
