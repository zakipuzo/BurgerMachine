<?php
include('../Includes/config.php');

$msgerreur = "";

///IF POST
if (isset($_POST["iding"]) && isset($_POST["libelle"])) {


        $sql = "update ingredient set libelle='" . $_POST["libelle"] . "', type='" . $_POST["type"] . "', stock='".$_POST["stock"]."' where id=" . $_POST["iding"];

        $query = $dbh->prepare($sql);
        if ($query->execute()) {
            header("Location: Index.php");
            exit();
        } else {

            $msgerreur = "L'ingrédient existe déjà";
        }
    
}

///if get

if (isset($_GET["iding"])) {


    $sql = "SELECT * from ingredient where id=" . $_GET["iding"];

    $query = $dbh->prepare($sql);
    $query->execute();

    if ($query->rowCount() > 0) {

        $ingedientrow = $query->fetch();

        // var_dump($ingedientrow);
    } else {
        exit("Burger indisponible");
    }



    
include('../Includes/header.php');
?>

    <p><?php echo $msgerreur ?></p>
    <form action="" method="POST" enctype="multipart/form-data">
        <input hidden name="iding" value="<?php echo $ingedientrow['id'] ?>">
       
        <div>
            <input type="text" name="libelle" value="<?php echo $ingedientrow['libelle'] ?>">
        </div>

        <div>
           Type <select name="type">
               <?php 
               if($ingedientrow['type']=="simple"){
                ?>
              <option value="simple">Simple</option>
                    
                    <option value="sauce">Sauce</option>

                <?php
               }
               else{

                ?>
                   <option value="simple">Sauce</option>
                    
                    <option value="sauce">Simple</option>

                <?php
               }
               
               ?>
              
            </select>
        </div>
        <div>
           Stock <input type="number" name="stock" value="<?php echo $ingedientrow['stock'] ?>">
        </div>
        
        
        <input type="submit" value="Modifier">

    </form>
    <p><a href="./Index">Retour à la liste des Ingrédients</a></p>

<?php

} else {

    header("Location: Index.php");
    exit();
}


include('../Includes/footer.php');

?>
