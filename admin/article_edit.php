<?php session_start(); ?>
<?php include("../includes/dbconnect.php"); ?>
<?php 
    if(isset($_POST['add_new_article'])){
        header('location:article_add.php');
        exit;
    }

?>


<!DOCTYPE HTML>
<head>
    <meta http-equiv="content-type" content="text/html" />
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <html xmlns="http://www.w3.org/1999/xhtml" xml:lang="sk" lang="sk">
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <link rel='shortcut icon' href='images/w.png'>
    <link href="../css/style.css?<?php echo time() ?>" rel="stylesheet" type="text/css" />
    <title>Eshop</title>
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700' rel='stylesheet' type='text/css'>
    
<body>
	<header>
		<section class="logo"></section>
	</header>
	<div id="middle_column">
		<div id="left_bar">
            <?php include "../includes/left_menu.php" ?>
		</div>
		<div id="content">
            <div id="article_list">
                <table>
                    <tr><th colspan="4"><form action="" method="post"><button name="add_new_article" class="flat-btn">+ Novy clanok</form></th><tr>
                    <?php
                            $sql="SELECT * from articles";
                            $result=mysqli_query($link, $sql) or die("MySQL ERROR: ".mysqli_error($link));
                            while ($row = mysqli_fetch_array($result)) {
                                $art_id=$row['art_id'];
                                $art_title=$row['article_title'];
                                $art_text=$row['article_title'];
                                $created_date=$row['created_date'];
                                $created_by=$row['created_by'];

                            echo "<tr><td>$art_title</td><td>$created_date</td><td>$created_by</td><td><ul><li><button type='submit' name='view_article' class='flat-btn'>View</button></li><li><button type='submit' name='edit_article' class='flat-btn'>Edit</button></li><li><button type='submit' name='archive_article' class='flat-btn'>archive</button></li></ul></td></tr>";    
                                
                            }    
                    ?>
                </table>
            </div><!--article list -->    
        </div>
                
	</div>
	<footer></footer>