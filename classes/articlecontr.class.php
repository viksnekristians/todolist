<?php

class ArticleContr extends Article {

  //Funkcija, kas izveido jaunu ierakstu
  public function createArticle ($title, $desc, $date) {
    $this->setArticle($title, $desc, $date);
  }

  // Funkcija, kas izmaina rakstu
  public function changeArticle ($id, $title, $desc) {
    $this->updateArticle($id, $title, $desc);
  }

  //Funkcija, kas izmaina raksta statusu
  public function changeArticleStatus ($id, $status) {
    $this->updateArticleStatus($id, $status);
  }

  //Funkcija, kas izdzēs ierakstu
  public function removeArticle($id) {
    $this->deleteArticle($id);
  }

}
