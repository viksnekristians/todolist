<?php
include "includes/head.php"
?>

  <div class = "container mt-2" style = "width:50%">
    <form action = "articleform.php" method = 'post'>
      <!-- Poga 'Pievienot jaunu' virs ierakstiem -->
      <button class ="btn btn-success" type = 'submit' name = 'add-article'>Pievienot jaunu</button>
    </form>

    <?php
    
    $article = new ArticleView();
    //Iegūst rezultātus no datubāzes
    $results = $article->getResults();

    
      foreach ($results as $row) {

        echo
        "<div class ='p-2 my-2";
        if($row['a_isDone'] > 0) {echo " green-bg";}
        echo "'>
        <h4><input class = 'mr-1' style = 'height:1.1em; width:1.1em;' type = 'checkbox' onclick ='changeStatus(this ,".$row['a_id'].")'";
        if($row['a_isDone'] > 0) {echo "checked" ;}
        echo ">".$row['a_title']."</h4><hr>
          <p>".$row['a_desc']."</p><br>
          <p class = 'text-right font-italic'>Pievienots:".$row['a_date']."</p>
          ";

          // Poga 'Labot'
          echo
          "<form action = 'articleedit.php?articleid=".$row['a_id']."' method = 'post'>
            <button class = 'btn btn-secondary' type= 'submit' name='btn".$row['a_id']."' >LABOT</button>
          </form>
        </div>";

    }
    
    if (!empty($results)) {
    echo
    "<form action = 'articleform.php' method = 'post'>
      <button class = 'btn btn-success mb-2' type = 'submit' name = 'add-article'>Pievienot jaunu</button>
    </form>";
  } else {
    echo "<br>Šobrīd nav pievienots neviens ieraksts";
  }


     ?>


</div>
<div id = "dbUpdate"></div>

</body>
<script>
function changeStatus(cBox , id) {
  $(cBox).parent().parent().toggleClass("green-bg");
  $("#dbUpdate").load("includes/checkBox.php" , {
    id:id
  })
}
</script>
</html>
