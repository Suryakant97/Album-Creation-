
<head>
<link rel="stylesheet" href="css/nav.css">
</head>
<body>
    <?php
session_start();
include 'config/conn.php';
if (isset($_SESSION['user'])) 
{
   include 'header.php';
    $id=$_GET["id"];
    $sql="select * from image where album_id=".$id;
    $im_ro=$conn->query($sql);

    echo "<br>";

    $sql="select * from album where id=".$id;
    $row=$conn->query($sql);
    $result=$row->fetch_assoc();
    echo "<h2>Album Title : ".$result['title']."</h2>";
    echo "<h2>Description :</h2><p> ".$result['description']."</p>";
    while($res=$im_ro->fetch_assoc())
    
    {
        
    ?>
   
    <img src="<?=$res['img_url']?>" style="height:500px;width:400px;">


    

    <?php

    }
  
}
else
{
    echo "<h3> Invalid User </h3>";
}
?>

</body>
