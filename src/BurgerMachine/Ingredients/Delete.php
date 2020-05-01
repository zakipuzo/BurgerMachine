<?php
include('../Includes/config.php');


///IF POST
if (isset($_POST["iding"])) {


    $sql = "delete from recette where ref_ingredient=".$_POST["iding"]."; delete from ingredient where id=" . $_POST["iding"];

    $query = $dbh->prepare($sql);

    $query->execute();

    //ok 
    header("Location: Index.php");
    exit();
}

///else continue

if (isset($_GET["iding"])) {


    $sql = "SELECT * from ingredient where id=" . $_GET["iding"];

    $query = $dbh->prepare($sql);
    $query->execute();

    if ($query->rowCount() > 0) {

        $ingrow = $query->fetch();
    } else {
        exit("Burger indisponible");
    }

    include('../Includes/header.php');

?>

<div class="jumbotron bg-light text-center">
<h1>Supprimer ingrédient</h1>
</div>

    <form action="" method="POST">
        <input hidden name="iding" value="<?php echo $ingrow['id'] ?>">

        <p>Vous etes sure de supprimer le burger <?php echo $ingrow['libelle'] ?></p>

        <p>Attention! toutes les recettes en relation avec cet ingrédient vont être supprimées</p>
        <input type="submit" value="Supprimer" class="btn btn-danger"><a href="./Index" class="btn btn-info">Retour à la liste des Ingrédients</a>

    </form>

<?php




    ///else if isset()
} else {

    header("Location: Index.php");
    exit();
}

include('../Includes/footer.php');
?>