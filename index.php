<?php
require "server.php";
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<div class="wrapper">
    <div id="display_area"></div>
    <form class="comment_form">
        <div>
            <label for="name">Name</label>
            <input type="text" name="name" id="name">
        </div>
        <div>
            <label for="comment">Comment</label>
            <textarea name="comment" id="comment" cols="30" rows="10"></textarea>
        </div>
        <button type="button" id="submit_btn">Submit</button>
        <button type="button" id="update_btn" style="display: none">Update</button>
    </form>
</div>

<script src="js/jquery-3.5.1.min.js"></script>
<script src="js/script.js"></script>
</body>
</html>