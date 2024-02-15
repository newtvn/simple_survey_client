<?php
// Include the database connection file. Ensure that 'connect.php' contains the correct PDO connection code.
include 'connect.php';


// Query to fetch survey responses from the 'respondent' table
try {
    $stmt = $pdo->query('SELECT full_name, email_address, description, gender, programming_stack, certificates, date_responded FROM survey_responses');

    $responses = []; // Initialize an array to hold the responses

    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        // Push each fetched row to the responses array
        array_push($responses, $row);
    }
} catch (\PDOException $e) {
    // Handle the error appropriately
    echo "An error occurred: " . $e->getMessage();
    exit;
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Survey Responses</title>
    <style>
        body {
            background-color: #3E2723; /* dark brown */
            color: #fff; /* white text for contrast */
            font-family: Arial, sans-serif; /* standard font */
        }

        #surveyResponses {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            background-color: #fff; /* white background for the table */
            color: #333; /* dark text for readability */
        }

        th, td {
            border: 1px solid #ddd; /* light border for the cells */
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #4F4F4F; /* darker shade for headers */
            color: white;
        }

        /* Style adjustments for mobile responsiveness */
        @media (max-width: 600px) {
            .responsive-table {
                display: block;
                overflow-x: auto;
            }
        }
    </style>
</head>
<body>
    <div id="surveyResponses">
        <h1>Form Response Details</h1>
        <table class="responsive-table">
            <thead>
                <tr>
                    <th>Full Name</th>
                    <th>Email Address</th>
                    <th>Description</th>
                    <th>Gender</th>
                    <th>Programming Stack</th>
                    <th>Certificates</th>
                    <th>Date Responded</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($responses as $row): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($row['full_name']); ?></td>
                        <td><?php echo htmlspecialchars($row['email_address']); ?></td>
                        <td><?php echo htmlspecialchars($row['description']); ?></td>
                        <td><?php echo htmlspecialchars($row['gender']); ?></td>
                        <td><?php echo htmlspecialchars($row['programming_stack']); ?></td>
                        <td>
                            <?php if (!empty($row['certificates'])): ?>
                                <?php foreach (explode(',', $row['certificates']) as $certificate): ?>
                                    <?php echo htmlspecialchars($certificate) . "<br>"; ?>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </td>
                        <td><?php echo htmlspecialchars($row['date_responded']); ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <script src="js/script.js"></script>
</body>
</html>
