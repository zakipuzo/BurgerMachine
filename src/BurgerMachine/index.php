<?php

include('Includes/config.php');
/// $ing_insuffisants on lui ajoute les ingredients pour message d'erreur 
$inginsuffisants="";
if (isset($_POST["fabriquer"]) && isset($_POST["idburger"])) {

  if ($_POST["fabriquer"] == "true") {

    ///La list de ingredients du burger
    $sqlingredents = "SELECT burger.id as idburger, recette.qteingredient, ingredient.libelle , ingredient.id as iding, ingredient.stock  FROM burger INNER JOIN recette ON recette.ref_burger = burger.id INNER JOIN ingredient ON recette.ref_ingredient = ingredient.id where burger.id=" . $_POST["idburger"];

    $query = $dbh->prepare($sqlingredents);
    $query->execute();

    if ($query->rowCount() < 1) {
      echo "<div class='fabriquer-error'>Ce Burger n'a aucun ingrédient</div>";
    } else {

      $burgerIngs = $query->fetchAll(PDO::FETCH_OBJ);
      $insuffisant = false;
      
      foreach ($burgerIngs as $burgerIng) {
        if ($burgerIng->qteingredient > $burgerIng->stock) {
          $inginsuffisants=$inginsuffisants.$burgerIng->libelle."<br>  ";
     
          $insuffisant = true;
        
        }
      }

      if ($insuffisant == false) { 
        foreach ($burgerIngs as $burgerIng) {
          $sqlingredents = "update ingredient set stock=" . ($burgerIng->stock - $burgerIng->qteingredient) . " where id=" . $burgerIng->iding ;
       
          $query = $dbh->prepare($sqlingredents);
         $query->execute();
        }
        echo "<div class='fabriquer-success'>Burger Fabriqué</div>";
        
      } else {
        echo "<div class='fabriquer-error'><h3>Le stock est insufissant</h3> ".$inginsuffisants."</div>";
      }
    }


    
  }
}


$sql = "SELECT * from burger";

$query = $dbh->prepare($sql);
$query->execute();
$burgers = $query->fetchAll(PDO::FETCH_OBJ);

include('Includes/header.php');
?>
<div class="jumbotron bg-light text-center">
  <h1>
    Burger Machine
  </h1>
</div>


<div class="row" style="margin-bottom:200px;">
  <?php
  foreach ($burgers as $burger) {


    $sql = "SELECT  ingredient.id as ingid, ingredient.libelle, recette.qteingredient, ingredient.stock FROM burger INNER JOIN recette ON recette.ref_burger = burger.id INNER JOIN ingredient ON recette.ref_ingredient = ingredient.id where burger.id=" . $burger->id;
    $query = $dbh->prepare($sql);
    $query->execute();
    $infosing = $query->fetchAll(PDO::FETCH_OBJ);


  ?>


    <div class="col-md-4" >
      <div class="card text-center">
        
          <img class="card-img-top" src="<?php echo $burger->img ?>" alt="Card image" style="width:100%">
        
       
          <div class="card-body">
            <form action="" method="POST">
              <input hidden value="<?php echo $burger->id ?>" name="idburger">
              <input hidden value="true" name="fabriquer">
              <input value="Fabriquer" type="submit" class="btn btn-success" />
              <a href="./recettes/edit?idburger=<?php echo $burger->id ?>" class="btn btn-primary">Changer la recette</a>

            </form><br>

            <div class="infoburg" style="position: relative">
            <h4 class="card-title"><?php echo $burger->nom ?></h4>
            <p class="card-text"><?php echo $burger->description ?></p>
            <div class="infoing ">
              <h4>Recette</h4>

<?php
if(!empty($infosing)){
  foreach ($infosing as $info) {
  echo $info->libelle . " (x" . $info->qteingredient . ") <br>";
}
}else{
  echo "Aucun";
}

?>
</div>
 </div>
          </div>
        

       
      </div>

    </div>
  <?php
  }
  ?>
</div>

<?php

include('Includes/footer.php');
?>