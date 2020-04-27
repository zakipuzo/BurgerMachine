
<?php
include('../Includes/config.php');

$msgerreur="";
///IF POST
if(isset($_POST["libelle"]) ){

   
    $sql = "insert into ingredient (libelle,type,stock) values ('".$_POST["libelle"]."','".$_POST["type"]."','".$_POST["stock"]."')" ;
   
    $query = $dbh->prepare($sql);

    
        if($query->execute()){
        //ok 
         header("Location: Index.php");
          exit();
    }
    else{
       
            $msgerreur="Le burger existe déjà";
       
    }
  

    
}

include('../Includes/header.php');
?>

<p><?php echo $msgerreur ?></p>
    <form action="" method="POST" enctype="multipart/form-data">
        
        <div>
            <input type="text" name="libelle" required>
        </div>
        <div>
           Type <select name="type" required>
                <option value="simple">Simple</option>
                    
                <option value="sauce">Sauce</option>
            </select>
        </div>
        <div>
           Stock <input type="number" name="stock"  required>
        </div>
       
        <input type="submit" value="Modifier">

    </form>
    <p><a href="./Index">Retour à la liste des Ingrédients</a></p>


    <?php 

include('../Includes/footer.php');

?>