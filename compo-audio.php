<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../styles/w3.css">
</head>
<body>
<?php
// required files
require_once("db_connection.php");

//variables
$fileid = isset($_GET["fileid"])?$_GET["fileid"]: null;

// file query
$sql = " SELECT sysname from files where id = $fileid and filetype = 'audio' ";
$res = $conn->query($sql);
if ( $res->num_rows ){
    $row = $res->fetch_array(MYSQLI_ASSOC);
    $sysname = $row['sysname'];
    echo "<audio src=\"../uploads/audios/" .$sysname. "\" width=\"100%\" height=\"100%\" controls></audio> ";
}else{
    // not found in the database
    echo "No Audio File.";
}
?>
</body>
</html>