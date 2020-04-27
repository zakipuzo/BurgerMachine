

<?php 

include('Includes/config.php');
/*if(isset( $_POST["majStock"])){

    if($_POST["majStock"])=="false"){
 echo "<div class='message OK ' style='right: -300px;'>Le stock a bien été mis à jour</div>";
    }
    else{
        echo  "<div class='message' style='right: -300px;'>stocks de salade insuffisants</div>";
    }
   
}

if( isset( $_POST["burgerId"]) || isset( $_POST["action"]) ){


    echo "<h1>burger numro "+$_POST["burgerId"]+"</h1>
    <h3>"+$_POST["action"]+"  </h3>  ";

}
*/

$sql = "SELECT * from burger";

$query = $dbh->prepare($sql);
$query->execute();
$burgers = $query->fetchAll(PDO::FETCH_OBJ);

include('Includes/header.php');
?>

    
<div class="row">
    <?php
    foreach ($burgers as $burger) {


      $sql="SELECT  ingredient.id as indi, ingredient.libelle, recette.qteingredient, ingredient.stock FROM burger INNER JOIN recette ON recette.ref_burger = burger.id INNER JOIN ingredient ON recette.ref_ingredient = ingredient.id where burger.id=".$burger->id;
      $query = $dbh->prepare($sql);
      $query->execute();
      $infos = $query->fetchAll(PDO::FETCH_OBJ);
      
      
    ?>


        <div class="col-md-4">
<div class="card" >
    <img class="card-img-top" src="<?php echo $burger->img?>" alt="Card image" style="width:100%">
    <div class="card-body">
    <a href="#" class="btn btn-primary">Fabriquer</a>
      <a href="#" class="btn btn-primary">Changer la recette</a>
      <br>
      <h4 class="card-title"><?php echo $burger->nom ?></h4>
      <p class="card-text"><?php echo $burger->description ?></p>
      
      <p>
        <?php
      foreach ($infos as $info) {
        echo $info->libelle."<br>";
      }
      ?>
      </p>
        
     
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