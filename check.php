<?php
$level1=array("a", "d", "d", "b","a","a","b","a","b","d","a","c","a","d","c","b","b","a","b","d","d","c","b","c","d");
$level2=array("a", "d", "c", "b","a","d","b","a","b","d","c","a","b","a","d","c","a","d","a","d","c","a","a","d","c");
$level3=array("c", "c", "a", "c","b","c","c","b","a","c","d","b","a","a","b","a","b","b","b","c","b","c","a","c","a");

$file = fopen("score.txt","r");
$score=fgetc($file);
fclose($file);

$file = fopen("game.txt","r");
$level= fgetc($file);
$counter= fgetc($file);
$rand= fgetc($file);
$rand2=fgetc($file);
if($rand2!=""){
  $rand=($rand*10)+$rand2;
}
if(isset($_POST['toanswer'])){
  $answer = $_POST['answer'];
if($level==1){
  if($level1[$rand]==$answer){
  $score=$score+1;
    $level=2;}

}
else if($level==2){
  if($level2[$rand]==$answer){
  $score=$score+2;
    $level=3;}
  else $level=1;
}
else if($level==3){
  if($level3[$rand]==$answer){
  $score=$score+3;
    $level=3;}
  else $level=2;
}
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

header("Location: /index.php");

?>
