<?php

include 'connect.php';

$recordsPerPage = 10; 
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1; 
$offset = ($page - 1) * $recordsPerPage; 

try {

    $totalRows = $pdo->query('SELECT COUNT(*) FROM survey_responses')->fetchColumn();
    $totalPages = ceil($totalRows / $recordsPerPage); 


    $stmt = $pdo->prepare('SELECT full_name, email_address, description, gender, programming_stack, certificates, date_responded FROM survey_responses LIMIT :limit OFFSET :offset');
    $stmt->bindParam(':limit', $recordsPerPage, PDO::PARAM_INT);
    $stmt->bindParam(':offset', $offset, PDO::PARAM_INT);
    $stmt->execute();

    $responses = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (\PDOException $e) {
    echo "Error: " . $e->getMessage();
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
      background: linear-gradient(135deg, #4d3319 0%, #1a1a00 100%); 
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      color: #fff;
    }

    #surveyResponses {
        max-width: 100%; 
        padding: 20px;
    }

    table {
        width: calc(100% - 40px);
        border-collapse: separate;
        border-spacing: 0;
        margin: 20px; 
        background-color: #fff; 
        color: #333;
        overflow: hidden; 
    }

    th, td {
        border-bottom: 1px solid #ddd; 
        padding: 8px;
        text-align: left;
    }

    th {
        background-color: #4F4F4F;
        color: white;
    }

    tr:last-child td {
        border-bottom: none; 
    }

    tr:hover {
        background-color:#5C4033;
        color: #FF0000;
    }

  
    @media (max-width: 600px) {
        table, th, td {
            display: block;
        }

        th, td {
            text-align: justify;
        }

        tr {
            margin-bottom: 10px; 
            border-radius: 10px; 
        }

        td {
            border: none;
            border-bottom: 1px solid #ddd;
            position: relative;
            padding-left: 50%; 
        }

        td:before {
           
            content: attr(data-label);
            position: absolute;
            left: 0;
            width: 45%;
            padding-left: 15px;
            font-weight: bold;
            text-align: left; 
        }
    }
</style>
</head>
<body>
    <div id="surveyResponses">
        <h1>Form Response Details</h1>
        <table>
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
                    <td><?= htmlspecialchars($row['full_name']); ?></td>
                    <td><?= htmlspecialchars($row['email_address']); ?></td>
                    <td><?= htmlspecialchars($row['description']); ?></td>
                    <td><?= htmlspecialchars($row['gender']); ?></td>
                    <td><?= htmlspecialchars($row['programming_stack']); ?></td>
                    <td>
                        <?php if (!empty($row['certificates'])): ?>
                            <?php foreach (explode(',', $row['certificates']) as $certificate): ?>
                                <a href="path/to/certificate/<?= htmlspecialchars($certificate); ?>" download><?= htmlspecialchars($certificate); ?></a><br>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </td>
                    <td><?= htmlspecialchars($row['date_responded']); ?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <div class="pagination">
            <?php for ($i = 1; $i <= $totalPages; $i++): ?>
                <a href="?page=<?= $i; ?>"><?= $i; ?></a>
            <?php endfor; ?>
        </div>
    </div>
</body>
</html>
