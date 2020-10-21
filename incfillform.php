<?  //    print "order no now".$orderid;
$sql = "SELECT * FROM lineorderdetails where orderno=\"$orderid\" order by timedate"; // where orderno=\'$ord\'";// ";
$result = $conn->query($sql);
   $ide=$x=0;
  //  print "num rows=".($result->num_rows);
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        $da=substr($row['timedate'],0,10);
        $da=date("d-M-Y", strtotime($da));
        $tim=substr($row['timedate'],11,5);
        $otend=substr($row['otimend'],11,5);
        $vtend=substr($row['vatimend'],11,5);
        $avgc=substr($row['avgcph']);
        $timecalc[$x]=$tim;
        $td[$x]=$row['timedate'];
      print "<div class=\"row\">";
     print "<div><input type=\"text\" style=\"width:180px;\" class=\"form-control form-control-lg\" name=\"dt\" value=".$da."></div>";
      print "<div><input type=\"text\" style=\"width:130px;\" class=\"form-control form-control-lg\" name=\"tm\" value=".$tim."></div>";     // class=\"col-sm-1\">
     print "<div><input type=\"text\" style=\"width:90px;\" class=\"form-control form-control-lg\" name=\"caseno\" value=".$row['casecount']."></div>";
         $caseco=$row['casecount'];
         $case[$x]=$row['casecount'];   
     print "<div><input type=\"text\" style=\"width:100px;\" class=\"form-control form-control-lg\" name=\"vatno\" value=".$row['vatno']."></div>";
     print "<div><input type=\"text\" style=\"width:120px;\" class=\"form-control form-control-lg\" name=\"vat\" value=".$row['vatvol']."></div>";

     
  //   print "<div><input type=\"text\" style=\"width:100px;\" class=\"form-control form-control-lg\" name=\"strength\" value=".$row['oleft']."></div>";
     print "<div><input type=\"text\" style=\"width:80px;\" class=\"form-control form-control-lg\" name=\"colr\" value=".$otend."></div>";
  //   print "<div><input type=\"text\" style=\"width:90px;\" class=\"form-control form-control-lg\" name=\"phe\" value=".$row['vatleft']."></div>";
     print "<div><input type=\"text\" style=\"width:90px;\" class=\"form-control form-control-lg\" name=\"hze\" value=".$vtend."></div>";
      print "<div><input type=\"text\" style=\"width:90px;\" class=\"form-control form-control-lg\" name=\"avg\" value=\"".$row['avgcph']."\"></div>";
     print "<div><input type=\"text\" style=\"width:200px;\" class=\"form-control form-control-lg\" name=\"comm\" value=\"".$row['comment']."\"></div>";
      $x++;

  //  print "<div>".$totalcases-($row['casecount'])."></div>";
    //<input type=\"text\" style=\"width:90px;\" class=\"form-control form-control-lg\" name=\"casecnt\" value=
  // $row['ordclosed']==1
 //  print "<div><input type=\"checkbox\" name=\"comp\" value=\"ticked\"></div>";  // no need for this when the line has been completed already
     //echo $row['comment'];   */
      $vatv=$row['vatvol'];
   print "</div>";  // end of div class = row
   }// end of while

        print "<div><button type=\"submit\" class=\"btn btn-primary\">Modify details</div>";
} // end of if
 ?>
