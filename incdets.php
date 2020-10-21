<?         print "<div class=\"row\">";
             print "<div class=\"col-sm-1\" style=\"background-color:yellow;\">time</div><div class=\"col-sm-1\" style=\"background-color:yellow;\">case number</div><div class=\"col-sm-1\" style=\"background-color:yellow;\">strength</div><div class=\"col-sm-1\" style=\"background-color:yellow;\">colour</div><div class=\"col-sm-1\" style=\"background-color:yellow;\">pH</div><div class=\"col-sm-1\" style=\"background-color:yellow;\">Haze</div><div class=\"col-sm-3\" style=\"background-color:yellow;\">Comment</div>";
                   print "</row>";
                   
$sql = "SELECT * FROM lineorderdetails where orderno=\"$orderid\" order by tim"; // where orderno=\'$ord\'";// order by datestamp";
$result = $conn->query($sql);
   $ide=$x=0;
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        $x++;
   //   echo $x.$row['tim'].$row['casecount'].$row['strength'].$row['colour'].$row['pH'].$row['haze'].$row['comment'];
        print "<div class=\"row\">";
     print "<div><input type=\"time\" style=\"width:110px;\" class=\"form-control form-control-lg\" name=\"tm\" value=".$row['tim']."></div>";     // class=\"col-sm-1\">
     print "<div><input type=\"text\" style=\"width:100px;\" class=\"form-control form-control-lg\" name=\"caseno\" value=".$row['casecount']."></div>";
     print "<div><input type=\"text\" style=\"width:90px;\" class=\"form-control form-control-lg\" name=\"strength\" value=".$row['stren']."></div>";
     print "<div><input type=\"text\" style=\"width:80px;\" class=\"form-control form-control-lg\" name=\"colr\" value=".$row['colour']."></div>";
     print "<div><input type=\"text\" style=\"width:90px;\" class=\"form-control form-control-lg\" name=\"phe\" value=".$row['pH']."></div>";
     print "<div><input type=\"text\" style=\"width:90px;\" class=\"form-control form-control-lg\" name=\"hze\" value=".$row['haze']."></div>";
     print "<div><input type=\"text\" style=\"width:350px;\" class=\"form-control form-control-lg\" name=\"comm\" value=".$row['comment']."></div>";
  // $row['ordclosed']==1
    print "caseco=".$caseco;
   print "<div><input type=\"checkbox\" name=\"comp\" value=\"ticked\"></div>";

   }// end of if
} // end of while
 ?>
