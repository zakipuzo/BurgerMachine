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


?>


<h2>Nouveau Burger</h2>

<p><?php echo $msgerreur ?> </p>
<form action="" method="POST" enctype="multipart/form-data">
    <div>
        Nom <input type="text" name="nomburger" required>
    </div>
    <div>
        Description <input type="text" name="description" required>
    </div>
    <div>
        Image <input type="file" name="img" >

    </div>

    <input type="submit" value="Créer">

</form>