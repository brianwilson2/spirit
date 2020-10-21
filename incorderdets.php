<?
$sql = "SELECT * FROM lineorders where orderno=".$orderid." order by datestamp";
$result = $conn->query($sql);
   $ide=$x=0;
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {

               print "<div class=\"row\">";
     print "<span class=\"col-sm-2\">".$row['orderno']."</span><span class=\"col-sm-1\">".$row['totalcases']."</span><span class=\"col-sm-1\">".$row['caseformat']."</span><span class=\"col-sm-1\">".$row['bottlesize']."</span><span class=\"col-sm-1\">".$row['lineno']."</span><span class=\"col-sm-1\">".$row['market']."</span><span class=\"col-sm-2\">".$row['comment']."</span>";
      $ord=$row['orderno'];
       print "</div>";      // end of row
      print "</div>";      // end of container


    }// end of while
 }  // end of if
 else {echo "0 results";} //*/
  ?>
