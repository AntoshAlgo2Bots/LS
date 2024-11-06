<?php


include "../dbconnection/db.php" ;

function getTableData($tableName) {

    global $con;

    $conn = $con;


    if ($conn->connect_error) {
        error_log("Connection failed: " . $conn->connect_error);
        return ["success" => false, "message" => "Database connection failed"];
    }

    // Sanitize table name to prevent SQL injection
    $tableName = $conn->real_escape_string($tableName);

    // Query to fetch data
    $sql = "SELECT * FROM $tableName";
    $result = $conn->query($sql);

    // Check for query success
    if ($result) {
        if ($result->num_rows > 0) {
            // Fetch data and store in an array
            $data = [];
            while ($row = $result->fetch_assoc()) {
                $data[] = $row;
            }
            $conn->close();
            return ["success" => true, "data" => $data];
        } else {
            $conn->close();
            return ["success" => false, "message" => "No data found in table '$tableName'"];
        }
    } else {
        error_log("Query failed: " . $conn->error);
        $conn->close();
        return ["success" => false, "message" => "Error executing query"];
    }
}



function getTableDataById($tableName, $columnName, $id) {
    global $con;

    $conn = $con;

    if ($conn->connect_error) {
        error_log("Connection failed: " . $conn->connect_error);
        return ["success" => false, "message" => "Database connection failed"];
    }

    // Prepare and bind
    $stmt = $conn->prepare("SELECT * FROM $tableName WHERE $columnName = ?");
    if ($stmt === false) {
        error_log("Prepare failed: " . $conn->error);
        return ["success" => false, "message" => "Error preparing query"];
    }

    // Bind parameters
    $stmt->bind_param("i", $id);

    // Execute the statement
    if ($stmt->execute() === false) {
        error_log("Execute failed: " . $stmt->error);
        return ["success" => false, "message" => "Error executing query"];
    }

    // Get result
    $result = $stmt->get_result();

    // Fetch data
    if ($result->num_rows > 0) {
        $data = [];
        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }
        $stmt->close();
        return ["success" => true, "data" => $data];
    } else {
        $stmt->close();
        return ["success" => false, "message" => "No data found in table '$tableName'"];
    }
}


?>