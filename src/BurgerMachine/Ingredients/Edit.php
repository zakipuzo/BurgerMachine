<?php
include('../Includes/config.php');

$msgerreur = "";

///IF POST
if (isset($_POST["iding"]) && isset($_POST["libelle"])) {


    if ($_POST["stock"] < 0) {
        $msgerreur = "<p class='text-danger'>Le stock doit positive</p >";
    }else{
        

        $sql = "update ingredient set libelle='" . $_POST["libelle"] . "', type='" . $_POST["type"] . "', stock='".$_POST["stock"]."' where id=" . $_POST["iding"];

        $query = $dbh->prepare($sql);
        if ($query->execute()) {
            header("Location: Index.php");
            exit();
        } else {

            $msgerreur = "L'ingrédient existe déjà";
        }
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

<div class="jumbotron bg-light text-center">
<h1>Modifier ingrédient</h1>
</div>
    <p><?php echo $msgerreur ?></p>
    <h2>Modifier ingredient :<?php echo $ingedientrow['libelle'] ?></h2>
    <form action="" method="POST" enctype="multipart/form-data">
        <input hidden name="iding" value="<?php echo $ingedientrow['id'] ?>">
        <div class="form-group">
     <label>Libelle</label>
            <input type="text" name="libelle" class="form-control" value="<?php echo $ingedientrow['libelle'] ?>">
        </div>

        <div>
        <div class="form-group">
     <label>Type</label>
     <select name="type" class="form-control">
               <?php 
               if($ingedientrow['type']=="simple"){
                ?>
              <option value="simple">Simple</option>
                    
                    <option value="sauce">Sauce</option>

                <?php
               }
               else{

                ?>
                   <option value="sauce">Sauce</option>
                    
                    <option value="simple">Simple</option>

                <?php
               }
               
               ?>
              
            </select>
        </div>
        <div class="form-group">
     <label>Stock</label>
     
            <input type="number" name="stock" class="form-control" value="<?php echo $ingedientrow['stock'] ?>">
        </div>
        
        
        <input type="submit" value="Modifier" class="btn btn-danger"> <a href="./Index" class="btn btn-info">Retour à la liste des Ingrédients</a>

    </form>
    

<?php

} else {

    header("Location: Index.php");
    exit();
}


include('../Includes/footer.php');

?>
