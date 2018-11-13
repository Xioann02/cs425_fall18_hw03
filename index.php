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
      <!-- <img class="welcome-image" src=""> -->
    </div>

    <?php
    if(isset($_POST['start'])){
      $myfile = fopen("start.txt", "w");
      fwrite($myfile, 1);
      fclose($myfile);
    }

      $file = fopen("start.txt","r");
      $start=fgetc($file);
      fclose($file);

      // echo"\nLEVEL: ".$level;
      // echo"\nCOUNTER: ".$counter;
      // echo"\nRAND: ".$rand;
  if($start==1){
echo "QUESTION: 1\n/5";

    $file = fopen("score.txt", "w");
    fwrite($file, 0);
    fclose($file);

    $rand=rand(1, 25);
    $que=$rand+1;
    $myfile = fopen("game.txt", "w");
    fwrite($myfile, 2);
    fwrite($myfile, 0);
    fwrite($myfile, $rand);
    fclose($myfile);
    $myfile = fopen("start.txt", "w");
    fwrite($myfile, 2);
    fclose($myfile);

    $xml=simplexml_load_file("questions.xml") or die("Error: Cannot create object");
    echo "<form  method='post' action='check.php' > ";
    echo $que.".";
    echo $xml->stage2[$rand]->question . "<br>";
    echo "<input type='radio' name='answer' value='a' >";
    echo $xml->stage2[$rand]->a . "<br>";
    echo "<input type='radio' name='answer' value='b' >";
    echo $xml->stage2[$rand]->b . "<br>";
    echo "<input type='radio' name='answer' value='c'>";
    echo $xml->stage2[$rand]->c . "<br>";
    echo "<input type='radio' name='answer' value='d' >";
    echo $xml->stage2[$rand]->d . "<br>";
    echo "<button name='toanswer'>NEXT</button>";
    echo"</form>";
  }



      if($start==2){
        $file = fopen("game.txt","r");
        $level= fgetc($file);
        $counter= fgetc($file);
        $rand= fgetc($file);
        $rand2=fgetc($file);
        fclose($file);

        if($rand2!=""){
          $rand=($rand*10)+$rand2;
        }
      if($counter<5){
        $rand=rand(1, 25);
        $que=$rand+1;
        $file = fopen("game.txt","r");
        $level= fgetc($file);
        $counter= fgetc($file);
        fclose($file);
        $myfile = fopen("game.txt", "w");
        fwrite($myfile, $level);
        fwrite($myfile, $counter);
        fwrite($myfile, $rand);
        fwrite($myfile, "");

        fclose($myfile);
echo "\nLEVEL: ".$level;
        if($level==1){
          $xml=simplexml_load_file("questions.xml") or die("Error: Cannot create object");
          echo "<form  method='post' action='check.php' > ";
          echo $que.".";
          echo $xml->stage1[$rand]->question . "<br>";
          echo "<input type='radio' name='answer' value='a' >";
          echo $xml->stage1[$rand]->a . "<br>";
          echo "<input type='radio' name='answer' value='b' >";
          echo $xml->stage1[$rand]->b . "<br>";
          echo "<input type='radio' name='answer' value='c'>";
          echo $xml->stage1[$rand]->c . "<br>";
          echo "<input type='radio' name='answer' value='d' >";
          echo $xml->stage1[$rand]->d . "<br>";
          echo "<button name='toanswer'>NEXT</button>";
          echo"</form>";}

          if($level==2){
            $xml=simplexml_load_file("questions.xml") or die("Error: Cannot create object");
            echo "<form  method='post' action='check.php' > ";
            echo $que.".";
            echo $xml->stage2[$rand]->question . "<br>";
            echo "<input type='radio' name='answer' value='a' >";
            echo $xml->stage2[$rand]->a . "<br>";
            echo "<input type='radio' name='answer' value='b' >";
            echo $xml->stage2[$rand]->b . "<br>";
            echo "<input type='radio' name='answer' value='c'>";
            echo $xml->stage2[$rand]->c . "<br>";
            echo "<input type='radio' name='answer' value='d' >";
            echo $xml->stage2[$rand]->d . "<br>";
            echo "<button name='toanswer'>NEXT</button>";
            echo"</form>";}



          if($level==3){
            $xml=simplexml_load_file("questions.xml") or die("Error: Cannot create object");
            echo "<form  method='post' action='check.php' > ";
            echo $que.".";
            echo $xml->stage3[$rand]->question . "<br>";
            echo "<input type='radio' name='answer' value='a' >";
            echo $xml->stage3[$rand]->a . "<br>";
            echo "<input type='radio' name='answer' value='b' >";
            echo $xml->stage3[$rand]->b . "<br>";
            echo "<input type='radio' name='answer' value='c'>";
            echo $xml->stage3[$rand]->c . "<br>";
            echo "<input type='radio' name='answer' value='d' >";
            echo $xml->stage3[$rand]->d . "<br>";
            echo "<button name='toanswer'>NEXT</button>";
            echo"</form>";}

}
if($counter==5){
  file_put_contents("game.txt", "");
  file_put_contents("score.txt", "");
  file_put_contents("start.txt", "");
}
}

        ?>

        <footer>
          <div class="footer_text">Copyright © Question Games</div>
          <a  class="footer_text"href="">Terms & Conditions</a>
        </footer>

      </body>
      </html>
