<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="author" content="Xenia Ioannidou">
  <title>Game Homepage</title>
  <meta name="description" content="">
  <meta name="keywords" content="game, questions, score, levels, trivia">
  <!-- <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script> -->

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
  <div class="welcome">
    <div class="title">WELCOME TO QUESTIONS GAME</div>
    <form  class=''method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" >
      <?php
      $myfile = fopen("start.txt", "r");
      $c=fgetc($myfile);
      fclose($myfile);
      if($c<0|| $c==0 || $c=="")echo" <button name='start' class='sub title'>START </button>";?>
    </form>

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
    if($start==1){
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
      echo "<div class='frm start'><form  method='post' action='check.php' > ";
      echo"<div class='question_asked'>";
      echo "QUESTION: 1 out of 5";
      echo"</div>";
      echo "<div class='the_question'>";
      echo $xml->stage2[$rand]->question . "<br>";
      echo "</div>";
      echo "<div class='the_answer'>";
      echo "<input type='radio' name='answer' value='a' >";
      echo $xml->stage2[$rand]->a . "<br>";
      echo "</div>";
      echo "<div class='the_answer'>";
      echo "<input type='radio' name='answer' value='b' >";
      echo $xml->stage2[$rand]->b . "<br>";
      echo "</div>";
      echo "<div class='the_answer'>";
      echo "<input type='radio' name='answer' value='c'>";
      echo $xml->stage2[$rand]->c . "<br>";
      echo "</div>";
      echo "<div class='the_answer'>";
      echo "<input type='radio' name='answer' value='d' >";
      echo $xml->stage2[$rand]->d . "<br>";
      echo "</div>";
      echo "<button  class='the_button' name='toanswer'>NEXT</button>";
      echo "<button  class='the_button' name='finish'>FINISH</button>";
      echo"</form></div>";
      $q="(1)QUESTION: ";
      $myfile = fopen("result.txt", "a");
      // fwrite($myfile, "----WELCOME TO GAME!----" );
      // fwrite($myfile,PHP_EOL);
      // fwrite($myfile, "      --Game results--" );
      // fwrite($myfile,PHP_EOL);
      // fwrite($myfile,PHP_EOL);
      //fwrite($myfile, $q );
      fwrite($myfile, $xml->stage2[$rand]->question);
      fwrite($myfile,PHP_EOL);
      fclose($myfile);
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
        $rand=rand(1, 24);
        $que=$rand+1;
        $file = fopen("game.txt","r");
        $level= fgetc($file);
        $counter= fgetc($file);
        fclose($file);
        $count=$counter+1;
        $myfile = fopen("game.txt", "w");
        fwrite($myfile, $level);
        fwrite($myfile, $counter);
        fwrite($myfile, $rand);
        fwrite($myfile, "");
        fclose($myfile);
        if($level==1){
          $xml=simplexml_load_file("questions.xml") or die("Error: Cannot create object");
          echo "<div class='frm start'><form  method='post' action='check.php' > ";
          echo"<div class='question_asked'>";
          echo "QUESTION: ".$count." out of 5\n<br>";
          echo"</div>";
          echo "<div class='the_question'>";
          echo $xml->stage1[$rand]->question . "<br>";
          echo "</div>";
          echo "<div class='the_answer'>";
          echo "<input type='radio' name='answer' value='a' >";
          echo $xml->stage1[$rand]->a . "<br>";
          echo "</div>";
          echo "<div class='the_answer'>";
          echo "<input type='radio' name='answer' value='b' >";
          echo $xml->stage1[$rand]->b . "<br>";
          echo "</div>";
          echo "<div class='the_answer'>";
          echo "<input type='radio' name='answer' value='c'>";
          echo $xml->stage1[$rand]->c . "<br>";
          echo "</div>";
          echo "<div class='the_answer'>";
          echo "<input type='radio' name='answer' value='d' >";
          echo $xml->stage1[$rand]->d . "<br>";
          echo "</div>";
          echo "<button class='the_button' name='toanswer'>NEXT</button>";
          echo "<button class='the_button' name='finish'>FINISH</button>";
          echo"</form></div>";
          $q="(".$count.")QUESTION: ";
          $myfile = fopen("result.txt", "a");
          //fwrite($myfile, $q );
          fwrite($myfile, $xml->stage1[$rand]->question);
          fwrite($myfile,PHP_EOL);
          fclose($myfile);
        }

          if($level==2){
            $xml=simplexml_load_file("questions.xml") or die("Error: Cannot create object");
            echo "<div class='frm start'><form  method='post' action='check.php' > ";
            echo"<div class='question_asked'>";
            echo "QUESTION: ".$count." out of 5\n<br>";
            echo"</div>";
            echo "<div class='the_question'>";
            echo $xml->stage2[$rand]->question . "<br>";
            echo "</div>";
            echo "<div class='the_answer'>";
            echo "<input type='radio' name='answer' value='a' >";
            echo $xml->stage1[$rand]->a . "<br>";
            echo "</div>";
            echo "<div class='the_answer'>";
            echo "<input type='radio' name='answer' value='b' >";
            echo $xml->stage2[$rand]->b . "<br>";
            echo "</div>";
            echo "<div class='the_answer'>";
            echo "<input type='radio' name='answer' value='c'>";
            echo $xml->stage2[$rand]->c . "<br>";
            echo "</div>";
            echo "<div class='the_answer'>";
            echo "<input type='radio' name='answer' value='d' >";
            echo $xml->stage2[$rand]->d . "<br>";
            echo "</div>";
            echo "<button class='the_button' name='toanswer'>NEXT</button>";
            echo "<button class='the_button' name='finish'>FINISH</button>";
            echo"</form></div>";
            $q="(".$count.")QUESTION: ";
            $myfile = fopen("result.txt", "a");
            //fwrite($myfile, $q );
            fwrite($myfile, $xml->stage2[$rand]->question);
            fwrite($myfile,PHP_EOL);
            fclose($myfile);}

            if($level==3){
              $xml=simplexml_load_file("questions.xml") or die("Error: Cannot create object");
              echo "<div class='frm start'><form  method='post' action='check.php' > ";
              echo"<div class='question_asked'>";
              echo "QUESTION: ".$count." out of 5\n<br>";
              echo"</div>";
              echo "<div class='the_question'>";
              echo $xml->stage3[$rand]->question . "<br>";
              echo "</div>";
              echo "<div class='the_answer'>";
              echo "<input type='radio' name='answer' value='a' >";
              echo $xml->stage3[$rand]->a . "<br>";
              echo "</div>";
              echo "<div class='the_answer'>";
              echo "<input type='radio' name='answer' value='b' >";
              echo $xml->stage3[$rand]->b . "<br>";
              echo "</div>";
              echo "<div class='the_answer'>";
              echo "<input type='radio' name='answer' value='c'>";
              echo $xml->stage3[$rand]->c . "<br>";
              echo "</div>";
              echo "<div class='the_answer'>";
              echo "<input type='radio' name='answer' value='d' >";
              echo $xml->stage3[$rand]->d . "<br>";
              echo "</div>";
              echo "<button  class='the_button' name='toanswer'>NEXT</button>";
              echo "<button  class='the_button' name='finish'>FINISH</button>";
              echo"</form></div>";
              $q="(".$count.")QUESTION: ";
              $myfile = fopen("result.txt", "a");
              //fwrite($myfile, $q );
              fwrite($myfile, $xml->stage3[$rand]->question);
              fwrite($myfile,PHP_EOL);
              fclose($myfile);}
            }
            if($counter==5){
              $file = fopen("score.txt","r");
              $score= fgets($file);
              fclose($file);
              $myfile = fopen("result.txt", "a");
              fwrite($myfile, "TOTAL SCORE: " );
              fwrite($myfile, $score );
              fwrite($myfile,PHP_EOL);
              fwrite($myfile, "(Max score: 14) " );
              fwrite($myfile,PHP_EOL);
              fclose($myfile);
              ?>
              <div class="result">
              <?php
              $file=fopen("result.txt","r" );
              $num=1;
              while(!feof($file) && $num<6)
                {
                echo "<div><div class='in' style='margin-right:3px;'>".$num.".</div>";
                echo "<div class='question in'>".fgets($file). "<br></div></div>";
                echo "<div class='group'><div class='in result_title'>Your answer:</div>";
                echo "<div class='in'>".fgets($file). "<br></div></div>";
                echo "<div class='group'><div class='in result_title'>Correct answer:</div>";
                echo "<div class='in'>".fgets($file). "<br></div></div>";
                echo "<div class='group'><div class='in result_title'>Level:</div>";
                echo "<div class='in'>".fgets($file). "<br></div></div>";
                echo "<div class='group'><div class='in result_title'>Score of current question:</div>";
                echo "<div class='in'>".fgets($file). "<br></div></div>";
                echo "<div class='group' style='color:grey;'>".fgets($file). "<br></div>";
                echo "<div class=''>".fgets($file). "<br></div>";
                echo "<div class=''>".fgets($file). "<br></div>";
                echo "<div class=''>".fgets($file). "<br></div>";
                $num++;
                }
                echo "<div class=''>".PHP_EOL.fgets($file). "<br></div>";
                echo "<div class=''>".fgets($file). "<br></div>";
                fclose($file);
                ?>
              </div>
              <?php
              echo"
              <div class='start'>
              <form  method='post' action='scores.php' >
              <div >Do you want to save your score?</div>
              <input type='input' name='nickname' placeholder='Your nickname..'>
              <button name='save'>SAVE</button>
              <button name='no'>NO THANKS</button>
              </form>
              </div>";
              file_put_contents("result.txt", "");
              file_put_contents("game.txt", "");
              file_put_contents("start.txt", "");
            }
          }
          ?>





          <footer>
            <div>
  <h1 id="scroll">Title</h1>
</div>
            <div id="contact" class="footer_text">Copyright © Question Games</div>
            <a  class="footer_text"href="">Terms & Conditions</a>
          </footer>
        </body>
        <!-- <script src="js.js"></script> -->

        </html>
