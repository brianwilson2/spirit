<?
  $sql = "SELECT * FROM spirmeth where spirid=".$ide;
       $result = $conn->query($sql);
         $x=0;
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_array()) {
     //   echo "<br>spirid: " . $row['spirid']. " methid: " . $row['methid'];
          $data[$x][0]=$row["spirid"];
          $data[$x][1]=$row["methid"];
          $x++;
     }   // end of while
     } //end of if

         print "<div class=\"row\">";
         print "<span class=\"col-md-8\">";
 print "<table class=\"table\">";
 //   print "cound data".count($data);
    for ($i=0;$i<count($data);$i++){
  $meth=$data[$i][1];
  $methnam=getmethname($meth,$conn);
  $alcmeth=getalcmeth($meth,$conn);
 // print "methnam/alcmeth".$methnam.$alcmeth;
// include "getmethdets.php";

   //    $xord=nexord($lin,$orderid,$conn);
           //      print "xord next";
          //     print_r($xord);
      /*      print "<br>spirit=".$xord[0];
          print "<br>order=".$xord[1];
          print "<br>lineno=".$xord[2];
          print "<br>bottlesize=".$xord[3];
          print "<br>case format=".$xord[4];       */
       print "<th>Method name</th><th>Alc Method</th>";
// print "<th>Method name</th><th>||&nbsp;||</th><th>Next OrderNo</th><th>Next Spirit</th><th>Next bottle size</th><th>case format</th>";
print "<tr>";
print "<td>$alcmeth</td><td>$methnam</td>";
//<td>".$xord[1]."</td><td>".$xord[0]."</td><td>".$xord[3]."</td><td>".$xord[4]."</td>";
print "</tr>";
}
 print "</table>";
        print "</span>";
 print "</div>"; // end of class = row

?>
