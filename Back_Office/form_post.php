<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire de post</title>

    <link rel="stylesheet" href="style_form.css">
</head>
<body>
<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    echo "<p>Traitement du formulaire</p>";
    echo "<p>Merci pour votre article</p>";


       // var_dump($_POST);

$mysqli = new mysqli("localhost", "root", "", "BLOG");

if ($mysqli->connect_errno) {
    echo "Problème de connexion à la base de données !";
    exit();
}

// Selectionner des données
$requete_sql = "INSERT INTO `Post` ( `title`, `photo_avatar`, `post_time`,`image_article`,`titreart`, `polike`, `comments`, `post_text`) 
VALUES ( 
    '".$_POST['pseudo']."', 
   './images/" . $_POST['avatar'] . "',
   '".$_POST['post-date'] . "',
   './images/" . $_POST['post-img'] . "',
   '".$_POST['titre']."', 
   '".$_POST['nolikes']."', 
   '".$_POST['nocom']."',  
   '" . $_POST['post-text']  . "');";

$result = $mysqli->query($requete_sql);
$mysqli->close();

?>

<?php
} else {
    ?>

    <form action="./form_post.php" class='submit-post' method="POST">
    <div class="affichage">
        <span class="avatar">
        <fieldset>
        <legend>Pseudo & Avatar</legend>
                <input type="text" name="pseudo" placeholder="Entrez votre pseudo" required>
                <p></p>
                <label class="label-avatar" for="votre-avatar">
                Votre avatar :
                <input type="file" name="avatar" accept="image/png, image/jpg" required>
                </label>
        </fieldset>
        </span>
        <div class="corppost">
        <fieldset>
        <legend>Titre & Article & image</legend>
        <input type="text" name="titre" placeholder="Entrez le titre de votre article" required>
        <textarea name="post-text" placeholder="Rédigez votre article" class="corpsart" rows="15" required></textarea>
            <p></p>
            <label class="label-image" for="votre-image">
            Votre image :
            <input type="file" class="post-img" name="post-img" accept="image/png, image/jpg" required>
            </label>
        </fieldset>
        <fieldset>
        <legend>Date de l'article</legend>    
        <input type="date" name="post-date" placeholder="dd-mm-yyyy" value="" min="1997-01-01" max="2030-12-31" class="dateArt" required>
        </fieldset>
        </div> 
        <div class="Reseau">
        <fieldset>
        <legend>Réseau social</legend>    
        <label class="label-like" for="nblikes">
            Nombre de Likes :
        <input type="number" name="nolikes" placeholder="Nombre de likes" value="0" min="0" max="15000" id="likes">
        </label>
        <p></p>
        <label class="label-com" for="nbcoms">
            Nombre de commentaires :
        <input type="number" name="nocom" placeholder="Nombre de commentaires" value="0" min="0" max="15000" id="comment">
        </label>    
         </fieldset>
      
        </div>
        <div class="response-message">
        <p class="bouton">
        <input type="submit" value="Envoyez votre article" name="submit">
        </p>
        </div>
</div>
</form>
<?php
}
?>

</body>
</html>