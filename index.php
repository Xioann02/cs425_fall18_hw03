<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="author" content="Xenia Ioannidou">
<title>Game Homepage</title>
<meta name="description" content="">
<meta name="keywords" content="game, questions, score, levels, trivia">
<link rel="shortcut icon" href="favicon6.ico" type="image/x-icon">
<link rel="icon" href="favicon6.ico" type="image/x-icon">
<link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
<link rel="stylesheet" href="style.css">
</head>
<body>
<div class="menu">
  <a  href="index.php" class="option_menu">PLAY</a>
  <a  href="help.php" class="option_menu">HELP</a>
  <a  href="scores.php"class="option_menu">SCORES</a>
</div>
<div class="welcome">
  <div class="title">WELCOME TO QUESTIONS GAME</div>
  <form  method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" >
  <button name="start" class="sub title">START</button></form>
  <img class="welcome-image" src="">
</div>

<?php
if(isset($_POST['start'])){

$right=0;
$counter=0;
$prev=0;
$rand=rand(1, 25);
$level=1;
$que=$rand+1;
$xml=simplexml_load_file("questions.xml") or die("Error: Cannot create object");
echo $que.".";
echo $xml->stage1[$rand]->question . "<br>";
echo $xml->stage1[$rand]->a . "<br>";
echo $xml->stage1[$rand]->b . "<br>";
echo $xml->stage1[$rand]->c . "<br>";
echo $xml->stage1[$rand]->d . "<br>";

}


?>

<footer>
<div class="footer_text">Copyright © Question Games</div>
<a  class="footer_text"href="">Terms & Conditions</a>
</footer>

</body>
</html>
