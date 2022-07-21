<?php
session_start();
if(isset($_POST["submit"]))
{
    $user_id=$_POST["user_id"];
    $pwd=$_POST["pwd"];
    if( ($user_id=="admin@123") && ($pwd=="Admin") )
    {
        header("Location:home.php");
        $_SESSION["user"]="admin";
    }
    else{
        echo "<h1 style='color:white;'>Invalid User_Id and Password</h1>";


    }

}
?>

<html>
<link rel="stylesheet" href="css/login.css">
         <div class="login-box">
            <h2>Login</h2>
                <form action="" method="post" id="frm">
                    <div class="user-box">
                        <label for="user"></label>
                        <input type="text" id="user" placeholder= "USER ID"name="user_id">
                        </div>
                        <div class="user-box">
                        <label for="pwds" placeholder="Password"></label>
                        <input type="password" id="pwds" name="pwd">
                        </div>
                        <a>
                            <span></span>
                            <span></span>
                            <span></span>
                            <span></span>
                            <input type="submit" id="submit" name="submit">
                           
                         </a>
                     </div> 
                </form>
       </div> 
    </body>



</html>

<script src="https://code.jquery.com/jquery-3.6.0.min.js" ></script> 
           
           <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js" ></script>
           <script src="js/Jquery.js"></script>