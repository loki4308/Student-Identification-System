<?php     //start php tag
//include connect.php page for database connection
Include('db.php');
//if submit is not blanked i.e. it is clicked.
if (isset($_REQUEST['Submit'])) //here give the name of your button on which you would like    //to perform action.
{
// here check the submitted text box for null value by giving there name.
    if($_REQUEST['user_id']=="" || $_REQUEST['password']=="")
    {
    echo " Field must be filled";
    }
    else
    {
       $sql1= "select * from student where email= '".$_REQUEST['user_id']."' &&  password ='".$_REQUEST['password']."'";
      $result=mysql_query($sql1)
        or exit("Sql Error".mysql_error());
        $num_rows=mysql_num_rows($result);
       if($num_rows>0)
       {
//here you can redirect on your file which you want to show after login just change filename ,give it to your filename.
           //header("location:filename.php"); 
 //OR just simply print a message.
         Echo "You have logged in successfully";    
        }
        else
        {
            echo "username or password incorrect";
        }
    }
}    
?>