<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$recordsPerPage = 10;


$upload_dir_uri = 'http://localhost/simple_survey_client/uploads/';
$apiUrl = 'http://localhost/simple_survey_client/api.php?page=' . $page . '&records_per_page=' . $recordsPerPage;
$ch = curl_init($apiUrl);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));

$response = curl_exec($ch);
$err = curl_error($ch);
curl_close($ch);

$responses = [];
$totalPages = 1;
$totalRecords = 0;

if ($err) {
    echo "cURL Error #:" . $err;
} else {
    $result = json_decode($response, true);
    if (json_last_error() === JSON_ERROR_NONE) {
        $responses = isset($result['data']) ? $result['data'] : [];
        $totalPages = isset($result['total_pages']) ? $result['total_pages'] : 1;
        $currentPage = isset($result['current_page']) ? $result['current_page'] : $page;
        $totalRecords = isset($result['total_records']) ? $result['total_records'] : count($responses);
    } else {
        echo "Error: Invalid JSON response. JSON Error: " . json_last_error_msg();
        echo "\nRaw Response:\n";
        var_dump($response);
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Survey Responses</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
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
        color: #FFFFFF;
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
<center>
<body>
    <div id="surveyResponses" style="max-width: 100%; padding: 20px;">
        <h1>Form Response Details</h1>
        <table style="width: calc(100% - 40px); border-collapse: separate; border-spacing: 0; margin: 20px; background-color: #fff; color: #333; overflow: hidden;">
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
                                <ul class="list-unstyled">
                                    <?php foreach (explode(',', $row['certificates']) as $certificate): ?>
                                        <li>
                                            <a href="<?= $upload_dir_uri . htmlspecialchars(urlencode($certificate)); ?>" target="_blank" download>
                                                <?= htmlspecialchars($certificate); ?>
                                            </a>
                                        </li>
                                    <?php endforeach; ?>
                                </ul>
                            <?php endif; ?>
                        </td>
                        <td><?= htmlspecialchars($row['date_responded']); ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <nav aria-label="Page navigation example" class="d-flex justify-content-center">
            <ul class="pagination">
                <?php if ($page > 1): ?>
                    <li class="page-item"><a class="page-link" href="?page=<?= $page - 1; ?>">Previous</a></li>
                <?php endif; ?>
                <?php for ($i = 1; $i <= $totalPages; $i++): ?>
                    <li class="page-item <?= $i == $page ? 'active' : ''; ?>"><a class="page-link" href="?page=<?= $i; ?>"><?= $i; ?></a></li>
                <?php endfor; ?>
                <?php if ($page < $totalPages): ?>
                    <li class="page-item"><a class="page-link" href="?page=<?= $page + 1; ?>">Next</a></li>
                <?php endif; ?>
            </ul>
        </nav>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script