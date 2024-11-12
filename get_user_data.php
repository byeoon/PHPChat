<?php
session_start();
require_once('db_conn.php');

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $query = "SELECT * FROM userTable WHERE status = 'online'";
    $result = $conn->query($query);

    if ($result) {
        $onlineMembers = array();
        while ($row = $result->fetch_assoc()) {
            $onlineMembers[] = array(
                'id' => $row['userID'],
                'profile_picture' => $row['profile_picture'],
                'username' => $row['username'],
                'afk' => $row['afk'],
                'messageStatus' => $row['messageStatus'],
                'isAdmin' => $row['isAdmin'],
                'bio' => $row['bio']
            );
        }
        header('Content-Type: application/json');
        echo json_encode($onlineMembers);
    } else {
        echo json_encode(array('error' => 'Error fetching online members'));
    }
    $conn->close();
}
?>
