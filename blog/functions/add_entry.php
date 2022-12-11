<?php 
include 'connection.php';

    $foreign_key = $_POST['foreign_box'];
    $entry_title = $_POST['title_box'];
    $entry_content = $_POST['content_box'];
    $entry_date = $_POST['date_box'];

    // single quote error fix
    $entry_title = str_replace("'", "\'", $entry_title);
    $entry_content = str_replace("'", "\'", $entry_content);

    $sql = "INSERT INTO blogs (user_foreign_key, entry_title, entry_content, entry_date) VALUES ('$foreign_key', '$entry_title', '$entry_content', '$entry_date');";
    mysqli_query($conn, $sql);

    header("Location: user-profile.php");

?>