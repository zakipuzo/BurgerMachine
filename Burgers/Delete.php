<?php
include('../Includes/config.php');


///IF POST
if(isset($_POST["idburger"]) ){

   
    $sql = "delete from recette where ref_burger=".$_POST["idburger"]."; delete from burger where id=".$_POST["idburger"];
   
    $query = $dbh->prepare($sql);

    
    if(!$query->execute()){
        exit("Error");
    }

      
    //ok 
    header("Location: Index.php");
    exit();
}

///else continue

if (isset($_GET["idburger"])) {


    $sql = "SELECT * from burger where id=" .$_GET["idburger"];
   
    $query = $dbh->prepare($sql);
    $query->execute();

    if ($query->rowCount() < 1) {
        exit("Burger indisponible");
    }

        $burgerrow = $query->fetch();

      

        include('../Includes/header.php');
?>


            <form action="" method="POST">
            <input hidden name="idburger" value="<?php echo $burgerrow['id'] ?>" >
          
            <p>Vous etes sure de supprimer le burger  <?php echo $burgerrow['nom'] ?></p>
            <input type="submit" value="Oui">

        </form>

        <p><a href="./Index" >Retour à la liste des Burgers</a></p>
<?php
   



    ///else if isset()
} else {

    header("Location: Index.php");
    exit();
}


include('../Includes/footer.php');

?>