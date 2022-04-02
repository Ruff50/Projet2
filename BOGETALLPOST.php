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
<link rel="stylesheet" href="bostyle.css">
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
  //$requete_sql = "SELECT * FROM `Post` WHERE 1 ORDER BY post_time DESC;";
 // $result = $mysqli->query($requete_sql);

  //Stocker les données
 // while ($row = $result->fetch_assoc())
 // {
 //   $post [] = $row; 
    // autre façon d'écrire
 //$post [] = [                                  
 // 'photo_avatar' => $row['photo_avatar'],
 // 'title' => $row['title'],
 // 'post-time' => $row['post-time'],
 // 'lien' => $row['lien'],
 // 'titreart' => $row['titreart'],
 // 'image_article' => $row['image_article'],
 // 'post_text' => $row['post_text'],
 // 'polike' => $row['polike'],
 // 'comments' => $row['comments'],
// ];  
//}
function getAllPost($mysqli)
{
    // Selectionner des données
    $requete_sql = "SELECT * FROM Post WHERE 1 ORDER BY post_time DESC;";
    $result = $mysqli->query($requete_sql);

    //Stocker les données
    while ($row = $result->fetch_assoc()) {
        $tabPosts[] = [
            'title' => $row['title'],
            'photo_avatar' => $row['photo_avatar'],
            'post_time' => $row['post_time'],
            'titreart' =>$row['titreart'],
            'lien' =>$row['lien'],
            'image_article' => $row['image_article'],
            'post_text' => $row['post_text'],
            'polike' => $row['polike'],
            'comments' => $row['comments'],
            'cache' => $row['cache']
       ];
    }

    //liberer l'espace memo
    $result->free_result();
    return $tabPosts;
}

  /*function my_var_dump($array, $name = 'var') {*/
 /*   highlight_string("<?php\n\$$name =\n" . var_export($array, true) . ";\n?>");*/
 /* }*/
  //my_var_dump($row, 'row');
  //liberer l'space memoire
 /* $result->free_result();*/

  //Fermer l'accès a la BDD
 /* $mysqli->close();*/


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
      <a href="#">Connexion</a>
      <a href="./Back_Office/form_post.php">Ajouter un article</a>
      <a href="#">Désactiver un article</a>
    </nav>
   
  </header>

  <div class="container">

    <div class="sidebar">
      <div class="sidebar-item"><h1>Les Margouillats de <br> Saint-Pierre</h1></div>
      </div>
    <div class="main">
    <div class="Nbart"><h2>Liste des Articles</h2></div>
    <?php
$post = getAllPost($mysqli);
/*var_dump($post);*/

for ($i=0; $i<count( $post) ; $i++) {
    ?>
        
        <div class="post">
            
            <div class="cache">
            <?php
            if(is_null($post[$i]["cache"]) ) 
            {
              echo '<img src="'.  $post[$i]["image_article"].'" alt="post_img" class="post-img"> ';
            }  else 
            { 
                echo '<img src="'.  $post[$i]["cache"].'" alt="cache" class="cache_img"> ';
            }
           ?>     
                
          </div>

        
            <div class="info-avatar">
            <?php
            if( $post[$i]["photo_avatar"] == './images/') 
            {
                echo '<br>' ;
            }  else 
            { 
                echo '<img src="'.  $post[$i]["photo_avatar"].'" alt="pseudo" class="avatar"> ';
            }
           ?>   
               
           
                <div class="pseudo">
                <p class="title"><?php echo  $post[$i]["title"]?></p>
                    <p class="post-time">Article publié le <?php echo  $post[$i]["post_time"]?></p>
                </div>
                

            </div>
            <div class="TitreArt">
            <p class="titre"><?php echo  $post[$i]["titreart"]?></p>
            </div>
            
            <div class="social">
                <p class="like"><span class="icon-thumbs-up-alt"></span><?php echo ' '.  $post[$i]["polike"]?></p>
                <span></span>
                <p class="comment"><span class="icon-comment-alt"></span><?php echo ' '. $post[$i]["comments"]?></p>
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