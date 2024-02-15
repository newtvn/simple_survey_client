<?php
include 'db.php'; // Assumes you have a db.php file for database connection

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['csvFile'])) {
    $targetDirectory = "uploads/";
    $targetFile = $targetDirectory . basename($_FILES['csvFile']['name']);
    $fileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

    // Validate file is a CSV
    if ($fileType != "csv") {
        echo "Only CSV files are allowed.";
        exit;
    }

    // Attempt to upload file
    if (move_uploaded_file($_FILES['csvFile']['tmp_name'], $targetFile)) {
        // Process CSV file

        function insertData($id, $name, $email) {
            global $conn; // Use the connection from db.php
            $sql = "INSERT INTO csv_data (id, name, email) VALUES (?, ?, ?)";
        
            try {
                $stmt = $conn->prepare($sql);
                $stmt->execute([$id, $name, $email]);
                // echo "New record created successfully";
            } catch(PDOException $e) {
                echo $sql . "<br>" . $e->getMessage();
            }
        }
        

        processCSV($targetFile);
    } else {
        echo "There was an error uploading your file.";
    }
} else {
    echo "No file uploaded.";
}

function processCSV($filePath) {
    // Open the file for reading
    if (($handle = fopen($filePath, "r")) !== FALSE) {
        while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
            // Assuming CSV columns: ID, Name, Email, etc.
            // Validate and process $data here
            // For example, validate data then insert into database
        }
        fclose($handle);
        echo "File has been processed successfully.";
    } else {
        echo "Error opening the file.";
    }
}
?>
