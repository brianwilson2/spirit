<?
//print $date();
date_default_timezone_set('Europe/London');
 $dt=date("d-m-Y");
$tim=date("H:i");
       print "<div class=\"row\">";
  //      print "<input class=\"datepicker\" id=\"_Date\" name=\"Date\" type=\"text\" value=\"01-Jan-2017\">";

     print "<div><input type=\"text\" style=\"width:180px;\" class=\"form-control form-control-lg\"  name=\"dat\" value=".$dt."></div>";//   <input class="datepicker" data-date-format="mm/dd/yyyy">    //data-date-format=\"mm-dd\"
     print "<div><input type=\"time\" style=\"width:130px;\" class=\"form-control form-control-lg\" name=\"tm\" value=".$tim."></div>";     // class=\"col-sm-1\">
     print "<div><input type=\"text\" style=\"width:90px;\" class=\"form-control form-control-lg\" name=\"caseno\" value=".$row['casecount']."></div>";
   print "<div><input type=\"text\" style=\"width:100px;\" class=\"form-control form-control-lg\" name=\"vat\" value=".$row['vatno']."></div>";
     print "<div><input type=\"text\" style=\"width:120px;\" class=\"form-control form-control-lg\" name=\"vatv\" value=".$row['vatvol']."></div>";
 /*  print "<div><input type=\"text\" style=\"width:100px;\" class=\"form-control form-control-lg\" name=\"vatv\" value=".$row['vatvol']."></div>";
   print "<div><input type=\"text\" style=\"width:100px;\" class=\"form-control form-control-lg\" name=\"vatv\" value=".$row['vatvol']."></div>";
   print "<div><input type=\"text\" style=\"width:100px;\" class=\"form-control form-control-lg\" name=\"vatv\" value=".$row['vatvol']."></div>";
   print "<div><input type=\"text\" style=\"width:100px;\" class=\"form-control form-control-lg\" name=\"vatv\" value=".$row['vatvol']."></div>";
   */

  /*   print "<div><input type=\"text\" style=\"width:90px;\" class=\"form-control form-control-lg\" name=\"oleft\"></div>";    // value=".$row['stren']."
     print "<div><input type=\"time\" style=\"width:80px;\" class=\"form-control form-control-lg\" name=\"otimend\"></div>";         //.$row['colour'].
     print "<div><input type=\"text\" style=\"width:90px;\" class=\"form-control form-control-lg\" name=\"vleft\"></div>";      // value=".$row['pH']."
     print "<div><input type=\"time\" style=\"width:90px;\" class=\"form-control form-control-lg\" name=\"vtimend\"></div>";  // value=".$row['haze'].
    */
     
     print "<div><input type=\"text\" style=\"width:390px;\" class=\"form-control form-control-lg\" name=\"comm\" value=".$row['comment']."></div>";
     
      print "<div><input type=\"checkbox\" name=\"comp\">Order complete</div>";      // tick at the line level - then add to 'lineorders' when inserting the line to linedetails
       print "<div><button type=\"submit\" class=\"btn btn-primary\">add details to DB</button></div>";

 print "</div>";
 ?>
