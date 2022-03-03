<?php 
    if(isset($_POST) || !empty($_POST)){
        include("connexion.php");

        var_dump($pdo);

        var_dump($_POST);
        var_dump($_FILES);

         var_dump(move_uploaded_file($_FILES['images']['tmp_name'], "/images/"));

        //Enregistrement BDD
        $req=$pdo->prepare("insert into articles(titre, contenu, image) values(?, ?, ?)");

        $req->execute([$_POST['titre'],$_POST['contenu'],$_POST['image']]);

        //Enregisre l'image téléchargé dans un dossier du projet


        // $req->execute(array($_FILES["image"]["name"], $_FILES["image"]["size"], $_FILES["image"]["type"], file_get_contents($_FILES["image"]["tmp_name"])));
    }else{
        echo "POST empty";
    }
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>formulaire</title>
</head>
<body>

<h1>Formulaire</h1>

<form method="post" enctype="multipart/form-data">
    <div>
        <label for="titre">Titre de l'article</label>
     <input type="text" name ="titre" id="titre">
    </div>
    <div>
        <label for="contenu">Contenu de l'article</label>
        <textarea id="contenu" name="contenu" rows="6" cols="25">Début de l'histoire</textarea>
    </div>
    <div>
        <label for="image">Image</label>
        <input type="file" name="image">
    </div>
    <input type="submit" value="charger"/>
</form>

<!-- <form name="fo" method="post" action="" enctype="multipart/form-data">
    <input type="file" name="image"><br>
    <input type="submit" name="valider" value="charger">

</form>   -->
    
</body>
</html>