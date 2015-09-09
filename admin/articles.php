<?php session_start(); ?>
<?php include("../includes/dbconnect.php");
    if(isset($_POST['add_article'])){
        header('location:article.php');
    }
 ?>


<!DOCTYPE HTML>
<head>
    <meta http-equiv="content-type" content="text/html" />
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <html xmlns="http://www.w3.org/1999/xhtml" xml:lang="sk" lang="sk">
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <link rel='shortcut icon' href='images/w.png'>
    <link href="../css/style.css" rel="stylesheet" type="text/css" />
     <title>Eshop - admin</title>
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700' rel='stylesheet' type='text/css'>
    
<body>
	<header>
		<section class="logo"></section></section>
	</header>
	<div id="middle_column">
        <div id="left_bar">
            <?php include "left_menu.php" ?>
        </div>
        <div id="content">
            <div class="add_session"><form action="articles.php" method="post"><button name="add_article" class="flat-btn">Add article</button></form></div>

            <?php 
                echo "<table class='item_list'>";
                $sql="SELECT * from articles";
                $result=mysql_query($sql) or die("MySQL ERROR: ".mysql_error());
                                while ($row = mysql_fetch_array($result)) {
                                        $article_id=$row['article_id'];
                                        $article_name=$row['article_name'];
                                        $article_text=$row['article_text'];
                                        $article_source=$row['article_source'];
                                        $article_created_at=$row['article_created_at'];                 
                  echo "<tr><td><a href='article.php?id=$article_id>$article_name</a></td></tr>";

                                }
                            
                echo "</table>";                    
            ?>
        </div>
        
    </div>
</body>    