
<head>
<link rel="stylesheet" href="admin/css/nav.css">
</head>
<body>
    <ul>
        <li><a class="active" href="home.php">Home</a></li>
        <li><a href="logout.php"> Logout</a></li>
    </ul>
    <?php
session_start();

include 'config/conn.php';
if (isset($_SESSION['user'])) 
{
    
    $id=$_GET["id"];
    $sql="select * from image where album_id=".$id;
    $im_ro=$conn->query($sql);

    echo "<br>";

    $sql="select * from album where id=".$id;
    $row=$conn->query($sql);
    $result=$row->fetch_assoc();
    echo "<h3>Album Title : ".$result['title']."</h3>";
    echo "<h2>Description :</h2><p> ".$result['description']."</p>";
    while($res=$im_ro->fetch_assoc())
    
    {
        
    ?>
   
    <img src="admin/<?=$res['img_url']?>" style="height:500px;width:400px;">


    

    <?php

    }
  
}
else
{
    echo "<h3> Invalid User </h3>";
}
?>

</body>
