<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="author" content="Xenia Ioannidou">
  <title>High Scores</title>
  <meta name="description" content="">
  <meta name="keywords" content="game, questions, score, levels, trivia">
  <!-- <link rel="shortcut icon" href="favicon6.ico" type="image/x-icon">
  <link rel="icon" href="favicon6.ico" type="image/x-icon"> -->

  <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <div class="menu">
    <a  href="index.php" class="option_menu">PLAY</a>
    <a  href="help.php" class="option_menu">HELP</a>
    <a  href="highscores.php"class="option_menu">SCORES</a>
  </div>

<div class='welcome box'>
  <div class='hs'>HIGH SCORES</div>

<?php
$file=fopen("bestscores.txt","r");
$counter=0;
while(!feof($file)){
$counter++;
echo "<div class=''><div class='in nickname'>".$counter.". ".fgets($file)." :</div>";
echo "<div class='in'>".fgets($file)."</div></div>";
}
?>
</div>


  <footer>
    <div class="footer_text">Copyright © Question Games</div>
    <a  class="footer_text"href="">Terms & Conditions</a>
  </footer>
</body>
</html>
