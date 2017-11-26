<?php session_start(); ?>
<?php include("../includes/dbconnect.php"); ?>
<?php 
    if(isset($_POST['new_article'])){
        $article_title=$_POST['article_title'];
        if($article_title=="") {
            echo "<script>alert('Chyba titulok!');
            href.loacation='article_add.php'; 
            </script>";    
        } else {
        $article_title=mysqli_real_escape_string($link, $_POST['article_title']);
        $article_text=mysqli_real_escape_string($link, $_POST['article_text']);
        $curr_date=date('Y-m-d H:i:s');
        //$curr_author=$_SESSION['id'];
        $curr_author=1;
        $sql="INSERT INTO articles (article_title, article_text, created_date, created_by) VALUES ('$article_title', '$article_text','$curr_date', $curr_author)";
        //echo $sql;
        $result=mysqli_query($link, $sql) or die("MySQL ERROR: ".mysqli_error($link));
        echo "<script>alert('Novy clanok vytvoreny!');
        href.loacation='articles.php'; 
        </script>";
        exit;
        } 
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
    <script src="../js/tinymce/tinymce.min.js"></script>
    <script>tinymce.init({ selector:'textarea' });</script>
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
                <form action="" method="post">
                    <table>
                        <tr>
                            <td>Nazov clanku:</td><td><input type="text" name="article_title"></td>
                        </tr>   
                        <tr>
                            <td>Text</td><td><textarea name="article_text"></textarea></td>
                        </tr>    
                        <tr>
                            <td colspan="2"><button type="submit" class="flat-btn" name="new_article">+ Novy clanok</button></td>
                        </tr> 
                    </table>
                </form>
            </div><!--article list -->    
        </div><!--content -->
                
	</div><!--middle column -->
	<footer>

    </footer>