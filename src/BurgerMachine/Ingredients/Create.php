<?php
include('../Includes/config.php');

$msgerreur = "";
///IF POST
if (isset($_POST["libelle"])) {

    if ($_POST["stock"] < 0) {
        $msgerreur = "<p class='text-danger'>Le stock doit positive</p >";
    }else{
        


        $sql = "insert into ingredient (libelle,type,stock) values ('" . $_POST["libelle"] . "','" . $_POST["type"] . "','" . $_POST["stock"] . "')";

        $query = $dbh->prepare($sql);


        if ($query->execute()) {
            //ok 
            header("Location: Index.php");
            exit();
        } else {

            $msgerreur = "Le burger existe déjà";
        }
    }
}

include('../Includes/header.php');
?>

<div class="jumbotron bg-light text-center">
    <h1>Nouveau ingrédient</h1>
</div>

<p><?php echo $msgerreur ?></p>
<form action="" class="" method="POST" enctype="multipart/form-data">
    <div class="form-group">
        <label> Nom </label>
        <input type="text" name="libelle" class="form-control" required>
    </div>

    <div class="form-group">
        <label> Type </label>
        <select name="type" class="form-control" required>
            <option value="simple">Simple</option>

            <option value="sauce">Sauce</option>
        </select>
    </div>
    <div class="form-group">
        <label>Stock</label>
        <input type="number" value="1" name="stock" class="form-control" required>
    </div>

    <div class="form-group">
        <input class="btn btn-success" type="submit" value="Ajouter"> <a class="btn btn-info" href="./Index">Retour à la liste des Ingrédients</a>
    </div>
</form>



<?php

include('../Includes/footer.php');

?>