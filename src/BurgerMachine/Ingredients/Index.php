<?php

include('../Includes/config.php');


$msgerreur = "";


//La liste d'ingredients de type simple 
$sql = "select * from ingredient where type='simple'";
$query = $dbh->prepare($sql);
if (!$query->execute()) {
  $msgerreur = "Erreur";
  exit();
}
$ingredients = $query->fetchAll(PDO::FETCH_OBJ);
/// La liste d'ingredients de type sauce
$sql = "select * from ingredient where type='sauce'";
$query = $dbh->prepare($sql);

if (!$query->execute()) {
  $msgerreur = "Erreur";
  exit();
}


$sauces = $query->fetchAll(PDO::FETCH_OBJ);

///




if (isset($_POST["changed"])) {


  $length = sizeof($_POST["id"]);

  $stockchanged = false;
  for ($i = 0; $i < $length; $i++) {


    $sql = "update ingredient set stock=" . $_POST["stock"][$i] . " where id=" . $_POST["id"][$i];
    
    $query = $dbh->prepare($sql);
    if ($query->execute()) {

      $stockchanged = true;
    } else {
    
      $msgerreur = "Erreur veuillez réessayer!";
    }
  }
  if ($stockchanged) {
    header("Location: Index.php?misajour=true");

  }
}

if (isset($_GET["misajour"])) {

  echo "<div>Le stock a été mis à jour</div>";
}
/*
if (isset($_POST["burgerId"]) || isset($_POST["action"])) {


  echo "<h1>burger numro " + $_POST["burgerId"] + "</h1>
    <h3>" + $_POST["action"] + "  </h3>  ";
}
*/

include('../Includes/header.php');

?>



<section>
<div class="jumbotron bg-light text-center">
<h1>Stock d'ingrédients</h1>
</div>
 

  <a class="btn btn-success "href="./Create">+Nouveau Ingredient</a>

  <div class="stockchanged text-center">
      <a  class="btn btn-danger " onclick="document.getElementById('stockform').submit();">Modifier le stock</a>
      <a  class="btn btn-info " href="./Index">Annuler</a>
    </div>
<div style="overflow-x:auto;">
  <form id="stockform" action="" method="POST"  style="position: relative">


    <input name="changed" value=true type="hidden">
    
    <div class="tables">
    
      <table id="mytable" class="table">
        <thead>
          <tr>
            <th>Ingrédient</th>

            <th>Stock</th>
            <th></th>
            <th></th>
          </tr>
        </thead>
        <tbody>
          <?php
          foreach ($ingredients as $ingredient) {

          ?>
            <tr>



              <td class="ing"><?php echo  $ingredient->libelle ?></td>

              <td style="display: flex">
                <span class="moins">-</span>
                <input readonly class="stockinput" type="text" name="stock[]" value="<?php echo $ingredient->stock ?>" />
                <span class="plus">+</span>

                <input type="hidden" name="id[]" value="<?php echo $ingredient->id ?>" />

              </td>



              <td>
              <div class="editdelete">
                <a class="btn btn-info" href="./Edit?iding=<?php echo $ingredient->id; ?>">Modifier</a>  
                <a class="btn btn-danger" href="./Delete?iding=<?php echo $ingredient->id; ?>"> Supprimer</a>
              </div>
              </td>
            </tr>
          <?php
          }
          ?>

        </tbody>

      </table>
  

      <table id="mytable" class="table">

        <thead>
          <tr>
            <th>Sauces</th>

            <th>Stock</th>
            <th>
           
            </th>
            <th></th>
          </tr>
        </thead>

        <body>
          <?php

          foreach ($sauces as $sauce) {

          ?>
            <tr>

              <td class="ing"><?php echo  $sauce->libelle ?></td>

              <td style="display: flex">
                <span class="moins">-</span>
                <input class="stockinput" type="text" name="stock[]" value="<?php echo $sauce->stock ?>" />
                <span class="plus">+</span>

                <input type="hidden" name="id[]" value="<?php echo $sauce->id ?>" />

              </td>


              <td >
                <div class="editdelete">
              <a class="btn btn-info" href="./Edit?iding=<?php echo $sauce->id; ?>">Modifier</a> 
                <a class="btn btn-danger" href="./Delete?iding=<?php echo $sauce->id; ?>">Supprimer</a>
                </div>
               
              </td>
            </tr>
          <?php
          }
          ?>
        </body>



      </table>
    
    </div>


  </form>
  
  </div>
</section>

<?php
include('../Includes/footer.php');
?>