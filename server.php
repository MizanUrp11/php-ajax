<?php

$conn = mysqli_connect('localhost','root','','ajax');

if(!$conn){
    die('Not connected'.mysqli_error($conn));
}

if(isset($_POST['save'])){
    $name = $_POST['name'];
    $comment = $_POST['comment'];
    $sql = "INSERT INTO comments (`name`,`comment`) VALUES ('{$name}','{$comment}')";
    if(mysqli_query($conn,$sql)){
        $id = mysqli_insert_id($conn);
        $saved_comments = '
        <div class="comment_box">
        <span class="edit" data-id="'.$id.'">Edit</span>
        <span class="delete" data-id="'.$id.'">Delete</span>
        <div class="display_name">'.$name.'</div>
        <div class="comment_text">'.$comment.'</div>
        </div>
        ';
        echo $saved_comments;
    }else{
        echo "Error: ".mysqli_error($conn);
    }
    exit();
}

if(isset($_POST['delete'])){
    $id = $_POST['id'];
    $sql = "DELETE FROM comments WHERE id={$id}";
    if(mysqli_query($conn,$sql)){
        echo "deleted";
    }else{
        echo "Error: ".mysqli_error($conn);
    }
}

if(isset($_POST['update'])){
    $id = $_POST['id'];
    $name = $_POST['name'];
    $comment = $_POST['comment'];
    $sql = "UPDATE comments SET `name` = '{$name}', `comment` = '{$comment}' WHERE `comments`.`id` = {$id}";
    if(mysqli_query($conn,$sql)){
        $id = mysqli_insert_id($conn);
        $saved_comments = '
            <div class="comment_box">
                <span class="edit" data-id="'.$id.'">Edit</span>
                <span class="delete" data-id="'.$id.'">Delete</span>
                <div class="display_name">'.$name.'</div>
                <div class="comment_text">'.$comment.'</div>
            </div>
        ';
        echo $saved_comments;
    }else{
        echo "Error: ".mysqli_error($conn);
    }
    exit();
}

$sql = "SELECT * FROM comments";
$result = mysqli_query($conn,$sql);
$comments = '<div class="display_area">';
while ($row = mysqli_fetch_assoc($result)){
    $comments .= '
        <div class="comment_box">
            <span class="edit" data-id="'.$row['id'].'">Edit</span>
            <span class="delete" data-id="'.$row['id'].'">Delete</span>
            <div class="display_name">'.$row['name'].'</div>
            <div class="comment_text">'.$row['comment'].'</div>
        </div>
    ';
}
$comments .= '</div>';
echo $comments;
























