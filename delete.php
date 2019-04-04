<?php

// Get IDs
$reply_id = filter_input(INPUT_POST, 'reply_id', FILTER_VALIDATE_INT);
delete_reply($reply_id);

// Delete the reply from the database
function delete_reply($reply_id){
    
    try {
        include("database.php");
    } catch (PDOException $e) {
        $error_message = $e->getMessage();
        include('database_error.php');
        exit();
    }
    $db = Database::getDB();
    if ($reply_id != false) {
    $query = 'DELETE FROM replies
              WHERE ReplyID = :reply_id';
    $statement = $db->prepare($query);
    $statement->bindValue(':reply_id', $reply_id);
    $success = $statement->execute();
    $statement->closeCursor();    
    }
}


//Display the reply List page
include('admin.php');