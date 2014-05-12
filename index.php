<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="http://code.jquery.com/mobile/1.4.2/jquery.mobile-1.4.2.min.css">
<script src="http://code.jquery.com/jquery-1.10.2.min.js"></script>
<script src="http://code.jquery.com/mobile/1.4.2/jquery.mobile-1.4.2.min.js"></script>
</head>
<body>
<?php
include'connection.php';
include'randomCode.php';
include'codeCheck.php';

	if($_GET["a"] === "clear"){ session_destroy('code'); }
	//echo randomCode();

	//Form afhandeling
	if(isset($_POST['submit'])) {

  	  $code = $_POST['code'];
	  
	  if(!$_POST['code']) {
			$error['code'] = "<p>Vul een waardige code in!</p>\n";
	  }else{
		  $codeCheck = codecheck($code);
	  	if( $codeCheck[0] === true){
			$error['code'] = "<p>Yes, sticker gevonden!</p>\n";
			$_SESSION['code'] = $code;
		}else{
			$error['code'] = "<p>Helaas, er is geen sticker gevonden!</p>\n";
		}
	  }
	}

if(isset($_SESSION['code']) && isset($_POST['submit'])) {
?>
<div data-role="page" id="pagetwo">
  <div data-role="header">
    <h1>Welcome To My Homepage</h1>
  </div>
    
    <div data-role="main" class="ui-content">
            <section id="sticker">
                <header>
                    <img src="img/<? echo $codeCheck[2]["Plaat"] ?>" alt="<? echo $codeCheck[2]["Plaat"] ?>"/>
                   <h1><? echo $codeCheck[2]["Locatie"] ?></h1>
                   <h2>Geplakt door: <? echo $codeCheck[2]["Gebruiker"] ?> op <? echo $codeCheck[2]["Datum"] ?></h2>
               </header>
               <a href="#pageone">Go to Page One</a>
            </section>
    </div>
    
    <div data-role="footer">
    	<h1>Footer Text</h1>
    </div>
</div>     
<?

}else{
?>
<div data-role="page" id="pageone">
  <div data-role="header">
    <h1>Welcome To My Homepage</h1>
  </div>
  
        <div data-role="main" class="ui-content">
            <form method="post" action="<?=$_SERVER['PHP_SELF']?>">
              <? if(isset($error['code'])){ echo($error['code']); } ?>
              <input type="text" id="code" name="code" value="<? if(isset($_POST['code'])){ echo($_POST['code']); } ?>" /></p>
              <p><input type="submit" name="submit" value="Zoeken" /></p>
            </form>
        </div>
    
  <div data-role="footer">
    <h1>Footer Text</h1>
  </div>
</div> 
<?php 
}
?>

</body>
</html>