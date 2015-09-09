<?php session_start(); ?>
<?php include("include/dbconnect.php");
    if(isset($_POST['registruj'])){
        $sql="";
    }
 ?>


<!DOCTYPE HTML>
<head>
    <meta http-equiv="content-type" content="text/html" />
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <html xmlns="http://www.w3.org/1999/xhtml" xml:lang="sk" lang="sk">
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <link rel="shortcut icon" href="images/w.png">
    <link href="css/style.css" rel="stylesheet" type="text/css" />
    <title>Eshop</title>
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,700" rel="stylesheet" type="text/css">
    <link rel="shortcut icon" href="shopping_cart.ico">
    
<body>
    <<header>
       <section class="logo"><a href="index.php">eshop</a></section><section class="basket"><a href="basket.php?session_id=<?php echo session_id(); ?>">Kosik</a></section>
    </header>
    <div id="middle_column">
        <div id="left_bar">
           
        </div>
        <div id="content">
            <form action="register.php" action="post">
                <table class="register_form">
                    <tr><td class="table_label">Meno:</td><td><input name="first_name" value="" type="text"></td></tr>
                    <tr><td class="table_label">Priezvisko:</td><td><input name="last_name" value="" type="text"></td></tr> 
                    <tr><td class="table_label">Fakturacna adresa:</td><td><input name="address" value="" type="text"></td></tr>
                    <tr><td class="table_label">Mesto:</td><td><input type="text" name="city" value=""></td></tr>
                    <tr><td class="table_label">Krajina:</td><td><input type="text" name="country" value=""></td></tr>
                    <tr><td class="table_label">Psc:</td><td><input type="text" name="psc" value=""></td></tr>
                    <tr><td class="table_label">Email:</td><td><input type="text" name="email" value=""></td></tr>
                    <tr><td class="table_label">Telefon:</td><td><input type="text" name="telefon" value=""></td></tr>
                    <tr><td class="table_label">Poznamka:</td><td><textarea name="product_description"></textarea></td></tr>
               </table>
               <button type="submit" name="registruj" class="flat-btn">Registruj</button>
           </form>
        </div>
        
    </div>
    <footer></footer>
</body>    