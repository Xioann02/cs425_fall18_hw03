<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="author" content="Xenia Ioannidou">
  <title>Game Homepage</title>
  <meta name="description" content="An online game of general miltiple choice questions.">
  <meta name="keywords" content="game, questions, score, levels, trivia, multiple, choice">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="shortcut icon" href="favicon1.ico" type="image/x-icon">
  <link rel="icon" href="favicon1.ico" type="image/x-icon">
  <link href="https://fonts.googleapis.com/css?family=Pacifico" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <div class="menu">
    <form class='in'method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" >
      <button style='background-color:transparent; border:none;letter-spacing: 7px;font-size:13px;' class="option_menu " name='playagain'  >PLAY</button>
    </form>
    <a  href="help.php" class="option_menu in">HELP</a>
    <a  href="highscores.php"class="option_menu in">SCORES</a>
  </div>
  <a name="top"></a>

  <div class="welcome">

    <div class="title">THE QUESTIONS GAME</div>

    <form  class=''method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" >
      <?php
      $myfile = fopen("start.txt", "r");
      $c=fgetc($myfile);
      fclose($myfile);
      if($c<0|| $c==0 || $c=="")echo" <button name='start' class='sub title'>START A GAME </button>";?>
    </form>
    <!-- <img class="welcome-image" src="abstract-art-background-1037995.jpg"/> -->
  </div>
  <?php
  if(isset($_POST['playagain'])){
    file_put_contents("result.txt", "");
    file_put_contents("game.txt", "");
    file_put_contents("start.txt", "");
    file_put_contents("score.txt", "");
  }
  ?>
  <?php
  $rand11=0;
  $rand22=0;
  $rand33=0;
  $file = fopen("start.txt","r");
  $start=fgetc($file);
  fclose($file);
  $rand=rand(0, 24);
  $que=$rand+1;
  ?>
  <?php
  if(isset($_POST['start'])){
    $myfile = fopen("start.txt", "w");
    fwrite($myfile, 2);
    fclose($myfile);
    $myfile = fopen("game.txt", "w");
    fwrite($myfile, 2);
    fwrite($myfile, 0);
    fwrite($myfile, $rand);
    fclose($myfile);
    $myfile = fopen("start.txt", "w");
    fwrite($myfile, 2);
    fclose($myfile);
    $file=fopen("rand2.txt","a");
    fwrite($file," ");
    fwrite($file,$rand);
    fclose($file);
    $xml=simplexml_load_file("questions.xml") or die("Error: Cannot create object");
    echo "<div class='frm start'><form  method='post' action='check.php' > ";
    echo "<input type='hidden'  name='rand'  value='".$rand."'/>";
    echo "<input type='hidden'  name='round' value='2'/>";
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
      $rand=rand(0, 24);
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
        $file=fopen("rand1.txt","r");
        $getr=fgets($file);
        fclose($file);

        $prevq=array();
        $prevq = explode(" ", $getr);

        while(in_array($rand, $prevq)){
          $rand=rand(0, 24);
          $que=$rand+1;
        }
        $file=fopen("rand1.txt","a");
        fwrite($file," ");
        fwrite($file,$rand);
        fclose($file);

        $xml=simplexml_load_file("questions.xml") or die("Error: Cannot create object");
        echo "<div class='frm start'><form  method='post' action='check.php' > ";
        echo "<input type='hidden'  name='rand'  value='".$rand."'/>";
        echo "<input type='hidden'  name='round' value='1'/>";
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
        if($count!=5){echo "<button class='the_button' name='toanswer'>NEXT</button>";
          echo "<button  class='the_button' name='finish'>FINISH</button>";}
          else echo "<button class='the_button' name='toanswer'>FINISH</button>";
          echo"</form></div>";
        }

        if($level==2){
          $file=fopen("rand2.txt","r");
          $getr=fgets($file);
          fclose($file);
          $prevq=array();
          $prevq = explode(" ", $getr);

          while(in_array($rand, $prevq)){
            $rand=rand(0, 24);
            $que=$rand+1;
          }
          $file=fopen("rand2.txt","a");
          fwrite($file," ");
          fwrite($file,$rand);
          fclose($file);
          $xml=simplexml_load_file("questions.xml") or die("Error: Cannot create object");
          echo "<div class='frm start'><form  method='post' action='check.php' > ";
          echo "<input type='hidden'  name='rand' value='".$rand."'/>";
          echo "<input type='hidden' name='round' value='2'/>";
          echo"<div class='question_asked'>";
          echo "QUESTION: ".$count." out of 5\n<br>";
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
          if($count!=5){echo "<button class='the_button' name='toanswer'>NEXT</button>";
            echo "<button  class='the_button' name='finish'>FINISH</button>";}
            else echo "<button class='the_button' name='toanswer'>FINISH</button>";

            echo"</form></div>";
          }

          if($level==3){
            $file=fopen("rand3.txt","r");
            $getr=fgets($file);
            fclose($file);
            $prevq=array();
            $prevq = explode(" ", $getr);
            while(in_array($rand, $prevq)){
              $rand=rand(0, 24);
              $que=$rand+1;
            }
            $file=fopen("rand3.txt","a");
            fwrite($file," ");
            fwrite($file,$rand);
            fclose($file);

            $xml=simplexml_load_file("questions.xml") or die("Error: Cannot create object");
            echo "<div class='frm start'><form  method='post' action='check.php' > ";
            echo "<input type='hidden' name='rand' value='".$rand."'/>";
            echo "<input type='hidden'  name='round' value='3'/>";
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
            if($count!=5){echo "<button class='the_button' name='toanswer'>NEXT</button>";
              echo "<button  class='the_button' name='finish'>FINISH</button>";}
              else echo "<button class='the_button' name='toanswer'>FINISH</button>";
              echo"</form></div>";
            }
          }
          if($counter==5){
            $file = fopen("score.txt","r");
            $score= fgets($file);
            fclose($file);
            if($score==""){$score=0;}
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
              echo "<div class='your_res'>YOUR RESULTS</div>";
              while(!feof($file) && $num<6)
              {
                echo "<div>";
                echo "<div  style=''class='question in'>".$num.".".fgets($file). "<br></div></div>";
                echo "<div class='group'><div class='in result_title'>Your answer:</div>";
                echo "<div class='in'>".fgets($file). "<br></div></div>";
                echo "<div class='group'><div class='in result_title'>Correct answer:</div>";
                echo "<div class='in'>".fgets($file). "<br></div></div>";
                echo "<div class='group'><div class='in result_title'>Level:</div>";
                echo "<div class='in'>".fgets($file). "<br></div></div>";
                echo "<div class='group'><div class='in result_title'>Score of current question:</div>";
                echo "<div class='in'>".fgets($file). "<br></div></div>";
                echo "<div class='group' style='color:grey;'>".fgets($file). "<br></div>";
                echo "<div class='total'>".fgets($file). "<br></div>";
                echo "<div class=''>".fgets($file). "<br></div>";
                echo "<div class=''>".fgets($file). "<br></div>";
                $num++;
              }
              echo "<div class='total'>".PHP_EOL.fgets($file). "<br></div>";
              echo "<div class=''>".fgets($file). "<br></div>";
              fclose($file);
              ?>
            </div>
            <?php
            echo"
            <div class='savescore'>
            <form  method='post' action='scores.php' >
            <div >Do you want to save your score?</div>
            <input type='input' class='nickname_input' name='nickname' placeholder='Your nickname..'>
            <button class='save_button'name='save'>SAVE</button>
            <button class='save_button' name='no'>NO THANKS</button>
            </form>
            </div>";
            file_put_contents("result.txt", "");
            file_put_contents("game.txt", "");
            file_put_contents("start.txt", "");
            file_put_contents("rand1.txt", "");
            file_put_contents("rand2.txt", "");
            file_put_contents("rand3.txt", "");


          }
        }
        ?>
        <a href="#top" class=''><i class="top"></i></a>
        <footer style='margin-top: 230px;'>
          <div>
            <div id="contact" class="footer_text in">Copyright © Question Games</div>
            <a  class="footer_text in"href="">Terms & Conditions</a>
            <div class="footer_text in" style="padding-right:1%;">Tel.: +357 123456</div>
          </div>
        </footer>
      </body>
      </html>
