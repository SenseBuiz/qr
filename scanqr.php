<!DOCTYPE html>
<html>
<head>
    <title>QR Code Scanner</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"/>
    <style>
        #video-preview {
            width: 800px;
            height: 400px;
            display: none; /* Initially hide the video feed */
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-3 text-center">
                <h2>Click 'Start Scan' button to scan your QR</h2>
                <h2>Click 'Stop' button to end scanning</h2>
                <h3>After the camera opens, show a QR code. Note: You can scan one QR at a time. If you want to scan another, click 'Start Scan' again.</h3>
                <br>
                <!-- Label to show the scanned QR code text or match status -->
                <label id="qr-result"></label>

                <!-- Buttons for starting and ending the scan -->
                <form action="#" method="post">
                    <input type="button" id="start-scan-btn" value="Start Scan" class="btn btn-success">
                    <input type="submit" name="end-scan-btn" value="Stop" class="btn btn-danger">
                </form>

                <!-- Video element for displaying webcam feed -->
                <video id="video-preview" playsinline></video>
            </div>
        </div>
    </div>

    <script>
        // Function to start the webcam and display the video feed
        async function startCamera() {
            try {
                const stream = await navigator.mediaDevices.getUserMedia({ video: { facingMode: 'environment' } });
                const videoPreview = document.getElementById('video-preview');
                videoPreview.srcObject = stream;
                videoPreview.play(); // Start playing the video
                videoPreview.style.display = 'block'; // Show the video feed
		
		// Wait for the video to load properly
                videoPreview.onloadedmetadata = function() {
                    scanQR(videoPreview);
                }
	
            } catch (err) {
                console.error("Error accessing the camera:", err);
            }
        }

	// Function(scanQr) to  scan  QR codes from the video feed  (web cam) and send data to datasend() function

	
	// this datasend() Function is  to send data for check_scan.php to match saved data in phpmyadmin college_db in qrcode table 

        // Event listener for the 'Start Scan' button
        document.getElementById('start-scan-btn').addEventListener('click', startCamera);
    </script>
</body>
</html>