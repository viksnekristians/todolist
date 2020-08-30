<?php

class ArticleView extends Article {

  //Funkcija, kas atgriež visas tabulas rindas
  public function getResults() {
    $results = $this->getArticles();
    return $results;
  }

  //Funkcija, kas atgriež vienu tabulas rindu
  public function getRow($id) {
    $results = $this->getArticle($id);
    return $results;
  }

  //Funkcija, kas atgriež rindu skaitu pēc id
  public function getRowCount($id) {
    $results = $this->getArticleCount($id);
    return $results;
  }


}
