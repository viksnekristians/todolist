<?php

class Article extends Database {

  // Funkcija, kas atgriež visu rakstu sarakstu
  protected function getArticles() {
      $sql = "select * from articles order by a_date desc; ";
      //"Prepared statement" izveide, izpilde
      $stmt = $this->connect()->prepare($sql);
      $stmt->execute();
      //Rezultātu iegūšana
      $results = $stmt->fetchAll();
      return $results;
    }

    //Funkcija, kas atgriež vienu rakstu pēc id.
    protected function getArticle($id) {
        $sql = "select * from articles where a_id = ? ";
        //"Prepared statement" izveide, izpilde
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$id]);
        //Rezultātu iegūšana
        $results = $stmt->fetchAll();
        return $results;
      }

    //Funkcija, kas atgriež ierakstu skaitu pēc id
    protected function getArticleCount($id) {
        $sql = "select count(*) from articles where a_id = ? ";
        //"Prepared statement" izveide, izpilde
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$id]);
        //Rezultātu iegūšana
        $results = $stmt->fetch();
        return $results;
      }

    //Funkcija, kas izmaina rakstu
    protected function updateArticle($id, $title, $desc) {
        $sql = "update articles set a_title = ? , a_desc = ? where a_id = ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$title, $desc , $id]);
      }
      
      //Funkcija, kas izmaina raksta statusu
    protected function updateArticleStatus($id, $status) {
        $sql = "update articles set a_isDone = ? where a_id = ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$status , $id]);
        }

    // Funkcija, kas pievieno rakstu datubāzei
    protected function setArticle($title, $desc, $date ) {
      $sql = "insert into articles(a_title,a_desc,a_date,a_isDone)
      values (?,?,?,?);";
      //"Prepared statement" izveide, izpilde
      $stmt = $this->connect()->prepare($sql);
      $stmt->execute([$title, $desc, $date , 0]);
    }

    // funkcija, kas izdzēš rakstu pēc id
    protected function deleteArticle($id) {
      $sql = "delete from articles where a_id = ?";
      $stmt = $this->connect()->prepare($sql);
      $stmt->execute([$id]);
    }
}
