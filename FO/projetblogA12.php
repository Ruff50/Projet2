<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
<link href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css" rel="stylesheet">
<link rel="stylesheet" href="style1.css">
  <title>MyBlogLite</title>
</head>
<body>
  <?php 
  $mysqli = new mysqli("localhost", "root", "", "BLOG");


  if ($mysqli->connect_errno) {
      echo "Problème de connexion à la base de données !";
      exit();
  }

  // Selectionner des données
  $requete_sql = "SELECT * FROM `Post` WHERE 1 ORDER BY post_time ASC;";
  $result = $mysqli->query($requete_sql);

  //Stocker les données
  while ($row = $result->fetch_assoc())
  {
    $post [] = $row; 
  }

  function my_var_dump($array, $name = 'var') {
    highlight_string("<?php\n\$$name =\n" . var_export($array, true) . ";\n?>");
  }
  //my_var_dump($row, 'row');
  //liberer l'space memoire
  $result->free_result();

  //Fermer l'accès a la BDD
  $mysqli->close();


  // Définit le fuseau horaire par défaut à utiliser.
  date_default_timezone_set('Indian/Reunion');
//  $post1= [
//      'photo_avatar' => './images/avatar.png',
//      'title'        => 'Harry',
//      'post_time'    => 'Il y a 15 minutes',
//      'image_article'=> './images/panning-devoir.jpg',
//      'post_text'    => 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Laudantium veritatis, provident officia accusantium earum aspernatur nobis beatae voluptatem veniam odio. Qui magni minus architecto libero eum ad cumque tempora quasi.',
//      'polike'         => ' 120 likes',
//      'comments'      => ' 14 Commentaires',
//  ];
//  $post2= [
//      'photo_avatar' => './images/avatar.png',
//      'title'        => 'Christophe',
//      'post_time'    =>  date("Y-m-d H:i:s"),
//      'image_article'=> '',
//      'post_text'    => 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Laudantium veritatis, provident officia accusantium earum aspernatur nobis beatae voluptatem veniam odio. Qui magni minus architecto libero eum ad cumque tempora quasi.',
//      'polike'         => ' 145 likes',
//      'comments'      => ' 67 Commentaires',
//  ];
  
//  $post []=$post1;
//  $post []=$post2;
  //var_dump($post);
  
  ?>

  
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

  <div class="container">

    
    <div class="main">
    <?php


//for ($i=0; $i<count( $post) ; $i++) {
    ?>
        
        <div class="post">
            <div class="info-avatar">
                <img src=<?php echo  $post[12]["photo_avatar"]?> alt="pseudo" class="avatar">
                <div class="pseudo">
                <p class="title"><?php echo  $post[12]["title"]?></p>
                    <p class="post-time"><?php echo  $post[12]["post_time"]?></p>
                </div>
            </div>
            <div class="TitreArt">
            <p class="titre"><?php echo  $post[12]["titreart"]?></a></p>
            </div>
            <?php  
            if( $post[12]["image_article"] == '') 
            {
                echo '<br>' ;
            }  else 
            { 
                echo '<img src="'.  $post[12]["image_article"].'" alt="post_img" class="post-img"> ';
            }
           ?>

            <p class="post-text"><?php echo  $post[12]["post_text"]?></p>
            <div class="social">
                <p class="like"><span class="icon-thumbs-up-alt"></span><?php echo ' '.  $post[12]["polike"]?></p>
                <p class="comment"><span class="icon-comment-alt"></span><?php echo ' '. $post[12]["comments"]?></p>
            </div>
        </div>
        
    </div>

        

    

    </div>
  </div>
  
</body>
</html>