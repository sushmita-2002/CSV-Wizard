<!DOCTYPE html>
<html>
<head>
    <title>Duplicate Entries in MySQL Table</title>
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
        <h2>Duplicate Entries in Table</h2>
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

        // SQL query to count duplicates based on specific columns (col1, col2, col3, etc.)
        $sql = "SELECT COUNT(*) AS duplicate_count
                FROM csv_data
                GROUP BY col1, col2, col3, col4, col5,col6,col7
                HAVING COUNT(*) > 1";

        // Execute the query and store the result in $result
        $result = $conn->query($sql);

        if ($result) {
            // Count the number of duplicate rows
            $duplicate_count = $result->num_rows;

            // Display the duplicate count
            echo "<div class='result'>Number of duplicate entries: " . $duplicate_count . "</div>";

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
