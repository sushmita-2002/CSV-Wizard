<!DOCTYPE html>
<html>
<head>
    <title>payment Status</title>
    <style>
        body {
            font-family: Times New Roman', Times, serif, sans-serif;
        }
        .container {
            max-width: 600px;
            margin: 50px auto;
            background-color: #f0f0f0;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .result {
            font-size: 18px;
            margin-bottom: 20px;
        }
        h2 {
            text-align: center;
            margin-bottom: 30px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Payment Status</h2>
        <?php
        // Replace the database connection credentials with your own
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "csv_bd";

        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // SQL query to check payment status
        $sql1 = "SELECT * FROM csv_data where col5='Success'";
        $sql2 = "SELECT * FROM csv_data where col5='Failed'";

        // Execute the query and store the result in $result
        $result1 = $conn->query($sql1);
        $result2 = $conn->query($sql2);

        if ($result1) {
            // Count the number of duplicate rows
            $success_count = $result1->num_rows;

            // Display the duplicate count
            echo "<div class='result'>Number of Successful Transactions: " . $success_count . "</div>";

            // If you want to display the actual duplicate rows, you can do so here
            // You can use the same query with a different approach to fetch the duplicate rows if needed
        } else {
            echo "Error executing query: " . $conn->error;
        }

        if ($result2) {
            // Count the number of duplicate rows
            $failed_count = $result2->num_rows;

            // Display the duplicate count
            echo "<div class='result'>Number of Failed Transactions: " . $failed_count . "</div>";

            // If you want to display the actual duplicate rows, you can do so here
            // You can use the same query with a different approach to fetch the duplicate rows if needed
        } else {
            echo "Error executing query: " . $conn->error;
        }


        // Close the database connection
        $conn->close();
        ?>
    </div>
</body>
</html>
