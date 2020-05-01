<?php
include('../Includes/config.php');

$msgerreur = "";
///IF POST
if (isset($_POST["nomburger"]) && isset($_FILES['img'])) {



    //ok 

   
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

        
            $sql = "insert into burger (nom,description,img) values ('" . $_POST["nomburger"] . "','".$_POST["description"]."','".$path."')";

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
    
}

include('../Includes/header.php');

?>
<div class="jumbotron bg-light text-center">
<h1>Nouveau Burger</h1>
</div>

<p>Ajouter un nouveau Burger</p>

<p><?php echo $msgerreur ?> </p>
<form action="" method="POST" enctype="multipart/form-data">
    
<div class="form-group">
    <label>Nom</label>
    <input type="text" name="nomburger" class="form-control" placeholder="Nom" required>
    </div>
    <div class="form-group">
    <label>Description</label>
         <input type="text" name="description" class="form-control" placeholder="Description" required>
    </div>
    <div class="form-group">
    <label>Image</label>
         <input type="file" name="img" class="form-control btn btn-warning ">

    </div>
    <div class="form-group">
    <input class="btn btn-success" type="submit" value="Ajouter">  <a class="btn btn-info    " href="./Index">Retour à la liste des Burgers</a>
    </div>
</form>