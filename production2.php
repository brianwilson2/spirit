<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
<?php
 include "includes/dbconnect.php";
  include "includes/functions.php";

?>
       <title>Spirit Supply Info Chest</title>

      <!-- BOOTSTRAP STUFF  -->
               <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>


     <!-- END OF BOOTSTRAP STUFF  -->
     
      <script>
                function goStart(){
                document.forms['form1'].action="startpage.php";
                document.forms['form1'].submit();
                   }
          </script>
</head>
<body>
<?php

      include "includes/navbar.php";

// print "Working on line number: ".$_POST['l'];
// $l=$_POST['l'];
// print "<p>Line Session:= |".$_POST['l']."|";
     $orderid="";
//  print "<p>order".$_POST['order'];
          $orderid=$_POST['order'];
    //       print "<p>orderid=".$orderid;
        if($orderid==""){print "orderide=|".$orderid."|"; print "<p>So exiting now!!"; exit();}
          $tm=$_POST['tm'];
    //     print "tm=".$tm;
           $leni=strlen($tm);
     //     print "leni=".$leni;
         if($leni<8){
              switch ($leni){
                  case 7:
                  $tm.="0";
                  break;
                  case 6:
                  $tm.="00";
                  break;
                   case 5:
                  $tm.=":00";
                  break;
                  case 4:
                  $tm.="0:00";
                  break;
                  case 3:
                  $tm.="00:00";
                  case 2:
                  $tm.="00:00";
                  break;
                  case 1:
                  print "time value incorrect";
                  break;
                  default:
                  print "time value incorrect";
                         }
                  }
    //      print "After ".$tm;
    //      print "<P>orderidDDD".$orderid;
          $da=$_POST['dat'];
          $caseno=intval($_POST['caseno']);  // case number
          $tcases=$_POST['tcases']; // total cases
          $chour=$_POST['chour'];  // cases/hour
          $bcase=$_POST['bcase']; // bottles in case
          $lour=$_POST['lour']; // litres/hour
          $bsize=$_POST['bsize'];
      //    $olef=$_POST['oleft'];
          $otend=$_POST['otimend'];
      //    $vlef=$_POST['vleft'];
          $vtend=$_POST['vtimend'];
          $vat=$_POST['vat'];
          $vatv=intval($_POST['vatv']);
          $dat=$_POST['dat'];
          $tm=$_POST['tm'];

           $cleft=$tcases-$caseno;
       //   print "<p><STRONG>vat no=".$vat.$vatv." case no= ".$caseno." cases left=".$cleft." cases/hour".$chour." b/case".$bcase." b/size=".$bsize." litres/hour".$lour."</STRONG>";//.$vat." vat vol="..;
          
             $caserem=$tcases-$caseno;
             $timrem=number_format($caserem/$chour,2);
             $hr=intval($timrem);
             $remains=$timrem-$hr;
             $mns=intval(60*$remains);

             $spiritreq=intval($caserem*($bsize/100)*$bcase);
             $vattrem=$vatv/$lour;
             $vhr=intval($vattrem);
             $vrem=$vattrem-$vhr;
             $vmin=intval(60*$vrem);
             
       //     print "<p><strong>cases remaining=".$caserem." time rem on order=".$hr."hrs:".$mns."mins spirit req=".$spiritreq." litres : time left in vat= ".$vhr."hr:".$vmin."mins</strong>";
          $comm=$_POST['comm'];
          $complet="";
          $complet=$_POST['comp'];

          if($_POST['comp']=="on"){
              $complet=1;
          //UPDATE ORDER
          $sql = "UPDATE lineorders SET orderclosed=1 where orderno=\"$orderid\""; //      UPDATE `members` SET `contact_number` = '0759 253 542' WHERE `membership_number` = 1;
           if (mysqli_query($conn, $sql)) {
           echo "<br><strong>Order $orderid closed successfully</strong>";
           } else {
           echo "<p>Error in UPDATE ORDER: $orderid " . $sql . "<br>" . mysqli_error($conn);
}
          //, totalcases,bottlesize, caseformat, market, comment, lineno,orderclosed,caseshour)
          // VALUES (\"$ord\",$totcases,$botsz,\"$caseform\",\"$markt\",\"$comm\",\"$l\",\"$ordclose\",\"$cashour\")";
          
          }
       //   print "<P>COMPLETEcomplete=".$complet;
       //      print "<p>posted values here<br>";
       //      $datm=$da." ".$tm;


    $datm=date_create($da." ".$tm);
    $datm=date_format($datm,"Y-m-d H:i:s");
        //        PRINT date(now)."before and after".$datm;
                
                // CALC END TIMES


                $totalcases=$_POST['tcases'];
                $caseshour=$_POST['chour'];
                $botincase=$_POST['bcase'];
                $lhour=$_POST['lour'];
                $avgch=intval($_POST['avgg']);

         //    $caserem=$totalcases-$caseno;
      //   print "here cases remaining".$caserem;
             $timrem=number_format($caserem/$caseshour,2);
             $hr=intval($timrem);
             $remains=$timrem-$hr;
             $mns=intval(60*$remains);

             $spiritreq=intval($caserem*($botsize/100)*$botincase);
             $vattrem=$vatv/$lhour;
             $vhr=intval($vattrem);
             $vrem=$vattrem-$vhr;
             $vmin=intval(60*$vrem);
            //       print "<p>these ones are|: ".time($otend)." -- ".time($timerem);
                $otend.=time($timerem);
        $otend=date_format($otend,"Y-m-d H:i:s");
                $vtend.=time($vatrem);
        $vtend=date_format($vtend,"Y-m-d H:i:s");
        //        print "<p>estimated end times".$otend." and ".$vtend;
                // end calcs
                
                
          //      $cal=strtotime($);
                $date = date('h:i', time()+36000);
    //     print "<p>-ORDERID ".$orderid." -Timedate ".$datm." -CASENO ".$caseno." -vat ".$vat." -vatv ".$vatv."otimend ".$otend." Vtimend".$vtend.$avgch." -COMM ".$comm." -COMPLETE ".$complet;

   //      print "<p>dat=".$dat." tm=".$tm;
         $startTime=date($dat." ".$tm);
            $newTime=date('d-m-Y H:i',strtotime('+1 hour',strtotime($startTime)));
            $vattend=date('d-m-Y H:i',strtotime('+'.$vhr.' hour + '.$vmin." mins" ,strtotime($startTime)));
            $ordend=date('d-m-Y H:i',strtotime('+'.$hr.' hour + '.$mns." mins" ,strtotime($startTime)));
      /*      print "<p>StartTime".$startTime;
            print "<br>vattend=".$vattend;
            print "<br>ordend=".$ordend; */
            $odend=date('Y-m-d H:i:s',strtotime($ordend));
         $vend=date('Y-m-d H:i:s',strtotime($vattend));
     //    print "<p>odend".$odend." vend".$vend;
    //    $tid=strtodate($datm);
     //   print "tid=".$tid." now";
     //     $tid=date($da." ".$tm);

          //$tm  =
          $sql = "INSERT INTO lineorderdetails (orderno, timedate, casecount, vatno,vatvol,otimend,vatimend,avgcph, comment) VALUES(\"$orderid\",\"$datm\", \"$caseno\",\"$vat\",\"$vatv\",\"$odend\",\"$vend\",\"$avgch\", \"$comm\")";
if (mysqli_query($conn, $sql)) {
      echo "<p>New record for $orderid added to Lineorderdetails";
} else {
      echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
mysqli_close($conn);

          
 //  print "<p>added order ".$orderid." to lineorderdetails";
   
       print "<form name=\"form1\" action=\"production.php\" method=\"post\">";

     print "<button type=\"submit\" class=\"btn btn-primary\" onClick=\"goStart();\">Go to Start</button>";
    print "<button type=\"submit\" class=\"btn btn-primary\" onClick=\"goMore();\">Add more entries</button>";
        print "<input type=\"hidden\" name=\"ord\" value=".$orderid.">";
        print "<input type=\"hidden\" name=\"line\" value=".$l.">";
        print "</form>";

  //  <!--     print "<p><a href=\"startpage.php\">back to startup</a>"; -->
?>
</body>
</html>


