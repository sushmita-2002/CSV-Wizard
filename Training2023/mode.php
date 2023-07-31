<!DOCTYPE html>
<html>
<head>
    <title>Mode of payment</title>
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
        $sql1 = "SELECT * FROM csv_data where col7='INB'";
        $sql2 = "SELECT * FROM csv_data where col7='BILLDESK'";
        $sql3 = "SELECT * FROM csv_data where col7='UPI'";
        $sql4 = "SELECT * FROM csv_data where col7='SBDebit'";
        $sql5 = "SELECT * FROM csv_data where col7='OtherDebit'";
        
        // Execute the query and store the result in $result
        $result1 = $conn->query($sql1);
        $result2 = $conn->query($sql2);
        $result3 = $conn->query($sql3);
        $result4 = $conn->query($sql4);
        $result5 = $conn->query($sql5);
        
        if ($result1) {
            // Count the number of duplicate rows
            $INB_count = $result1->num_rows;

            // Display the duplicate count
            echo "<div class='result'>Number of Transactions done with INB: " . $INB_count . "</div>";

            // If you want to display the actual duplicate rows, you can do so here
            // You can use the same query with a different approach to fetch the duplicate rows if needed
        } else {
            echo "Error executing query: " . $conn->error;
        }

        if ($result2) {
            // Count the number of duplicate rows
            $bill_count = $result2->num_rows;

            // Display the duplicate count
            echo "<div class='result'>Number of Transactions done with BILLDESK : " . $bill_count . "</div>";

            // If you want to display the actual duplicate rows, you can do so here
            // You can use the same query with a different approach to fetch the duplicate rows if needed
        } else {
            echo "Error executing query: " . $conn->error;
        }

        if ($result3) {
            // Count the number of duplicate rows
            $UPI_count = $result3->num_rows;

            // Display the duplicate count
            echo "<div class='result'>Number of Transactions done with UPI: " . $UPI_count . "</div>";

            // If you want to display the actual duplicate rows, you can do so here
            // You can use the same query with a different approach to fetch the duplicate rows if needed
        } else {
            echo "Error executing query: " . $conn->error;
        }

        if ($result4) {
            // Count the number of duplicate rows
            $SB_count = $result4->num_rows;

            // Display the duplicate count
            echo "<div class='result'>Number of Transactions done with SBDebit: " . $SB_count . "</div>";

            // If you want to display the actual duplicate rows, you can do so here
            // You can use the same query with a different approach to fetch the duplicate rows if needed
        } else {
            echo "Error executing query: " . $conn->error;
        }

        if ($result5) {
            // Count the number of duplicate rows
            $other_count = $result5->num_rows;

            // Display the duplicate count
            echo "<div class='result'>Number of Transactions done with Other Debit card: " . $other_count . "</div>";

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
