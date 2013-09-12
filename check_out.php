<?php
    // Include MySQL class
    require_once('inc/mysql.class.php');
    // Include database connection
    require_once('inc/global.inc.php');
    // Include functions
    require_once('inc/functions.inc.php');
    //Include validations
    require_once('inc/Validation.php');
require_once('inc/functions.inc.php');
// Start the session
session_start();
$func =new functions();
$Uname=$_SESSION['user'];
if($Uname==NULL)
{
    header('Location:Login.php');
}
else
{
   $msg= "Enjoy your shopping $Uname";
   $logout="<p><a href='Logout.php'>logout</a></p>";
}

?>

    <?php
        if(isset($_POST['btnCheck']))
        {
            $accno=$_POST['txtaccno'];
            $cardno=$_POST['txtcardno'];
            //$paytype=$_POST['paytype'];
            $conn = mysql_connect("localhost","root","");

//checking if the connection was made successfully
if(!$conn)
{
	die("An Error occured while connecting to the server.Please try again later");
}

//selecting the database
$db = mysql_select_db("royale_beauty",$conn);
//checking if the database exists
if(!$db)
{
	die("Connection to the database has failed");
}


                        $query="insert into payment values(null,'$accno','$cardno')";
                        $result = mysql_query($query);
                        //$i=0;

                       if(!$result)
                       {
                           echo "Did not insert into the table";
                       }
                        //while ($num = mysql_fetch_array($result))
                        //{
                           // echo "Name :\t".$num['customer_Fname']." <br />Surname :\t".$num['customer_Lname']." <br />Street name :\t".$num['street_name']." <br />Province :\t".$num['province']." <br />House number :\t".$num['house_number'];
                           // $i++;
                        //}
                       $results = mysql_query($query,$conn);
                     ?>


