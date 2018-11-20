<?php
if(isset($_POST['save'])){
  if($_POST['nickname']==""){$nickname="Noname".PHP_EOL;}
  else $nickname= $_POST['nickname'].PHP_EOL;
  $myfile=fopen("score.txt","r");
  $thisscore=fgets($myfile);
  fclose($myfile);
if($thisscore=="")$thisscore=0;
$thisscore=$thisscore.PHP_EOL;
  $file=fopen("bestscores.txt", "r");
  $count=0;
  $bool=1;
  $prev=14;
  $pos=0;
  // while(!feof($file)){
  //   if($count%2==0)
  //   fgets($file);
  //   else{
  //     $score=fgets($file);
  //     if(((int)$thisscore>(int)$score) && ((int)$score<$prev)){
  //       $prev=(int)$score;
  //       $bool=0;
  //       $pos=$count;
  //
  //     }
  //   }
  //   $count++;}


    $bool=1;

    $points=array();
    $nick=array();
    $c1=0;

    $allfile=fopen("allscores.txt","r");
    while(!feof($allfile)){
      $nick[$c1]=fgets($allfile);
      $points[$c1]=fgets($allfile);
      $c1++;
    }
    $v=0;
    for($i=count($points)-1; $i>=0; $i--){
    if( intval($points[$i])<intval($thisscore) ){
      $points[$i+1]=$points[$i];
      $nick[$i+1]=$nick[$i];
      $points[$i]=$thisscore;
      $nick[$i]=$nickname;
      $v=1;
      $bool=0;
    }
    else break;
    }

    if(count($points)==0){
      $points[0]=$thisscore;
      $nick[0]=$nickname;
      $bool=0;

    }

    else if($v==0){
      $points[count($points)-1]=$thisscore;
      $nick[count($points)-1]=$nickname;
      $bool=0;
      $v=1;
    }


fclose($allfile);
$allfile=fopen("allscores.txt","w");
$i=0;
while($i<count($points)){
fwrite($allfile, $nick[$i]);
fwrite($allfile, $points[$i]);
$i++;
}

fclose($allfile);






    //
    // $ar=array();
    // fclose($file);
    // if($bool==0){
    //   $counter=0;
    //   $p=0;
    //   $file=fopen("bestscores.txt", "r");
    //   while(!feof($file)){
    //     $ar[$p]=fgets($file);
    //     $p++;
    //   }
    //   fclose($file);
    //   $ar[$pos-1]=$nickname;
    //   $ar[$pos]=$thisscore.PHP_EOL;
    //
    //   $file=fopen("bestscores.txt", "w");
    //   While($counter<sizeof($ar)){
    //     fwrite($file,$ar[$counter]);
    //     $counter++;
    //   }
    //   fclose($file);
    // }





    if( $bool==0 ){
      header('Refresh:2; url=index.php');
      echo 'Your score was saved.';
      file_put_contents("score.txt", "");
    }
    else{
      header('Refresh:2; url=index.php');
      echo 'Something was wrong! Your score could not be saved.';
      file_put_contents("score.txt", "");
    }
  }


  if(isset($_POST['no'])){
    file_put_contents("score.txt", "");
    header("Location: /index.php");
  }
  ?>
