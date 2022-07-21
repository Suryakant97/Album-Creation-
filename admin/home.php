
<head>
<link rel="stylesheet" href="css/nav.css">
</head>
<body>
    <?php
session_start();
   
if (isset($_SESSION['user'])) 
{
?>
    
<h3 style="text-align:center"> HELLO ADMIN </h3>
   
    <?php

include 'header.php';

}
else
{
    echo "<h3> Invalid User </h3>";
}
?>

</body>
