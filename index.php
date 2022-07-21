<?php
session_start();

include 'config/conn.php';

if(isset($_POST["submit"]))
{
    $user_id=$_POST["user_id"];
    $pwd=$_POST["pwd"];
    $sql="select * from users where Email='$user_id' and Password= '$pwd' ";
   
    $row=$conn->query($sql);
    if($row->num_rows>0){
        $res=$row->fetch_assoc();
        
        $_SESSION["user"]="user";
        $_SESSION["type"]=$res["User_Type"];

        header("Location:home.php");
    }
    else
        echo "<h1 style='color:white;'>Invalid User_Id and Password</h1>";

}
?>

<html>
    <link rel="stylesheet" href="admin/css/login.css">
        <body>
            <div class="login-box">
               <h2>Login</h2>
                   <form id="frm" action="" method="post">
                       <div class="user-box">
                        <label for="user"></label>
                        <input type="text" id="user" placeholder= "USER ID" name="user_id">
                        </div>
                        <div class="user-box">
                        <label for="pwds" placeholder="Password" name="Password"></label>
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
            
            <script src="https://code.jquery.com/jquery-3.6.0.min.js" ></script> 
           
            <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js" ></script>
            <script src="js/Jquery.js"></script>
        </body>
</html>