<?php
$fname = $_POST["username"];
if(isset($_FILES['file'])){
    //The error validation could be done on the javascript client si


    $errors= array();
    $file_name = $fname ;


    if(   move_uploaded_file($_FILES["file"]["tmp_name"],"img/".$_FILES["file"]["name"])  )
    {
        echo 'Upload effectué avec succès pour le fichier '.$fichier['name'] . "<br/>";
    }
    else
    {
        echo 'Echec de l\'upload. '. "<br/><br/>";
    }

    print_r($_FILES);

}
?>
