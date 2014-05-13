<?php session_start();
 if(empty($_SESSION['username'])||empty($_SESSION['password']))
        {
            header("Location: ErrorPage.php");
        }?>
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <style>
 .fruits{
border-style:solid;
border-color:#404040;
border-width:2px;
padding:0px;
border-radius: 15%;
background-color:#404040;
height:220px;
width:220px;
display:inline-block;
margin:20px;

}
a{
    text-decoration: none;
}
a:visited{
    color:white;
    text-decoration: none;
}
body{background-color:#404040;
           color:white;}
        </style>
    </head>
    <body>
      
      <?php if(empty($_COOKIE['name']))
                    {
                        header("Location: Logout.php");
                    }
           $ran=$_POST['Price_range'];
           
          
           $link=  mysql_connect("127.0.0.1:3306", "root", "root");
        if(isset($link))
        {
            mysql_select_db("e_shop",$link);
            
            if($ran=='1')
            {$result="select * from seller where Selling_Cost<=1000 and Admin_approv='yes'";}
            else if($ran=='2')
            {$result="select * from seller where Selling_Cost>1000 and Selling_Cost<10000 and Admin_approv='yes'";}
            else if($ran=='3')
            {$result="select * from seller where Selling_Cost>10000 and Selling_Cost<50000 and Admin_approv='yes'";}
            else if($ran=='4')
            {$result="select * from seller where Selling_Cost>50000 and Selling_Cost<100000 and Admin_approv='yes'";}
            else if($ran=='5')
            {$result="select * from seller where Selling_Cost>100000 and Admin_approv='yes'";}
            $r=  mysql_query($result);
            while($row=  mysql_fetch_assoc($r))
            {
                
                ?><div class="fruits">
                    <figure>
                        <a href="buyerSelection.php?id=<?php print $row['id'];?>">
                            <img src="images/<?php print $row['Pic'];?>" width="220" height="220">
                            <figcaption><?php print $row['Prod_name'];?></figcaption>
                        </a>
                    </figure>
                </div>
              <?php
        }       
        }
     mysql_close();?>
    </body>
</html>
