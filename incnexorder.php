<? //------------------------------------------------------
$ord=$orderid;
print "<div>";
print "<br><br>";
// print "<h3>NEXT ORDER</h3>";
//print "<table class=\"table table-condensed\">";
// print "<tr><th> Next Order</th></tr>";
    for ($i=0;$i<=1;$i++){
       
// print "here in nex order".$old;                                             //NEXT ORDER ROUTINE
     $xord=nexord($lin,$ord,$conn);
            //     print "xord next";
             //  print_r($xord);
            $sprit=$xord[0];
          $nord=$xord[1];
          $nlineno=$xord[2];
      //    $nbotsize=$xord[3];
        $nexbot=checkint($xord[3],$conn);
          $nformat=$xord[4];
          $nspirt=$orde[5];
          $nperorde=$xord[6];
          $nmark=$xord[7];

       //   print "<p>nmark=".$nmark;
         if($nmark<>""){ $markt=gethemarket($nmark,$conn); }
          $ncaseshour=$xord[8];
          $ncases=$xord[9];
      //   print "<p>caseshour=".$xord[8];
          $nexstren=$xord[5];
        $nexabv=checkint($nexstren,$conn);       //checkint - checks if abv has .0 after it, if it does it does NOT display it. If it has eg .5 it does display it
           $prodhr=intval($ncases/$ncaseshour);
           $prodmins=intval((($ncases/$ncaseshour)-$prodhr)*60);
    //     print $ncases."ncases".$ncaseshour."caseshour".$prodhr."prodhr";
           $prodtime=$prodhr." hrs ".$prodmins." mins";
        //------------------------------------------------------
  //  print $ord."here next orderno=".$nord." andlineno:".$lin;

          $spir1=getspirid($ord,$conn);
      //    print "spir1-".$spir1;
          $gp1=getgroup($spir1,$conn);
          $spir2=getspirid($nord,$conn);
        //  print "spir2-".$spir2;
          $gp2=getgroup($spir2,$conn);
     //      print "<br>spir1=".$spir1." - spir2=".$spir2;
    // /      print "<br>gp1=".$gp1." - gp2=".$gp2;

    // 1. get washcuno for each ord and nord
  //  put these into gethiswash and line number and get CIP - YES
 // print "gp1-".$gp1."gp2-".$gp2;
    $wash=gethiswash($lin,$gp1,$gp2,$conn);
   //     print "<p>checkthis".$wash;
       // 2. Check cunogp for what the cunos should be changed to
   // if($wash==99){$wash="No entry available";}elseif($wash==999){$wash="does not exist";}
    print "<table class=\"table table-condensed\">";//
     print "<tr><td class=\"font-weight-bold\"><span class=\"col-lg-3\">".$wash." CUNO CHANGE</span></td>";
     if(stristr($wash,"YES")) {//go get the next cunos
     $cun=getgroupname($gp2,$conn);
     print "<td class=\"font-weight-bold\"><span class=\"col-lg-3\" class=\"font-weight-bold\">Next Cunos: ".$cun."</span></td>";
     print "</tr>";
     }
     PRINT "</table>";




           // working out highlighted NEXT ORDER STUFF



   // printout WASH AND CUNOS TYPE PRIOR TO NEXT ORDER

////  if ($sprit<>""){

//   print "i=".$i.$sprit;                        // print out NEXT ORDER STUFF
 switch ($i){
        case 0: print "<h3>NEXT ORDER</h3>";
        BREAK;
        case 1: print "<h3>FOLLOWING ORDER</h3>";
        BREAK;
        }
  print "<table class=\"table table-condensed\">";

 if($nord<>"") {
     print "<tr><th> Next Order</th>";
     print "<th><span class=\"col-sm-3\">| Next Spirit |</span></th>";
     print "<th>Total Cases</th>";
     print "<th>| market |</th>";
     print "<th>Strength</th>";
     print "<th>| Next bottle size </th>";
     print "<th>| case format </th><th>| cases hour |</th><th>Run Time</th></tr>";
print "<tr><td>".$nord."</td><td> | ".$xord[0]."ooo |</td><td class=\"text-center\">".$ncases."</td><td class=\"text-center\">| ".$markt." |</td><td class=\"text-center\">[ ".$nexabv."%]</td><td class=\"text-center\">| ".$nexbot."cl |</td><td class=\"text-center\">| ".$xord[4]." |</td><td class=\"text-center\">| ".$ncaseshour." |</td><td class=\"text-center\">".$prodtime."</td></tr>";}
 else {print "<tr><td>no next order</td></tr>";}

  print "<tr><td>&nbsp;</td></tr>";
 
// print "</span>";


 // } else{
  //     print "<tr><th> Next Order</th><th><span class=\"col-sm-3\">| Next Spirit |</span></th><th>Total Cases</th><th>| market |</th><th>Strength</th><th>| Next bottle size </th><th>| case format </th><th>| cases hour |</th><th>Run Time</th></tr>";
 // print "<p>no no next order found".$i;
//  }// end of if sprit==""

  $ord=$nord;
$currord=$xord;
 } // end of for i
 print "</table>";
 print "</div>"; // end of class = row

            //       <!--  -------------------------------------- end next order -->
            // so make the loop cover the whole page to get all the 'printouts' to work in logical order - seems to be two looops going here - 1 into the cunos and another on the order
            
            ?>
            

