<?php
// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $targetDir = "C:/xampp/htdocs/Training2023/uploads/"; 
    $targetFile = $targetDir . basename($_FILES["fileToUpload"]["name"]);
    $uploadOk = 1;
    $fileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

    // Check if the file is a CSV file
    if ($fileType != "csv") {
        echo "Only CSV files are allowed.";
        $uploadOk = 0;
    }

    // Check if file already exists
    if (file_exists($targetFile)) {
        echo "Sorry, file already exists.";
        $uploadOk = 0;
    }

    // Check if the file was uploaded successfully
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
    } 
    else {
        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $targetFile)) {
            //echo "The file " . basename($_FILES["fileToUpload"]["name"]) . " has been uploaded successfully.";
            // Now, read the CSV file and insert data into the database
            $servername = "localhost"; // Change to your MySQL server address
            $username = "root"; // Change to your MySQL username
            $password = ""; // Change to your MySQL password
            $dbname = "csv_bd"; // Change to your MySQL database name

            // Create connection
            $conn = new mysqli($servername, $username, $password, $dbname);

            // Check connection
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }
            

            // Create the table to store CSV data (if not already created)
            /*
            $sql = "CREATE TABLE IF NOT EXISTS csv_data (
                col0 INT(255) AUTO_INCREMENT PRIMARYKEY;
                col1 VARCHAR(255),
                col2 INT(255),
                col3 INT(255),
                col4 VARCHAR(255),
                col5 VARCHAR(255),
                col6 VARCHAR(255),
                col7 VARCHAR(255),
            )";
            
            if ($conn->query($sql) === false) {
                echo "Error creating table: " . $conn->error;
            }
            */
            

            // Read data from CSV and insert into the table
            if (($handle = fopen($targetFile, "r")) !== false) {
                while (($data = fgetcsv($handle, 1000, ",")) !== false) {
                    $col1 = $data[0];
                    $col2 = $data[1];
                    $col3 = $data[2];
                    $col4 = $data[3];
                    $col5 = $data[4];
                    $col6 = $data[5];
                    $col7 = $data[6];
                    
                    $sql = "INSERT INTO csv_data (col1,col2,col3,col4,col5,col6,col7) VALUES ('$col1', '$col2','$col3','$col4','$col5','$col6','$col7')";
                    
                    if ($conn->query($sql) == false) {
                        echo "Error inserting data: " . $conn->error;
                    }
                }
                fclose($handle);
            } else {
                echo "Error reading CSV file.";
            }

            $conn->close();

            session_start();

            // Check if the form was submitted
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                // After successfully moving the uploaded file and inserting data, set the success message in the session
                $_SESSION["upload_message"] = "The file " . basename($_FILES["fileToUpload"]["name"]) . " has been uploaded successfully.";

                // Redirect the user to another page
                header("Location: another_page.php");
                exit;
            }
        }
        else {
            echo "Sorry, there was an error uploading your file.";
        }
    } 
}
?>



