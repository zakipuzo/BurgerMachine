<?php
include('../Includes/config.php');

$sql = "SELECT * from burger";

$query = $dbh->prepare($sql);
$query->execute();
$results = $query->fetchAll(PDO::FETCH_OBJ);

include('../Includes/header.php');

?>
<div class="jumbotron bg-light text-center">
<h1>BURGERS</h1>
</div>
 
   
    <p><a href="./Create" class="btn btn-success"> + Nouveau Burger</a></p>

    <div style="overflow-x:auto;">
    <table id="mytable" class="table">
        <thead>
            <tr>
                 <th></th>
            <th>Nom</th>
            <th>Description</th>
            <th></th>
            <th></th>
        </tr>
        </thead>
        <tbody>

        <?php
    foreach ($results as $result) {
    ?>

        <tr>
        <td class="burgerimg"><img width="100" height="70" src="<?php echo "../".$result->img; ?>" ></td>
            <td><?php echo $result->nom; ?></td>
            <td><?php echo $result->description; ?></td>
            <td>
            <a class="btn btn-primary " href="../recettes/Edit?idburger=<?php echo $result->id; ?>">Recette</a>
            </td>
            <td>
            <a class="btn btn-info" href="./Edit?idburger=<?php echo $result->id; ?>">Modifier</a>  
                <a class="btn btn-danger" href="./Delete?idburger=<?php echo $result->id; ?>"> Supprimer</a>
          </td>
        </tr>
    <?php
    }
    ?>

        </tbody>
    </table>
    </div>


    <?php 
    include('../Includes/footer.php');
    ?>