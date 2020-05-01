<?php
include('../Includes/config.php');

$msgerreur = "";

///IF POST
if (isset($_POST["idburger"]) && isset($_POST["nomburger"])) {


   
    ///IF POST
    if ($_FILES['img']['size'] != 0) {

  
      
        $errors = array();
        $file_name = $_POST["nomburger"];
        $file_size = $_FILES['img']['size'];
        $file_tmp = $_FILES['img']['tmp_name'];
        $file_type = $_FILES['img']['type'];
        $tmp = explode('.', $_FILES['img']['name']);
        $file_ext = strtolower(end($tmp));

        $path = "img/".$file_name . "." . $file_ext;
        $extensions = array("jpeg", "jpg", "png");


        if (in_array($file_ext, $extensions) === false) {
            $errors[] = "extension not allowed, please choose a JPEG or PNG file.";
        }

        if ($file_size > 2097152) {
            $errors[] = 'File size must be excately 2 MB';
        }

        if (empty($errors) == true) {
            move_uploaded_file($file_tmp, "../" . $path);
            echo "Success";

            $sql = "update burger set nom='" . $_POST["nomburger"] . "', img='" . $path . "', description='".$_POST["description"]."' where id=" . $_POST["idburger"];
            $query = $dbh->prepare($sql);
            if ($query->execute()) {
                header("Location: Index.php");
                exit();
            } else {

                $msgerreur = "Le burger existe déjà";
            }
        } else {
            foreach ($errors as $error) {
                echo $error;
            }
        }
    } else {
        $sql = "update burger set nom='" . $_POST["nomburger"] . "', description='".$_POST["description"]."' where id=" . $_POST["idburger"];

        $query = $dbh->prepare($sql);
        if ($query->execute()) {
            header("Location: Index.php");
            exit();
        } else {

            $msgerreur = "Le burger existe déjà";
        }
    }
}

///if get

if (isset($_GET["idburger"])) {


    $sql = "SELECT * from burger where id=" . $_GET["idburger"];

    $query = $dbh->prepare($sql);
    $query->execute();

    if ($query->rowCount() > 0) {

        $burgerrow = $query->fetch();

        // var_dump($burgerrow);
    } else {
        exit("Burger indisponible");
    }



    
include('../Includes/header.php');
?>

<div class="jumbotron bg-light text-center">
<h1>Modifier Burger</h1>
</div>
    <p><?php echo $msgerreur ?></p>
    <form action="" method="POST" enctype="multipart/form-data">
        <input hidden name="idburger" value="<?php echo $burgerrow['id'] ?>">
        <div>
            <img width="200" src="../<?php echo $burgerrow['img'] ?>">
        </div>
        <div class="form-group">
    <label>Nom</label>
            
            <input class="form-control" type="text" name="nomburger" value="<?php echo $burgerrow['nom'] ?>">
        </div>
        <div class="form-group">
    <label>Description</label>
           Description <input class="form-control" type="text" name="description" value="<?php echo $burgerrow['description'] ?>">
        </div>
        <div class="form-group">
    <label>Image</label>
             <input  class="form-control btn btn-warning" type="file" name="img">

        </div>
        <div class="form-group">
        <input class="btn btn-success" type="submit" value="Modifier"> <a class="btn btn-info    " href="./Index">Retour à la liste des Burgers</a>
        <a class="btn btn-primary " href="../recettes/Edit?idburger=<?php echo $burgerrow['id'] ?>">Editer la recette</a>
    </div>

    </form>
    

<?php

} else {

    header("Location: Index.php");
    exit();
}


include('../Includes/footer.php');

?>
