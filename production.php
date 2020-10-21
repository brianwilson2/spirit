<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
<?php
 require_once "includes/dbconnect.php";
 require_once "includes/functions.php";

?>
       <title>Spirit Supply Info Chest</title>


     <?php include "bootstrapsetup.php"; ?>
     
</head>
<body>
<?php

      include "includes/navbar.php";

 // $data=getmethods();
  //       print_R($data);
// include "includes/linesess.php";
  //   print "session l=".$_SESSION['l'];
// print "<p>Working on line number: post[L] ".$_POST['l'];
 $l=$_SESSION['l'];


  //  print "<center><h2>LINE ".$l."</h2></center>";
 
//  print "<p>post-ord-=".$_POST['ord'];
          $orderid=$_POST['ord'];
    //   print "<p>orderid=".$orderid;
    
    $sql = "SELECT * FROM lineorders where orderno=".$orderid." order by datestamp asc";
    $result = $conn->query($sql);
   $ide=$x=0;
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        
          $l=$row['lineno'];
    } // end of while
}// end of if

    
 print "<center><h2>LINE ".$l."</h2></center>";
        print "<div class=\"container\">";
     // print "incorder";
    include "incorder.php";

//  print "finished";/
      print "</div>";      // end of container
      
               // Check for Water Flush - CIP and Air Purge
      
    //  print "<center><h2>LINE ".$lin."</h2></center>";

           //0=spirit 1=orderno  2=lineno  3=bottlesize  4=caseformat


            //              print "<p>".$totalcases.$casecount;
       //  print "<div>cases remaining".$totalcases-$casecount."></div>";
           //    $totalcases=$row['totalcases'];
  //             print "<p>totalcases".$totalcases;
    
  //  print "<p>Order order-".$orderid."<p>";
      print "<div class=\"container\">";
      
            include "incdetsheader.php";
    
       print "<form name='form2' action='production2.php' method='post'>";

         include "incfillform.php";

      //    print "aft incfillform bef incblankform";
          
              include "incblankform.php";
              
    print "<input type=\"hidden\" name=\"order\" value=".$orderid.">";  // to send value to 'poduction2.php'
 //   print "<P>HERE CASES".$totalcases.$caseshour.$botincase.$lhour;
        print "<INPUT TYPE=\"hidden\" name=\"tcases\" value=\"".$totalcases."\">";
        print "<INPUT TYPE=\"hidden\" name=\"chour\" value=\"".$caseshour."\">";
        print "<INPUT TYPE=\"hidden\" name=\"bcase\" value=\"".$botincase."\">";
        print "<INPUT TYPE=\"hidden\" name=\"lour\" value=\"".$lhour."\">";
       print "<INPUT TYPE=\"hidden\" name=\"bsize\" value=\"".$botsize."\">";
       

       
 // $cases per hour
  $cases=($case[$x-1]-$case[$x-2]);
     $date1=strtotime($td[$x-1]);
     $date2=strtotime($td[$x-2]);
     
       
     $fact=timediff($date1,$date2);
    // print "<br>fact=".$fact;
       $cashr=intval($cases/$fact);
        print "<INPUT TYPE=\"hidden\" name=\"avgg\" value=\"".$cashr."\">";
     
    print "</form>";  //================================================================================
    
        
              print "<P><br><br><br>";
             $caserem=$totalcases-$caseco;
             $timrem=number_format($caserem/$caseshour,2);
           //  print "caseshour".$caseshour;
             $hr=intval($timrem);
             $remains=$timrem-$hr;
             $mns=intval(60*$remains);
             
             $spiritreq=intval($caserem*($botsize/100)*$botincase);
             $vattrem=$vatv/$lhour;
             $vhr=intval($vattrem);
             $vrem=$vattrem-$vhr;
             $vmin=intval(60*$vrem);
           print "<div class=\"row\">";
        //   print "hello from here x=".$x;
  

 // cases per hour
     $diff=($date1-$date2)/60;
 //    $hrs=intdiv($diff,60);
      $hrs=intval($diff/60);
      $mins=$diff%60;
      
//************************************************
    
     $timediff= time($timecalc[$x])-time($timecalc[$x-1]);
  //  print "<br>and from here";
      print "<div class=\"col-sm-3\" style=\"background-color:yellow;\">".$caserem." cases remaining for this order</div><div class=\"col-sm-3\" style=\"background-color:yellow;\">".$hr." hours and $mns mins remaining on this order</div><div class=\"col-sm-3\" style=\"background-color:gray;\">Spirit req'd to complete this order</div><div class=\"col-sm-3\" style=\"background-color:yellow;\">".$spiritreq." litres</div>";
 print "<div class=\"col-sm-3\" style=\"background-color:yellow;\">".$cases." cases completed in ".$hrs."hr:".$mins." mins</div><div class=\"col-sm-3\" style=\"background-color:yellow;\">".$cashr." cases/hour</div><div class=\"col-sm-3\" style=\"background-color:gray;\"></div><div class=\"col-sm-3\" style=\"background-color:yellow;\">".$vhr." hours ".$vmin." mins to VAT change</div>";
// old one      print "<div class=\"col-sm-3\" style=\"background-color:yellow;\">currently producing $cases per $timd </div><div class=\"col-sm-3\" style=\"background-color:yellow;\">$cashour cases per hour</div><div class=\"col-sm-3\" style=\"background-color:gray;\"></div><div class=\"col-sm-3\" style=\"background-color:yellow;\">".$vhr." hours ".$vmin." mins to VAT change</div>";
  //   print_r($td);
 //  print " cases done=".$cases;
//   print "Cases per hour=".$cashr;
 //    print "fact=".$fact;  
  
    print "</div>";
     

print "</div>"; // end of container       
    //   print "<p>";

         include "incnexorder.php"; 
     


      print "<p><a href=\"startpage.php\">back to startup</a>";
?>
