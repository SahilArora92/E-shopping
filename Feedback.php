<!doctype html>
<html>
    <head>
        <link type="type/css" rel="stylesheet" href="stylesheet.css">
    </head>
    
    <body style="background-image: url(weekly-review.jpg);background-repeat: no-repeat;">
        <form name ="Feedback" method="post" action>
            <span style="color: #800040;font-size: 20px;font:bold;"> UserName:</span><br>
            <input type="text" name="name" required="required"><br><br><br>
            
           <span style="color: white;font-size: 20px;font:bold;"> Category:</span><br>
            <input type ="radio" name="category" value="seller" /><span style="color: #800040;font-size: 20px;font:bold;">Seller</span>
            <input type ="radio" name="category" value="buyer" /><span style="color: #800040;font-size: 20px;font:bold;">Buyer</span><br><br><br>
            
            
            <span style="color: #800040;font-size: 20px;font:bold;">FeedBack:</span><br>
            <textarea name="comment"rows="10" cols="30">
            </textarea>
            <br><br>
            <input type="submit" formaction="storefeedback.php" class="myButton" value="Submit">
            </form>

            
        </form>
        
    </body>
</html>