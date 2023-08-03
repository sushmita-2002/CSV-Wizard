<!DOCTYPE html>
<html>
<head>
    <title>File Upload Success</title>
    <style>
        body {
            font-family: 'Times New Roman', Times, serif, sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 600px;
            margin: 50px auto;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
        }
        h2 {
            text-align: center;
            margin-bottom: 30px;
        }
        .success-message {
            color: black;
            /*font-weight: bold;*/
            text-align: center;
            margin-bottom: 20px;
        }
        .button-container {
            text-align: center;
        }
        .button {
            display: inline-block;
            background-color: grey;
            color: #fff;
            padding: 10px 20px;
            border-radius: 5px;
            text-decoration: none;
            margin-top: 10px;
        }
        .button:hover {
            background-color: #2980b9;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>File upload success</h2>
        <div class="success-message">
            <?php
            // Start the session
            session_start();

            // Check if the session contains the upload message
            if (isset($_SESSION["upload_message"])) {
                // Display the success message
                echo $_SESSION["upload_message"];

                // Clear the message from the session to prevent showing it again on subsequent uploads
                unset($_SESSION["upload_message"]);
            } else {
                // If there's no message in the session, redirect the user back to the upload page
                header("Location: upload.php");
                exit;
            }
            ?>
        </div>
        <div class="button-container">
            <a href="data.php" class="button">Want to know about data</a>
        </div>
    </div>
</body>
</html>
