<?php
include('../Includes/config.php');

$sql = "SELECT * from burger";

$query = $dbh->prepare($sql);
$query->execute();
$results = $query->fetchAll(PDO::FETCH_OBJ);

include('../Includes/header.php');

?>

    <h1>BURGERS</h1>

    <p><a href="./Create"> + Nouveau Burger</a></p>
    <table id="mytable" class="table">
        <thead>
                 <th></th>
            <th>Nom</th>
            <th>Description</th>
            <th>Opérations</th>
        </thead>
        <tbody>

        <?php
    foreach ($results as $result) {
    ?>

        <tr>
        <td class="burgerimg"><img width="100" height="70" src="<?php echo "../".$result->img; ?>" ></td>
            <td><?php echo $result->nom; ?></td>
            <td><?php echo $result->description; ?></td>
            <td><a href="./Edit?idburger=<?php echo $result->id;?>">Modifier</a> |
            <a href="./Delete?idburger=<?php echo $result->id;?>">Supprimer</a>
        </td>
        </tr><br>
    <?php
    }
    ?>

        </tbody>
    </table>
    


    <?php 
    include('../Includes/footer.php');
    ?>