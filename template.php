<?php session_start(); ?>
<?php include("include/dbconnect.php"); ?>


<!DOCTYPE HTML>
<head>
    <meta http-equiv="content-type" content="text/html" />
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <html xmlns="http://www.w3.org/1999/xhtml" xml:lang="sk" lang="sk">
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <link rel='shortcut icon' href='images/w.png'>
    <link href="css/style.css" rel="stylesheet" type="text/css" />
    <title>Eshop</title>
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700' rel='stylesheet' type='text/css'>
    <link rel='shortcut icon' href='shopping_cart.ico'>
    
<body>
    <header>
       <section class="logo"><a href="index.php">eshop</a></section><section class="basket"><a href="basket.php?session_id=<?php echo session_id(); ?>">Kosik</a></section>
    </header>
    <div id="middle_column">
        <div id="left_bar">
           
        </div>
        <div id="content">
            
        </div>
        
    </div>
    <footer></footer>
</body>    