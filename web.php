<?php
if (isset ($_POST['tableN'])) {
    $table_name = $_POST['tableN'];
} else {
    $table_name = "Table";}

if (isset ($_POST['align'])){
    $table_align =  $_POST['align'];
} else {
    $table_align = "left";}

if (isset ($_POST['border'])){
    $table_border =  $_POST['border'];
} else {
    $table_border = "3";}

if (isset ($_POST['width'])){
    $table_width =  $_POST['width'];
} else {
    $table_width = "50";}

if (isset ($_POST['link'])){
    $table_link =  $_POST['link'];
} else {
    $table_link = "link";}

function upload(){
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

// Check if image file is a actual image or fake image
    if(isset($_POST["submit"])) {
        $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
        if($check !== false) {
            echo "File is an image - " . $check["mime"] . ".";
            $uploadOk = 1;
        } else {
            echo "File is not an image.";
            $uploadOk = 0;
        }
    }

// Check if file already exists
    if (file_exists($target_file)) {
        echo "Sorry, file already exists.";
        $uploadOk = 0;
    }

// Check file size
    if ($_FILES["fileToUpload"]["size"] > 500000) {
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
    }

// Allow certain file formats
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif" ) {
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
    }

// Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
            echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }
}
if (isset ($_POST['fileToUpload'])){
    $table_img =  $_FILES["name"];
} else {
    $table_img = "picture.png";}
?>

<html>
<head>
    <link href="web.css" rel="stylesheet" type="text/css">
</head>
<body style="background-color: <?php echo "$_REQUEST[background]"; ?>;">
<div>
    <table border="<?php echo $table_border; ?>"
           cellpadding="15"
           bordercolor="<?php echo "$_REQUEST[border_color]"; ?>"
           align="<?php echo $table_align; ?>"
           style="background-color: <?php echo "$_REQUEST[table_background]"; ?>;
                  margin-top: 50px">
        <tr><th colspan="2" align="center"><b><?php echo $table_name; ?></b></th></tr>
        <tr colspan="2">&nbsp;</tr>
        <tr>
            <td width="<?php echo $table_width; ?>%" >
                <form action="loading_img.php"
                      method="post" enctype="multipart/form-data">
                    Image:
                    <input type="file" name="fileToUpload" id="fileToUpload"><br>
                    <input type="submit" value="Upload" name="submit">
                </form></td>
            <td width="(100-<?php echo $table_width; ?>)%">
                <a href="<?php echo $table_link; ?>">link</a>
            </td>
        </tr>
        <tr>
            <td >
                <form action="loading_files.php"
                      method="post" enctype="multipart/form-data">
                    Boot file:
                    <input type="file" name="fileToUpload" id="fileToUpload"><br>
                    <input type="submit" value="Upload" name="submit">
                </form>
            </td>
            <td >
                <form action="loading_files.php"
                      method="post" enctype="multipart/form-data">
                    Text file:
                    <input type="file" name="fileToUpload" id="fileToUpload"><br>
                    <input type="submit" value="Upload" name="submit">
                </form>
            </td>
        </tr>
        </table>
        <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <table border="1"  cellpadding="15" align="left"
               style="margin-top: 200px;
                      margin-left: 100px;">
            <tr><th>Title</th>
                <th><input type="text" name="tableN"></th>
                <th>Background color</th>
                <th><select name="background">
                        <option value = "">color</option>
                        <option value = "white">white</option>
                        <option value = "silver">silver</option>
                        <option value = "black">black</option>
                        <option value = "maroon">red</option>
                        <option value = "orange">orange</option>
                        <option value = "olive">yellow</option>
                        <option value = "lime">green</option>
                        <option value = "aqua">light blue</option>
                        <option value = "blue">blue</option>
                        <option value = "navy">dark blue</option>
                    </select></th>
            <th>Border size</th>
                <th><input type="text" name="border"></th></tr>
            <th>First cell width 0-100%</th>
                <th><input type="text" name="width"></th>
            <th>Table background</th>
                <th><select name="table_background">
                        <option value = "">color</option>
                        <option value = "white">white</option>
                        <option value = "silver">silver</option>
                        <option value = "black">black</option>
                        <option value = "maroon">red</option>
                        <option value = "orange">orange</option>
                        <option value = "olive">yellow</option>
                        <option value = "lime">green</option>
                        <option value = "aqua">light blue</option>
                        <option value = "blue">blue</option>
                        <option value = "navy">dark blue</option>
                    </select></th>
            <th>Link</th>
            <th><input type="text" name="link"></th>
            </tr>
            <tr><th>Border color</th>
                <th><select name="border_color">
                        <option value = "">color</option>
                        <option value = "white">white</option>
                        <option value = "silver">silver</option>
                        <option value = "black">black</option>
                        <option value = "maroon">red</option>
                        <option value = "orange">orange</option>
                        <option value = "olive">yellow</option>
                        <option value = "lime">green</option>
                        <option value = "aqua">light blue</option>
                        <option value = "blue">blue</option>
                        <option value = "navy">dark blue</option>
                    </select></th>
            <th>Align of the table</th>
                <th><select name="align">
                        <option value = "">align</option>
                        <option value = "right">right</option>
                        <option value = "left">left</option>
                    </select></th>
            <td colspan=2>
                    <center><input type="submit" value="result"></center></td></tr>
        </table>
    </form>
</div>
</body>
</html>

