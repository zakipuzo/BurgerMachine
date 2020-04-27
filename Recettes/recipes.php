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



if (isset($_POST["id"])) {

  $length=sizeof($_POST["id"]);

   $stockchanged=false;
 for ($i=0; $i < $length; $i++) { 
   $sql = "update ingredient set stock='".$_POST["stock"][$i]."' where id=" . $_POST["id"][$i];

   $query = $dbh->prepare($sql);
   if ($query->execute()) {
     
        $stockchanged=true;
       
   } else {

       $msgerreur = "Erreur veuillez réessayer!";
   }
 }
 if($stockchanged){
   header("Location: Index.php?misajour=true");
 }
  
}
?>


      <form id="form-recipe" action="recipes.php" method="POST">
      <input type="hidden" name="maj" value=True>
      <input type="hidden" name="burgerId" value="1">
      
      <label for="ing-select">Ingrédient</label>
      <select id="ing-select" class="ingredients" name="ingId">
                    <option value="1">Pain</option>
                    <option value="2">Salade</option>
                    <option value="3">Tomate</option>
                    <option value="4">Cheddar</option>
                    <option value="5">Steack Haché</option>
                    <option value="6">Cornichons</option>
                    <option value="7">émincé De Poulet</option>
                    <option value="8">Oignons</option>
                    <option value="9">Sauce Uranium</option>
                    <option value="10">Mayo</option>
                    <option value="11">Ketchup</option>
                    <option value="12">Mimolette</option>
                    <option value="13">Steak Végé</option>
                    <option value="14">Fêta</option>
                    <option value="15">Sauce Blanche</option>
                    <option value="16">Bacon</option>
              </select>
      <label for="quantity">Quantité</label>
      <select class="quantity" name="quantity">
        <option value=0> 0 (Supprimer l'ingrédient)</option><option value=1 selected >1</option><option value=2  >2</option><option value=3  >3</option><option value=4  >4</option><option value=5  >5</option>      </select>
      <a class="button submit"  onclick="document.getElementById('form-recipe').submit();">VALIDER</a>
      <a class="button back" href="./" title="">Retour à la page d'accueil</a>
    </section>
</main>
  </body>
</html>
