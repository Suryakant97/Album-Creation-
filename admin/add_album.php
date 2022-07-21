<head>
<link rel="stylesheet" href="css/nav.css">
</head>
<body>
<?php
session_start();

include 'config/conn.php';

if(isset($_POST["submit"]))
{
    $title=$_POST["title"];
    $desc=$_POST["desc"];
    $stat =$_POST["stat"];
    $typ =$_POST["type"];

    $sql="INSERT INTO album (title,description,status,type) values('$title','$desc','$stat','$typ') ";

    if($conn->query($sql))
    {
        $last_id = $conn->insert_id;

    $upload_dir = 'img/';
    
    if(!empty(array_filter($_FILES['img']['name']))) {
 
        
        foreach ($_FILES['img']['tmp_name'] as $key => $value) {
             
            $file_tmpname = $_FILES['img']['tmp_name'][$key];
            $file_name = $_FILES['img']['name'][$key];
           
            $file_ext = pathinfo($file_name, PATHINFO_EXTENSION);
 
          
            $filepath = $upload_dir.$file_name;

            move_uploaded_file($file_tmpname, $filepath);

            $sql="insert into image(album_id,img_url) values('$last_id','$filepath') ";

            $conn->query($sql);
           
        }
    }
}
  

}

if (isset($_SESSION['user'])) 
{
    include 'header.php';
?>

   
    <form action="" method="post"  enctype="multipart/form-data">

        <label for="title">Title</label>
        <input type="text" id="title" name="title"><br>

        <label for="desc">Description</label>
        <textarea id="desc" name="desc">    </textarea><br>

        <label for="img">Select Image:</label>
        <input type="file" id="img" name="img[]"  multiple/><br>
    
        <label for="stat">Status</label>
        <select id="stat" name="stat">
            <option>select</option>
            <option>Published</option>
            <option>UnPublished</option>
        </select><br>

        <label for="typ">Type</label>
        <select id="typ" name="type">
            <option>select</option>
            <option>Normal</option>
            <option>Premium</option>
        </select><br>
        <input type="submit" name="submit" value="SAVE">
        
    
    </form>
<?php
}
else
{
    echo "<h3> Invalid User </h3>";
}                                       
?>
</body>