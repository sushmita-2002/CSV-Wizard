<!DOCTYPE html>
<html>
<head>
    <title>Table Viewer</title>
    <style>
        body {
            font-family: Times New Roman', Times, serif, sans-serif;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid #ccc;
            padding: 8px;
            text-align: center;
        }
        th {
            background-color: #f2f2f2;
        }
        h2 {
            text-align: center;
            margin-bottom: 25px;
        }
    </style>
</head>
<body>
    <h2>Data of CSV file</h2>
    <?php
    
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "csv_bd";
    $table_name = "csv_data"; 

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // SQL query to fetch data from the table
    $sql = "SELECT * FROM $table_name";

    // Execute the query and store the result in $result
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Display the table header with column names
        echo "<table>";
        echo "<tr>";
        while ($field_info = $result->fetch_field()) {
            echo "<th>" . $field_info->name . "</th>";
        }
        echo "</tr>";

        // Display each row of the table
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            foreach ($row as $value) {
                echo "<td>" . $value . "</td>";
            }
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "No data found in the table.";
    }

    // Close the database connection
    $conn->close();
    ?>
</body>
</html>
