<?php
$level1=array("a", "d", "d", "b","a","a","b","a","b","d","a","c","a","d","c","b","b","a","b","d","d","c","b","c","d");
$level2=array("a", "d", "c", "b","a","d","b","a","b","d","c","a","b","a","d","c","a","d","a","d","c","a","a","d","c");
$level3=array("c", "c", "a", "c","b","c","c","b","a","c","d","b","a","a","b","a","b","b","b","c","b","c","a","c","a");

$s=0;
$c="  -Your anser was right!";

$file = fopen("score.txt","r");
$score=fgetc($file);
fclose($file);
$file = fopen("game.txt","r");
$level= fgetc($file);
$counter= fgetc($file);
$rand= fgetc($file);
$rand2=fgetc($file);
$l=$level;
if($rand2!=""){
  $rand=($rand*10)+$rand2;
}
if(isset($_POST['toanswer'])){
  $answer = $_POST['answer'];
if($level==1){
  $r=$level1[$rand];
  if($level1[$rand]==$answer){
  $score=$score+1;
  $s=1;
  $level=2;}
  else $c="  -Your anser was wrong!";

}
else if($level==2){
  $r=$level2[$rand];
  if($level2[$rand]==$answer){
  $score=$score+2;
  $s=2;
  $level=3;}
  else{ $c="  -Your anser was wrong!"; $level=1;}
}
else if($level==3){
  $r=$level3[$rand];
  if($level3[$rand]==$answer){
  $score=$score+3;
  $s=3;
    $level=3;}
    else{ $c="  -Your anser was wrong!"; $level=2;}
}

$a="YOUR ANSWER: ";
$re="CORRECT ANSWER: ";
$line="_________________________________________";
$myfile = fopen("result.txt", "a");
fwrite($myfile, $a );
fwrite($myfile, $answer );
fwrite($myfile,PHP_EOL);
fwrite($myfile, $re );
fwrite($myfile, $r );
fwrite($myfile,PHP_EOL);
fwrite($myfile,"LEVEL: ");
fwrite($myfile,$l);
fwrite($myfile,PHP_EOL);
fwrite($myfile,"SCORE OF CURRENT LEVEL: ");
fwrite($myfile,$s);
fwrite($myfile,$c);
fwrite($myfile,PHP_EOL);
fwrite($myfile, $line);
fwrite($myfile,PHP_EOL);
fwrite($myfile,PHP_EOL);
fwrite($myfile,PHP_EOL);
fclose($myfile);
$counter++;
}
$myfile = fopen("game.txt", "w");
fwrite($myfile, $level);
fwrite($myfile, $counter);
fwrite($myfile, $rand);
fclose($myfile);
$file = fopen("score.txt", "w");
fwrite($file, $score);
fclose($file);
if(isset($_POST['finish'])){
  $myfile = fopen("game.txt", "w");
  fwrite($myfile, 0);
  fwrite($myfile, 5);
  fwrite($myfile, 0);
  fclose($myfile);
}

header("Location: /index.php");

?>
