<?php

include('../Includes/config.php');


$msgerreur = "";

////Pour le formulaire : ajouter ou modifier un ingredient de la recette 
if (isset($_POST["idburger"]) && isset($_POST["iding"])) {

    if ($_POST["qteingredient"] < 1) {
        $msgerreur = "Entrer une quantité suppérieur à 0";
    } else {
        $sql_ingredientexist = "select ref_ingredient from recette where ref_burger=" . $_POST["idburger"] . " and ref_ingredient=" . $_POST["iding"];

        $query = $dbh->prepare($sql_ingredientexist);
        $query->execute();

        //si l'ingredient existe
        if ($query->rowCount() > 0) {

            $sqlupdate = "update recette set qteingredient=" . $_POST["qteingredient"] . " where ref_burger=" . $_POST["idburger"] . " and ref_ingredient=" . $_POST["iding"];

            $query = $dbh->prepare($sqlupdate);
            if ($query->execute()) {
                header("Location: Edit.php?idburger=" . $_POST["idburger"]);
            } else {
                exit("erreur");
            }
        } else {
            $sqlinsert = "insert into recette (ref_burger, ref_ingredient, qteingredient ) values (" . $_POST["idburger"] . ", " . $_POST["iding"] . ", " . $_POST["qteingredient"] . ")";



            $query = $dbh->prepare($sqlinsert);
            if ($query->execute()) {
                header("Location: Edit.php?idburger=" . $_POST["idburger"]);
            } else {

                echo $sqlinsert;
            }
        }
    }
}


if (isset($_GET["idburger"])) {

    /// recuperer le burger 
    $sqlburger = "SELECT burger.id as idburger, burger.img, burger.description,  burger.nom from burger where burger.id=" . $_GET["idburger"]." limit 1";


    $query = $dbh->prepare($sqlburger);
    $query->execute();
    if ($query->rowCount() > 0) {
        $burger = $query->fetch();
    } else {
        exit("Burhhhger indisponible");
    }



    ///La list de ingredients du burger
    $sqlingredents = "SELECT burger.id as idburger, burger.nom, ingredient.id as iding, ingredient.libelle, recette.qteingredient, ingredient.stock  FROM burger INNER JOIN recette ON recette.ref_burger = burger.id INNER JOIN ingredient ON recette.ref_ingredient = ingredient.id where burger.id=" . $_GET["idburger"];

    $query = $dbh->prepare($sqlingredents);
    $query->execute();
    $burgerIngs = $query->fetchAll(PDO::FETCH_OBJ);

    /// on recupere tous les ingredients pour remplir <select>
    $sqlingredents = "SELECT * FROM ingredient ";
    $query = $dbh->prepare($sqlingredents);
    $query->execute();
    //si aucun ingredient existe
    if ($query->rowCount() > 0) {
        $ingredients = $query->fetchAll(PDO::FETCH_OBJ);
    } else {

        $msgerreur = "Aucun ingrédient. Veuillez ajouter des ingrédients";
    }


    include('../Includes/header.php');
?>


    <div class="jumbotron text-center" style="background: url('../<?php echo $burger['img'] ?>');background-repeat:no-repeat; background-size:contain ;padding-bottom: 10em;">



    </div>
    <h2>
        La recette de <?php echo $burger['nom']; ?>
    </h2>
    <div class="row ">
       
        <div class="col-md-6 bg-info" style="color: white; padding:14px">
            <h3>Ajouter ou modifier les ingrédients</h3>
            <p class="text-danger"><?php echo $msgerreur ?></p>
            <form action="" method="POST">

                <input hidden name="idburger" value="<?php echo $burger['idburger']; ?>">

                <div class="form-group">
                    <label>Ingrédient</label>
                    <select name="iding" class="form-control" required>
                        <?php
                        foreach ($ingredients as $ingredient) {
                        ?>

                            <option value="<?php echo $ingredient->id ?>">
                                <?php echo $ingredient->libelle;
                                if ($ingredient->type == "sauce") {
                                    echo " (" . $ingredient->type . ")";
                                } ?>
                            </option>
                        <?php
                        }
                        ?>

                    </select>
                </div>
                <div class="form-group">
                    <label>Quantité</label>
                    <input type="number" value="1" name="qteingredient" class="form-control" required />
                </div>
                <div class="form-group">
                    <input class="btn btn-success" type="submit" value="Modifier la recette">
                </div>
            </form>
        </div>
        <div class="col-md-6">
            <h3>Recette</h3>
            <table class="table">
                <thead>
                    <tr>
                        <th>Libelle</th>
                        <th>Quantité</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($burgerIngs as $bergerIng) {
                    ?>

                        <tr>

                            <td>
                                <?php echo $bergerIng->libelle; ?>
                                
                            </td>
                            <td>
                                <?php echo $bergerIng->qteingredient; ?>
                            </td>
                            <td>
                                <a class="btn btn-danger" href="Delete?idburger=<?php echo $burger['idburger']; ?>&iding=<?php echo $bergerIng->iding; ?>" >Supprimer</a>
                            </td>
                        <?php
                    }
                        ?>

                        </tr>
                </tbody>
            </table>

        </div>



    <?php

} else {

    header("Location: Index.php");
    exit();
}


include('../Includes/footer.php');

    ?>