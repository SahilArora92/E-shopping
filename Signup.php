<!DOCTYPE html>
<?php session_start();
$_SESSION['count']=time();?>
<html>
    <head>
        <title>Sign up</title>
        <link type="type/css" rel="stylesheet" href="formstyle.css">
    </head>
    <body style="background-image:url(one1.jpg);">
        <?php
       include 'createImage.php';
       $flag = 5;
       if (isset($_POST["flag"])) //  check that POST variable is not empty
        {
          $input = $_POST["input"];
          $flag = $_POST["flag"];
          }
       if ($flag == 1) // submit has been clicked
        {
          if (isset($_SESSION['captcha_string']) && $input == $_SESSION['captcha_string']) // user input and captcha string are same
          {  
        $name=$_POST['name'];
        $pass=$_POST['password'];
        $user=$_POST['username'];
        $gender=$_POST['gender'];
        $occu=$_POST['category'];
        $age=$_POST['age'];
        $contact="+".$_POST['contact1']."-".$_POST['contact2'];
        $email=$_POST['email'];
        $address=$_POST['address'];
        $pincode=$_POST['pincode'];
        $link=  mysql_connect("127.0.0.1:3306", "root", "root") or die("Server connection failed");
        if(isset($link))
        {  
            mysql_select_db("e_shop", $link) or die("Database Failed");
            $indicator=  mysql_query("insert into people values('$user','$pass','$name','$gender','$occu','$age','$contact','$email','$address','$pincode')") or die("username exists..!!! please sign up again");
            if($indicator>0)
            {
                ?>
    <center><h4>Sign up Successful</h4></center><br>
    Please login..!!
    <?php
            }
            else
            {
                ?>
    <center><h4>Sign up Failed</h4></center><br>
    Please sign up again..!!
    <?php
            }
        }
        mysql_close();
    } else // incorrect answer, captcha shown again
    {

        ?>
        <div style="text-align:center;">
            <h1>incorrect CAPTCHA <br>please try again </h1>
        </div>
        <?php
        create_image();
        display();
    }

} else // page has just been loaded
{
    create_image();
    display();
}
function display()
       {
        ?>
        <form name="signup"  method="post">
            Name<br>
            <input size="35" type ="text" name="name" required="required" /><br><br>
            Username<br>
            <input size="35" type ="text" name="username" required="required" /><br><br>
            Password<br>
            <input size="35" type ="password" name="password" required="required" /><br><br>
            Gender<br>
            <input  type ="radio" name="gender" value="M" />Male
            <input type ="radio" name="gender" value="F" />Female<br><br>
            Age<br>
            <input type="number" name="age" min="0" max="110" required><br><br>
            
            Mobile number <br> +<input type="text"name="contact1" style="width:20px" pattern="[1-9][0-9]?" title="2 or 1 digit country code" required >-<input type="text" name="contact2" pattern="[1-9][0-9]{9}" title="enter 10 digit number not starting with 0" required> <br><br>
            E-mail ID <br>
            <input type="text" name="email" pattern="[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,4})" title="enter a valid email-id" required><br><br>
            Address<br>
            <textarea rows="10" cols="40" name="address"></textarea><br><br>
            Pincode <br>
            <input type="text" name="pincode" pattern="[1-9][0-9]{5}" title="6 digit pin code"><br><br>
            Category<br>
            <input type ="radio" name="category" value="buyer" />Buyer
            <input type ="radio" name="category" value="seller" />Seller<br><br>
            <img src="image<?php echo $_SESSION['count'] ?>.png">
            <br><input type="hidden" name="flag" value="1"/>
            <input type="text" name="input" size="20" maxlength="6">
            <input type="submit" formaction=" <?php echo $_SERVER['PHP_SELF']; ?>" value="Signup" name="submit">
            <input type="reset" value="Reset">
         </form>
        <form action=" <?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
            <input type="submit" value="refresh the page">
        </form>
       <?php 
       }
?>
    </body>
   </html>