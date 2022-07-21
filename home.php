<?php
session_start();

include 'config/conn.php';


if ((isset($_SESSION['user']))&& ($_SESSION['user']=="user")) 
{

    ?>
  
<head>
<link rel="stylesheet" href="admin/css/nav.css">
</head>
<body>
    <ul>
        <li><a class="active" href="home.php">Home</a></li>
        <li><a href="logout.php"> Logout</a></li>
    </ul>
  <body>

  <br>
  <table style="border: 1px solid;">
    <tr >
        <th>Image</th><th>Title</th><th>Description</th>
    </tr>
    <?php
      $sql="select * from album where status='Published' and type='".$_SESSION['type']." '";
      $row=$conn->query($sql);
      if($row->num_rows>0){
      while($result=$row->fetch_assoc())
      {
        ?>
        <tr id="<?=$result['id']?>" >
            <td>  
                <?php
                $sql="select * from image where album_id=".$result['id'];
                $im_ro=$conn->query($sql);
                $res=$im_ro->fetch_assoc();

                ?>
                 <a href="show_gallery.php?id=<?=$result['id']?>">

                    <img src="admin/<?=$res['img_url']?>" style="height:150px;width:100px;">
                </a>
            </td>
            <td>  
                <?=$result['title']?>
            </td>
            <td>  
                <?=$result['description']?>
            </td>

           
      </tr>

        <?php
      }
    }
    ?>
    
  </table>
    <?php

  
  
    

}
else
{
    echo "<h3> Invalid User </h3>";
}
?>
</body>