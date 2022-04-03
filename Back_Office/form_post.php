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
<header class="topbar">
    <div class="margou">
      <div class="image">
      <img width="120px"  onmouseout="this.src='./images/margouilla.png'; " onmouseover="this.src='./images/margouilla2.png'; " src="./images/margouilla.png"/> 
    </div> 
  </div>    
      <nav class="topbar-nav">
      <a href="#"></a>
      <a href="#"></a>
      <a href="<?php echo $_SERVER['HTTP_REFERER']; ?>"><img width="60px" src="./images/back_arrow.png" alt="retour"></a>
    </nav>
    
  </header>
<div class="merci"><span id="merciok">
<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST'){
 
    echo "<p>Traitement du formulaire</p>";
    echo "<p>Merci pour votre article</p>";


       // var_dump($_POST);

$mysqli1 = new mysqli("localhost", "root", "", "BLOG");

if ($mysqli1->connect_errno) {
    echo "Problème de connexion à la base de données !";
    exit();
}
// nb de post
$query="SELECT * FROM `Post` WHERE 1;";
$result = $mysqli1->query($query);
$nbpost=$result->num_rows;   
$result->free_result();
$mysqli1->close();

$mysqli2 = new mysqli("localhost", "root", "", "BLOG");
if ($mysqli2->connect_errno) {
  echo "Problème de connexion à la base de données !";
  exit();
}
// Selectionner des données
$requete_sql = "INSERT INTO `Post` ( `title`, `photo_avatar`, `post_time`,`image_article`,`titreart`, `polike`, `comments`,`lien`, `post_text`) 
VALUES ( 
    '".$_POST['pseudo']."', 
   './images/" . $_POST['avatar'] . "',
   '".$_POST['post-date'] . "',
   './images/" . $_POST['post-img'] . "',
   '".$_POST['titre']."', 
   '".$_POST['nolikes']."', 
   '".$_POST['nocom']."',
   './projetblogA".$nbpost.".php',  
   '" . htmlentities( $_POST['post-text'])  . "');";


 /*  var_dump($requete_sql)  ;*/
$result1 = $mysqli2->query($requete_sql);
if ($mysqli2->query($requete_sql)) {
  printf("<p class='success'>Ajout du post effectué avec succès.</p><br />");
  $mysqli2->close();
}

?>
</span></div>
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
                <input type="file" name="avatar" accept=".png" required>
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
            <input type="file" class="post-img" name="post-img" accept=".jpg, .jpeg" required>
            </label>
        </fieldset>
        <fieldset>
        <legend>Date de l'article</legend>    
        <input type="datetime-local" name="post-date" placeholder="D/M/Y h:m:s" value="" min="1997-01-01" max="2030-12-31" class="dateArt" required>
        </fieldset>
        </div> 
        <div class="Reseau">
        <fieldset>
        <legend>Réseau social</legend>    
        <label class="label-like" for="nblikes">Nombre de Likes :</label>
        <input type="number" name="nolikes" placeholder="Nombre de likes" value="0" min="0" max="15000" id="likes">
        <p></p>
        <label class="label-com" for="nbcoms">Nombre de commentaires :</label>
        <input type="number" name="nocom" placeholder="Nombre de commentaires" value="0" min="0" max="15000" id="comment">
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