<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Survey Responses</title>
    <link rel="stylesheet" href="css/style.css">

    <style>
        #surveyResponses {
            max-width: 800px;
            margin: auto;
            padding: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        table, th, td {
            border: 1px solid #ddd;
        }
        th, td {
            padding: 10px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        tr:nth-child(even) {
            background-color: #f9f9f9;
        }
        tr:hover {
            background-color: #eaeaea;
        }
        h1 {
            text-align: center;
        }
    </style>

</head>
<body>
    <div id="surveyResponses">
        <h1>Form Response Details</h1>
        <?php
        
        $host = 'localhost';
        $db = 'your_database_name';
        $user = 'your_username';
        $pass = 'your_password';
        $charset = 'utf8mb4';

        $dsn = "mysql:host=$host;dbname=$db;charset=$charset";
        $options = [
            PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES   => false,
        ];

        try {
            $pdo = new PDO($dsn, $user, $pass, $options);
        } catch (\PDOException $e) {
            throw new \PDOException($e->getMessage(), (int)$e->getCode());
        }

        // Query to fetch survey responses
        $stmt = $pdo->query('SELECT full_name, email_address, description, gender, programming_stack, certificates, date_responded FROM your_table_name');

        while ($row = $stmt->fetch()) {
            echo "<p><strong>Full Name:</strong> " . htmlspecialchars($row['full_name']) . "</p>";
            echo "<p><strong>Email Address:</strong> " . htmlspecialchars($row['email_address']) . "</p>";
            echo "<p><strong>Description:</strong> " . htmlspecialchars($row['description']) . "</p>";
            echo "<p><strong>Gender:</strong> " . htmlspecialchars($row['gender']) . "</p>";
            echo "<p><strong>Programming Stack:</strong> " . htmlspecialchars($row['programming_stack']) . "</p>";
            
            // Assuming 'certificates' is stored as a comma-separated string
            $certificates = explode(',', $row['certificates']);
            echo "<h2>Certificates</h2><ul>";
            foreach ($certificates as $certificate) {
                echo "<li>" . htmlspecialchars($certificate) . "</li>";
            }
            echo "</ul>";

            echo "<p><strong>Date Responded:</strong> " . htmlspecialchars($row['date_responded']) . "</p>";
        }
        ?>
    </div>
    <script src="js/script.js"></script>
</body>
</html>
