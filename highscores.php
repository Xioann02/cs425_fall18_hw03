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
  <a name="top"></a>

<div class='welcome box'>
  <div class='hs'>HIGH SCORES</div>

<?php
$file=fopen("bestscores.txt","r");
$counter=0;
while(!feof($file) && $counter<10){
$counter++;
if($counter%2!=0){
echo "<div class='' style='width: 90%; margin-left: 5%;background-color:grey;'><div class='in nickname'>".$counter.". ".fgets($file)." :</div>";
echo "<div class='in'>".fgets($file)."</div></div>";
}
else{
  echo "<div class='' style='width: 90%; margin-left: 5%;background-color:#aaaaaa;' ><div class='in nickname'>".$counter.". ".fgets($file)." :</div>";
  echo "<div class='in'>".fgets($file)."</div></div>";
}
}
?>
</div>

<a href="#top" class=''><i class="top"></i></a>


          <footer>

            <div id="contact" class="footer_text">Copyright © Question Games</div>
            <a  class="footer_text"href="">Terms & Conditions</a>
            <div class="footer_text" style="padding-right:1%;">Tel.: +357 123456</div>

          </footer>
</body>
</html>
