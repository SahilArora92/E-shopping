<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>E-Shopping</title>
        <style type="text/css">@import "stylesheet.css"; 
            
        </style>
        <script type="text/javascript" src="//code.jquery.com/jquery-1.10.2.min.js"></script>
    <script type="text/javascript" src="alphabet.js"></script>
    </head>
    
    
    <body style="background-image:url(header1.jpg)">
        <div id="header"><canvas id="myCanvas" height="100"></canvas>
    <script type="text/javascript" src="bubbles.js"></script>
    <script type="text/javascript" src="try1.js"></script></div>
        <script type="text/javascript">
               function on_submit()
               {
                   
                   document.login.target='show';
                   document.login.action='Login.php';
                   var x=document.forms["login"]["username"].value;
                   var y=document.forms["login"]["password"].value;
                   if (x==null || x=="")
                   {
                   alert("Username must be filled out");
                   return false;
                   }
                    else if (y==null || y=="")
                   {
                   alert("Password must be filled out");
                   return false;
                   }
                   else{
                   document.login.submit();
                   document.login.reset();
               }
               }
               </script>
               
           <div id="loginform">
             
            <form  name="login" method="post">
                  Username<br>
                <input type ="text" name="username" required="true" />
                <br>
                Password<br>
                <input type ="password" name="password" required="true" />
                <br>
                <input type="button"  onclick="on_submit();" value="Login" class="myButton">
                </form>
               
               <div style="float: left;">
                   <form name="signup" action="Signup.php" method="post">
                       <input type="submit" formtarget="show" value="Signup" class="myButton">
               </form>
               </div>
               </div>
        
    </body>
</html>
