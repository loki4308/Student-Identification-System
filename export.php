<?php  
//export.php  
include 'db.php';
$output = '';
if(isset($_POST["export"]))
{
 $query = "SELECT * FROM card_activation order by 1 desc";
 $result = mysqli_query($con, $query);
 if(mysqli_num_rows($result) > 0)
 {
  $output .= '
   <table class="table" bordered="1">  
                    <tr>  
                         <th>S.L</th>  
                         <th>Card Name</th>  
                         <th>Name</th>  
                         <th>Father Name:</th>  
                           
                         <th>Birthday</th>
                         <th>Gender</th>  
                         
                         <th>Email Id:</th>  
                         <th>Mobile N.</th>
                         <th>Dept</th>  
                         <th>Address</th>
                         

                    </tr>
  ';
  $i = 0;
  while($row = mysqli_fetch_array($result))
  {
    $sl = ++$i;
   $output .= '
    <tr>  
                         <td > '.$sl.' </td>
                         <td>'.$row["u_card"].'</td>  
                         <td>'.$row["u_f_name"].'</td>  
                         <td>'.$row["u_father"].'</td>  
                           
                         <td>'.$row["u_birthday"].'</td>
                         <td>'.$row["u_gender"].'</td> 
                           
                         <td>'.$row["u_email"].'</td>  
                         <td>'.$row["u_phone"].'</td> 
                         <td>'.$row["dept"].'</td>  
                      
                        <td>'.$row["u_address"].'</td>  
                        <td>'.$row["uploaded"].'</td>
                    </tr>
   ';
  }
  $output .= '</table>';
  header('Content-Type: application/xls');
  header('Content-Disposition: attachment; filename=Students_all_Cards_Data.xls');
  echo $output;
 }
}
?>