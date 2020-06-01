<html>
<head>
    <link href="web.css" rel="stylesheet" type="text/css">
    <?php
    if (isset ($_POST['color'])){
        $color =  $_POST['color'];
    } else {
        $color = "";
    }if ($color == 1){
        $fontColor = "00FF00";
        $fontStyle = "verdana";
    } elseif ($color == 2){
        $fontColor = "FF0000";
        $fontStyle = "courier";
    } elseif ($color == 3){
        $fontColor = "0000FF";
        $fontStyle = "Times New Roman";
    } else {
        $fontcolor = "FFFFFF";
    }
    ?>
    <script>
        function customRandomFunction(min, max) {
            document.getElementById("hiddenValue").value
                = Math.floor(Math.random() * (max - min + 1)) + min;
        }
    </script>
</head>
<body style="background-color: <?php echo "$_REQUEST[background]"; ?>;
    font-family: <?php echo $fontStyle; ?>;">
<div>
    <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <select name="background">
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
        </select>
        <input type="hidden" id="hiddenValue"  name = "color" value="1">
        <input type = "submit" onclick = "customRandomFunction(1,3)">
    </form>  </div>
</body>
</html>

