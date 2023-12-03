<!DOCTYPE html>
<html>
<head>
    <title>Welcome to QR Code Generator</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"/>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-3 text-center">
                <h2>Welcome to QR Code Generator</h2>
                <p>Click the button below to start generating QR codes.</p>
                <form action="qrgenform.php" method="post"> <!-- Changed the action to qrgenform.php -->
                    <input type="submit" name="start-btn" value="Start" class="btn btn-primary">
                </form>
            </div>
        </div>
        <hr> <!-- Adding a horizontal line for separation -->
        <div class="row">
            <div class="col-md-6 col-md-offset-3 text-center">
                <h3>Scan QR Code</h3>
                <p>Click the button below to scan QR codes.</p>
                <form action="scanqr.php" method="post">
                    <input type="submit" name="scan-btn" value="Scan QR" class="btn btn-success">
                </form>
            </div>
        </div>
    </div>
</body>
</html>