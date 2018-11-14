<?php
if(isset($_POST['save'])){
  if($_POST['nickname']==""){$nickname="Noname".PHP_EOL;}
  else $nickname= $_POST['nickname'].PHP_EOL;
  $myfile=fopen("score.txt","r");
  $thisscore=fgets($myfile);
  fclose($myfile);
  $file=fopen("bestscores.txt", "r");
  $count=0;
  $bool=1;
  $prev=14;
  $pos=0;
  while(!feof($file)){
    if($count%2==0)
    fgets($file);
    else{
    $score=fgets($file);
    if($thisscore>$score && $score<$prev){
      $prev=$score;
      $bool=0;
      $pos=$count;}
  }
$count++;}
  $ar=array();
  fclose($file);
  if($bool==0){
    $counter=0;
    $p=0;
    $file=fopen("bestscores.txt", "r");
    while(!feof($file)){
      $ar[$p]=fgets($file);
      $p++;
    }
    fclose($file);
$ar[$pos-1]=$nickname;
$ar[$pos]=$thisscore.PHP_EOL;

    $file=fopen("bestscores.txt", "w");
    While($counter<sizeof($ar)){
      fwrite($file,$ar[$counter]);
      $counter++;
    }
    fclose($file);
  }
  file_put_contents("score.txt", "");

header("Location: /index.php");
}

if(isset($_POST['no'])){
  file_put_contents("score.txt", "");
  header("Location: /index.php");
}
?>
