<?php
require_once 'connection.php';
require_once 'phpqrcode/qrlib.php';

if(isset($_REQUEST['sbt-btn'])) {
    $qrtext = $_REQUEST['qrtext'];

    // Generate the QR code image
    $qrcode = 'images/' . time() . '.png';
    QRcode::png($qrtext, $qrcode, 'H', 4, 4);

    // Read the image content to save it in the database
    $qrimage = file_get_contents($qrcode);

    // Insert the QR code data into the database
    $query = mysqli_prepare($connection, "INSERT INTO qrcode (qrtext, qrimage) VALUES (?, ?)");
    mysqli_stmt_bind_param($query, "ss", $qrtext, $qrimage);
    $result = mysqli_stmt_execute($query);

    if($result) {
        echo '<script>alert("Data saved successfully");</script>';
	sleep(2);
	header("Location: index.php"); // Redirect back to the welcome page
        exit();
    } else {
        echo '<script>alert("Failed to save data");</script>';
	
    }

    mysqli_stmt_close($query);
}

?>