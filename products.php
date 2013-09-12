<?php
// Include MySQL class
require_once('inc/mysql.class.php');
// Include database connection
require_once('inc/global.inc.php');
// Include functions
require_once('inc/functions.inc.php');
// Start the session
session_start();
$func =new functions();
$Uname=$_SESSION['user'];
if($Uname==NULL)
{
    $msg='Please <a href="Login.php">login</a>';
}
else
{
   $msg= "Enjoy your shopping $Uname";
   $logout="<p><a href='Logout.php'>logout</a></p>";
}
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<title>Products</title>
</head>
<body>

                    <h3>Products</h3>
                <ul class="munth">
                  <li><a href="catalogue.php?action=Face" class="wite">Face</a></li>
                      <li><a href="catalogue.php?action=Per" class="wite">Perfumes</a></li>
                      <li><a href="catalogue.php?action=Cologne" class="wite">Cologne</a></li>
                      <li><a href="catalogue.php?action=Skin" class="wite">Skin care </a> </li>
                      <li><a href="catalogue.php?action=Nails" class="wite">Nails</a></li>
                      <li><a href="catalogue.php?action=Hand" class="wite">Hand products </a></li>
                      
                    </ul>
                    

<?php
echo "<p align='Right'>$msg</p>";
echo $func->writeShoppingCart();
?>


					 
             <?php
             
                $type=$_GET['action'];
                if($type==null)
                {
                    
                    $sql = 'SELECT * FROM Product ORDER BY Product_Id desc';
                    $result = $db->query($sql);
                    $output[] = '<table border=2><tr>';
                    $c=0;

                    while ($row = $result->fetch())
                    {
                        if (($i > 0) && ($i % 4 == 0))
                        {
                             $output[] = "</tr><tr>";
                        }
                        $output[] = '<td><p><img src="catalog/'.$row['Product_Image'].'" width="150" height="150" alt=""/></p><p>"'.$row['Product_Name'].'"</p><p>'.$row['Product_Type'].'</p><p> R'.$row['Product_Price'].'</p><p><a href="shopping_cart.php?action=add&id='.$row['Product_Id'].'">Add to cart</a></p>';
                        $i++;
                    }

                    }
                    else
                    {
                            $sql = 'SELECT * FROM Product where Product_Type like "%'.$type.'%"';
                            $result = $db->query($sql);
                            $output[] = '<table border=2><tr>';
                            $c=0;

                        while ($row = $result->fetch())
                        {
                            if (($i > 0) && ($i % 4 == 0))
                            {
                                $output[] = "</tr><tr>";
                            }
                                $output[] = '<td><p><img src="catalog/'.$row['Product_Image'].'" width="150" height="150" alt=""/></p><p>"'.$row['Product_Name'].'"</p><p>'.$row['Product_Type'].'</p><p> R'.$row['Product_Price'].'</p><p><a href="shopping_cart.php?action=add&id='.$row['Product_Id'].'">Add to cart</a></p>';
                             $i++;
                      }
                    }


                    $output[] = '</tr></table>';
                    echo join('',$output);
?>
                      