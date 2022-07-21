<head>
<link rel="stylesheet" href="css/nav.css">
</head>
<body><?php
session_start();

include 'config/conn.php';


if (isset($_SESSION['user'])) 
{

    include 'header.php';
    ?>
       
  <table style="border: 1px solid;">
    <tr >
        <th>Image</th><th>Title</th><th>Description</th><th>Status</th><th>Type</th>
    </tr>
    <?php
      $sql="select * from album";
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

                    <img src="<?=$res['img_url']?>" style="height:150px;width:100px;">
                </a>
            </td>
            <td>  
                <?=$result['title']?>
            </td>
            <td>  
                <?=$result['description']?>
            </td>

            <td>
                <select class="stat" data-al="<?=$result['id']?>" >
                    <?php
                    if($result["status"]=="Published")
                    {?>
                        <option>Published</option>
                          <option>UnPublished</option>
                    <?php
                    }
                    else{
                            ?>
                            <option>UnPublished</option>
                         <option>Published</option>
                          
                    <?php
                        }
                    ?>
            </td>
            <td>
                <select class="typ" data-al="<?=$result['id']?>">
                    <?php
                    if($result["type"]=="Normal")
                    {?>
                        <option>Normal</option>
                         <option>Premium</option>
                    <?php
                    }
                    else{
                            ?>
                             
                            <option>Premium</option>
                            <option>Normal</option>
                          
                    <?php
                        }
                    ?>
            </td>
      </tr>
        <?php
      }
    }
  
  
    

}
else
{
    echo "<h3> Invalid User </h3>";
}
?>
<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</head>
<script>
$( ".stat" ).change(function() {
    s=$(this).val();
    id=$( this ).data("al") ;
    act="status";
    $.ajax({
        url: "update.php",
       
        method: "POST",
        data:{
            action:act,
            stat:s,
            id:id,
           
        }
    }).then(function(){
        location.reload();
});

});

$( ".typ" ).change(function() {
    s=$(this).val();
    id=$( this ).data("al") ;
    act="type";
    $.ajax({
        url: "update.php",
        
        method: "POST",
        data:{
            action:act,
            typ:s,
            id:id,
           
        }
    }).then(function(){
        location.reload();
    });

});
</script>
</body>