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
<link rel="stylesheet" href="style.css">
  <title>MyBlogLite</title>
</head>
<body>
  <?php 

  // Définit le fuseau horaire par défaut à utiliser.
  date_default_timezone_set('Indian/Reunion');
  $post1= [
      'photo_avatar' => './images/avatar.png',
      'title'        => 'Harry',
      'post-time'    => 'Il y a 15 minutes',
      'image-article'=> './images/panning-devoir.jpg',
      'post-text'    => 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Laudantium veritatis, provident officia accusantium earum aspernatur nobis beatae voluptatem veniam odio. Qui magni minus architecto libero eum ad cumque tempora quasi.',
      'polike'         => ' 120 likes',
      'comment'      => ' 14 Commentaires',
  ];
  $post2= [
      'photo_avatar' => './images/avatar.png',
      'title'        => 'Christophe',
      'post-time'    =>  date("Y-m-d H:i:s"),
      'image-article'=> '',
      'post-text'    => 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Laudantium veritatis, provident officia accusantium earum aspernatur nobis beatae voluptatem veniam odio. Qui magni minus architecto libero eum ad cumque tempora quasi.',
      'polike'         => ' 145 likes',
      'comment'      => ' 67 Commentaires',
  ];
  
  $post []=$post1;
  $post []=$post2;
  //var_dump($post);
  
  ?>


  <header class="topbar">
    <div class="margou">
      <div class="image">
     <img alt="Survol" width="120px" onmouseout="this.src='Images/margouilla.png'; " onmouseover="this.src='Images/Margouillat2.png'; " src="Images/margouilla.png"/> 
    </div> 
  </div>    
      <nav class="topbar-nav">
      <a href="#">Connexion</a>
      <a href="#">Ajouter un article</a>
      <a href="#">Désactiver un article</a>
    </nav>
   
  </header>

  <div class="container">

    <div class="sidebar">
      <div class="sidebar-item"><h1>Les Margouillats de <br> Saint-Pierre</h1></div>
      </div>
    <div class="main">
    <?php


for ($i=0; $i<count($post) ; $i++) {
    ?>
        
        <div class="post">
            <div class="info-avatar">
                <img src=<?php echo $post[$i]["photo_avatar"]?> alt="pseudo" class="avatar">
                <div class="pseudo">
                    <p class="title"><?php echo $post[$i]["title"]?></p>
                    <p class="post-time"><?php echo $post[$i]["post-time"]?></p>
                </div>
            </div>
            <?php  
            if($post[$i]["image-article"] == '') 
            {
                echo '<br>' ;
            }  else 
            { 
                echo '<img src="'. $post[$i]["image-article"].'" alt="post_img" class="post-img"> ';
            }
           ?>

            <p class="post-text"><?php echo $post[$i]["post-text"]?></p>
            <div class="social">
                <p class="like"><span class="icon-thumbs-up-alt"></span><?php echo $post[$i]["polike"]?></p>
                <p class="comment"><span class="icon-comment-alt"></span><?php echo $post[$i]["comment"]?></p>
            </div>
        </div>
        <?php  
    }
?>

        
    </div>

        

    

    </div>
  </div>
  
</body>
</html>