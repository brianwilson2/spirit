<?

print "<div class=\"row\">";
print "<div class=\"col-sm-2\" style=\"background-color:yellow;\">Order No</div><div class=\"col-sm-1\" style=\"background-color:yellow;\">total cases</div><div class=\"col-sm-1\" style=\"background-color:yellow;\">case format</div><div class=\"col-sm-1\" style=\"background-color:yellow;\">bottle size</div><div class=\"col-sm-1\" style=\"background-color:yellow;\">line number</div><div class=\"col-sm-1\" style=\"background-color:yellow;\">market</div><div class=\"col-sm-1\" style=\"background-color:yellow;\">Upper Strength</div><div class=\"col-sm-1\" style=\"background-color:yellow;\">Lower Strengh</div><div class=\"col-sm-1\" style=\"background-color:yellow;\">cases/hour</div><div class=\"col-sm-1\" style=\"background-color:yellow;\">Spir.L/hour</div>";
print "</div>";  // end of row

$sql = "SELECT * FROM lineorders where orderno=".$orderid." order by datestamp asc";
$result = $conn->query($sql);
   $ide=$x=0;
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {

        $merk=$row['market'];
         //  echo "this one".$merk;

       //     echo "<p>stren=".$stren;
                       $ord=$row['orderno'];
                       $totalcases=$row['totalcases'];
                       $caseshour=$row['caseshour'];
                       $botsize=checkint($row['bottlesize']);
                       $botincase=$row['caseformat'];
                       $prodcode=$row['spirid'];
                       $lhour=($botincase*$botsize/100*$caseshour);
                       $lin=$row['lineno'];
            include "getmarketinfo.php";  // to get market info up down etc.
            include "getprodname.php";

                       $abv=checkint($stren);
                    //   print $abv;
                       $toperc=$abv+$up;
                       $botperc=$abv-$down;
                       
                       $currord[1]=$ord;
                       $currord[2]=$prodnam;
                       $currord[3]=$totalcases;
                       $currord[4]=$markt;
                       $currord[5]=$abv;
                       $currord[6]=$botsize;
                       $currord[7]=$botincase;
              //  print "<center><h2>LINE ".$lin."</h2></center>";        
               print "<div class=\"row\">";
     print "<span class=\"col-md-2\" style=\"font-size:20px\">".$ord."</span><span class=\"col-sm-1\">".$totalcases."</span><span class=\"col-sm-1\">".$botincase."</span><span class=\"col-sm-1\">".$botsize."cl</span><span class=\"col-sm-1\">".$lin."</span><span class=\"col-sm-1\">".$markt."</span><span class=\"col-sm-1\">".number_format($toperc,2)."%</span><span class=\"col-sm-1\">".number_format($botperc,2)."%</span><span class=\"col-sm-1\">".$caseshour."</span><span class=\"col-sm-2\">".$lhour."</span>";
       print "</div>";      // end of row


          print "<div class=\"row\">";
print "<div class=\"col-sm-2\" style=\"background-color:yellow;\">Spirit Name</div><div class=\"col-sm-2\" style=\"background-color:yellow;\">Spirit Code</div><div class=\"col-sm-1\" style=\"background-color:yellow;\">Strength</div><div class=\"col-sm-1\" style=\"background-color:yellow;\">Colour</div><div class=\"col-sm-1\" style=\"background-color:yellow;\">Max Haze</div><div class=\"col-sm-1\" style=\"background-color:yellow;\">pH Min</div><div class=\"col-sm-1\" style=\"background-color:yellow;\">pH Max</div><div class=\"col-sm-3\" style=\"background-color:yellow;\">comments</div>";//ticked (if completed)
print "</div>";  // end of row

          print "<div class=\"row\">";
     print "<span class=\"col-sm-2\" style=\"font-size:20px\">".$prodnam."</span><span class=\"col-sm-2\">".$cod."</span><span class=\"col-sm-1\">".$abv."%</span><span class=\"col-sm-1\">".$colr."</span><span class=\"col-sm-1\">".$hzmax."</span><span class=\"col-sm-1\">".$phmin."</span><span class=\"col-sm-1\">".$phmax."</span><span class=\"col-sm-1\">".$spircomm1."</span><span class=\"col-sm-1\">".$spircomm2."</span><span class=\"col-sm-1\">".$spircomm3."</span>";
    print "</div>";   // end of row


    }// end of while
 }  // end of if result->
 else {echo "0 results(incorder)";}
          //<!--span class=\"col-sm-1\">".$alcmeth."</span -->

//  print "ide=".$ide;
  $ide=$prodcode;
  print "<br>";
        $data=spirmeth($ide,$conn);


 print "<table class=\"table table-condensed\">";
 //   print "cound data".count($data);
    for ($i=0;$i<count($data);$i++){
  $meth=$data[$i][1];
  $methnam=getmethname($meth,$conn);

//print "<p>at meth incorder now";

print "<tr>";
 print "<th>Method name</th>"; //<th>||&nbsp;||</th>
print "<td>$methnam</td>";  // <td>$alcmeth</td>
print "</tr>";
}
 print "</table>";
 
 print "<hr>";
 //  print "</div>"; // end of row


  ?>
