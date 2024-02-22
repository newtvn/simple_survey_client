<?php
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
    exit;<?php
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
    
    
    
    <script>
    function filterRecords() {
        var input, filter, table, tr, td, i, txtValue;
        input = document.getElementById("searchInput");
        filter = input.value.toUpperCase();
        table = document.getElementById("responsesTable"); // Make sure the ID matches your table
        tr = table.getElementsByTagName("tr");
    
        for (i = 1; i < tr.length; i++) { // Start at 1 to skip the header row
            td = tr[i].getElementsByTagName("td")[1]; // Index 1 is the second column which should be the email address
            if (td) {
                txtValue = td.textContent || td.innerText;
                if (txtValue.toUpperCase().indexOf(filter) > -1) {
                    tr[i].style.display = "";
                } else {
                    tr[i].style.display = "none";
                }
            }       
        }
    }
    </script>
    
    
    
    
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
        <title>Survey Responses</title>
        <style>
        body {
          background: linear-gradient(135deg, #4d3319 0%, #1a1a00 100%); 
          font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
          color: #fff;
        }
    
        #surveyResponses {
            max-width: 100%; /* Allows the div to use full width */
            padding: 20px; /* Adds padding around the content */
        }
    
        table {
            width: calc(100% - 40px); /* Adjusts width to account for padding */
            border-collapse: separate;
            border-spacing: 0;
            margin: 20px; /* Adds margin around the table */
            background-color: #fff; /* white background for the table */
            color: #333; /* dark text for readability */
            border-radius: 10px; /* rounded corners for the table */
            overflow: hidden; /* Ensures the rounded corners are respected */
        }
    
        th, td {
            border-bottom: 1px solid #ddd; /* light border for the cells */
            padding: 8px;
            text-align: left;
        }
    
        th {
            background-color: #4F4F4F; /* darker shade for headers */
            color: white;
        }
    
        tr:last-child td {
            border-bottom: none; /* Removes bottom border from the last row */
        }
    
        tr:hover {
            background-color:#5C4033;
            color: #FF0000;
        }
    
        /* Improves table responsiveness without forcing it to a specific viewport width */
        @media (max-width: 600px) {
            table, th, td {
                display: block;
            }
    
            th, td {
                text-align: justify; /* Adjust text alignment for readability */
            }
    
            tr {
                margin-bottom: 10px; /* Adds space between rows */
                border-radius: 10px; /* Maintains rounded corners */
            }
    
            td {
                border: none; /* Removes individual cell borders */
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
            <h1><center>Form Response Details</center></h1>
    
    
            <nav class="navbar navbar-expand-lg bg-body-tertiary">
      <div class="container-fluid">
        <a class="navbar-brand" href="#">Survery Database</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
                
    <button>
              <a class="nav-link active" aria-current="page" href="http://localhost/simple_survey_client/survey%20form.php">Home</a>
    </button>
            </li>
          </ul>
          <form class="d-flex" role="search">
            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success" type="submit">Search</button>
          </form>
        </div>
      </div>
    </nav>
    
    
    
    
            <table id="responsesTable" class="responsive-table">
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
                        <a href="path/to/uploads/<?php echo htmlspecialchars($certificate); ?>" download>
                            <?php echo htmlspecialchars($certificate); ?>
                        </a><br>
                    <?php endforeach; ?>
                <?php endif; ?>
            </td>
            <td><?php echo htmlspecialchars($row['date_responded']); ?></td>
        </tr>
    <?php endforeach; ?>
    
    
    </tbody>
    
            </table>
            </table>
        </div>
        <script src="js/script.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    </body>
    </html>
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
        max-width: 100%; /* Allows the div to use full width */
        padding: 20px; /* Adds padding around the content */
    }

    table {
        width: calc(100% - 40px); /* Adjusts width to account for padding */
        border-collapse: separate;
        border-spacing: 0;
        margin: 20px; /* Adds margin around the table */
        background-color: #fff; /* white background for the table */
        color: #333; /* dark text for readability */
        border-radius: 10px; /* rounded corners for the table */
        overflow: hidden; /* Ensures the rounded corners are respected */
    }

    th, td {
        border-bottom: 1px solid #ddd; /* light border for the cells */
        padding: 8px;
        text-align: left;
    }

    th {
        background-color: #4F4F4F; /* darker shade for headers */
        color: white;
    }

    tr:last-child td {
        border-bottom: none; /* Removes bottom border from the last row */
    }

    tr:hover {
        background-color:#5C4033;
        color: #FF0000;
    }

    /* Improves table responsiveness without forcing it to a specific viewport width */
    @media (max-width: 600px) {
        table, th, td {
            display: block;
        }

        th, td {
            text-align: justify; /* Adjust text alignment for readability */
        }

        tr {
            margin-bottom: 10px; /* Adds space between rows */
            border-radius: 10px; /* Maintains rounded corners */
        }

        td {
            border: none; /* Removes individual cell borders */
            border-bottom: 1px solid #ddd; /* Adds a border at the bottom of each cell */
            position: relative;
            padding-left: 50%; /* Provides space for the content */
        }

        td:before {
            /* Adds a pseudo-element to act as the label for each cell */
            content: attr(data-label);
            position: absolute;
            left: 0;
            width: 45%; /* Width of the label */
            padding-left: 15px; /* Padding for the label */
            font-weight: bold;
            text-align: left; /* Aligns the label text */
        }
    }
</style>

</head>
<body>
    <div id="surveyResponses">
        <h1><center>Form Response Details</center></h1>

        <div style="text-align: right; margin-bottom: 20px;">
    <input type="text" id="searchInput" placeholder="Search records..." onkeyup="filterRecords()">
    <button onclick="filterRecords()">Filter</button>
</div>

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
                        <a href="certificates/<?php echo htmlspecialchars($certificate); ?>" download><?php echo htmlspecialchars($certificate); ?></a><br>
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
