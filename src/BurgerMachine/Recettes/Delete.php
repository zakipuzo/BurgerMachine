<?php
include('../Includes/config.php');


///IF POST
if (isset($_POST["iding"]) && isset($_POST["idburger"])) {


    $sql = "delete from recette where ref_ingredient=".$_POST["iding"]." and ref_burger=".$_POST["idburger"];

    $query = $dbh->prepare($sql);

    $query->execute();

    //ok 
    header("Location: Edit.php?idburger=".$_POST["idburger"]);
    exit();
}

///else continue

if (isset($_GET["iding"]) && isset($_GET["idburger"])) {

  ////on recupere l'ingredient
    $sql = "SELECT * from ingredient where id=" . $_GET["iding"]." limit 1";

    $query = $dbh->prepare($sql);
    $query->execute();

    if ($query->rowCount() > 0) {

        $ingrow = $query->fetch();
    } else {
        exit("Burger indisponible");
    }

    ////on recupere le burger
    $sql = "SELECT * from burger where id=" . $_GET["idburger"]." limit 1";

    $query = $dbh->prepare($sql);
    $query->execute();

    if ($query->rowCount() > 0) {

        $burgrow = $query->fetch();
    } else {
        exit("Burger indisponible");
    }
    include('../Includes/header.php');

?>

    <form action="" method="POST">
        <input hidden name="iding" value="<?php echo $ingrow['id'] ?>">
        <input hidden name="idburger" value="<?php echo $burgrow['id'] ?>">

        <p>Vous etes sure de supprimer l'ingredient <?php echo $ingrow['libelle']?>  du burger  <?php echo $burgrow['nom']?></p>

     
        <input class="btn btn-danger" type="submit" value="Supprimer">

    </form>

    <p><a href="./Index">Retour à la liste des Ingrédients</a></p>
<?php




    ///else if isset()
} else {

    
}

include('../Includes/footer.php');
?>