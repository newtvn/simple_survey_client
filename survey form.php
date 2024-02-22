<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">

  <title>Survey Form</title>

  <nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">THANK YOU FOR PARTICIPATING IN THIS SURVEY, KINDLY FILL IN YOUR DETAILS IN THE FORM BELOW</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        
      </ul>
      <form class="d-flex" role="search">
      <button>
          <a class="nav-link active" aria-current="page" href="http://localhost/simple_survey_client/survey%20responses.php">Responses</a>
          </button>
      </form>
    </div>
  </div>
</nav>

  <style>
    body {
      background: linear-gradient(135deg, #4d3319 0%, #1a1a00 100%); 
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      color: #fff;
    }
    .container {
      width: 80%;
      margin: auto;
      background-color: #f7f7f7; 
      padding: 20px;
      border-radius: 8px;
      box-shadow: 0 0 20px rgba(0, 0, 0, 0.2); 
      color: #333;
      transform: translateY(10%);
    }
    h1 {
      text-align: center; 
      color: #5c3c00; 
    }
    .form-group {
      margin-bottom: 20px; 
    }
    label {
      display: block;
      margin-bottom: 5px;
      color: #5c3c00;
    }
    input[type="text"],
    input[type="email"],
    textarea,
    input[type="file"] {
      width: 100%;
      padding: 12px;
      border-radius: 5px;
      border: 1px solid #ccc; 
      box-sizing: border-box;
    }
    .options label {
      margin-right: 20px; 
      cursor: pointer;
    }
    .options input[type="radio"],
    .options input[type="checkbox"] {
      display: none;
    }
    .options label:before {
      content: '';
      display: inline-block;
      width: 20px;
      height: 20px;
      border-radius: 50%;
      border: 2px solid #5c3c00;
      margin-right: 5px;
      vertical-align: -6px;
      cursor: pointer;
      transition: background-color 0.2s, border-color 0.2s;
    }
    .options input[type="radio"]:checked + label:before {
      background-color: #5c3c00;
    }
    .options input[type="checkbox"]:checked + label:before {
      background-color: #5c3c00;
      border-color: #5c3c00;
    }
    .multiple {
      display: flex;
      flex-wrap: wrap;
      gap: 10px;
    }
    .multiple label:before {
      border-radius: 5px;
    }
    button {
      padding: 12px 25px;
      background-color: #5c3c00;
      color: white;
      border: none;
      border-radius: 5px;
      cursor: pointer;
      font-size: 16px;
      transition: background-color 0.2s;
    }
    button:hover {
      background-color:#1D0200;
    }
    .required {
      color: red;
    }

    .btn {
    display: inline-block;
    padding: 12px 25px;
    background-color: #5c3c00;
    color: white;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    font-size: 16px;
    text-decoration: none; /* Removes underline from links */
    text-align: center;
}

.btn:hover {
    background-color: #1D0200;
}

  </style>


</head>
<body>
<script>
document.addEventListener('DOMContentLoaded', function () {
    const emailInput = document.querySelector('input[type="email"]');
    const otherInputs = document.querySelectorAll('input:not([type="email"]), textarea');

    // Function to check email format
    function checkEmailFormat() {
        const emailRegex = /^[^@]+@gmail\.com$/;
        if (!emailRegex.test(emailInput.value.trim())) {
            // If the email format is incorrect, disable all other inputs and apply red underline
            otherInputs.forEach(input => input.disabled = true);
            emailInput.style.borderBottom = '2px solid red';
        } else {
            // If the email format is correct, enable all other inputs and remove red underline
            otherInputs.forEach(input => input.disabled = false);
            emailInput.style.borderBottom = '';
        }
    }

    // Attach event listener for real-time email format check
    emailInput.addEventListener('input', checkEmailFormat);

    // Initially disable all inputs except the email
    otherInputs.forEach(input => input.disabled = true);
    emailInput.style.borderBottom = ''; // Ensure no red underline initially

    // Call the email format check function on page load in case the field is pre-filled or autocompleted
    checkEmailFormat();
});
</script>


  <div class="container">
  
  

  <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" enctype="multipart/form-data">

      <center><h1>Questionnaire</h1></center><br>
    
                    <div class="form-group">
                        <label for="full_name">What is your full name? <span class="required">*</span></label><br>
                        <input type="text" id="full_name" name="full_name" placeholder="[Surname] [First Name] [Other Names]" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="email_address">What is your email address? <span class="required">*</span></label><br>
                        <input type="email" id="email_address" name="email_address" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="description">Tell us a bit more about yourself <span class="required">*</span></label><br>
                        <textarea id="description" name="description" rows="4" required></textarea>
                    </div>
                    
                    <div class="form-group">
    <label>What is your gender? <span class="required">*</span></label>
    <div class="options">
        <input type="radio" id="male" name="gender" value="MALE">
        <label for="male">Male</label><br>

        <input type="radio" id="female" name="gender" value="FEMALE">
        <label for="female">Female</label><br>

        <input type="radio" id="other" name="gender" value="OTHER">
        <label for="other">Prefer not to say</label><br>
    </div>
</div>

      
                   

<div class="form-group">
    <label>What programming stack are you familiar with? <span class="required">*</span></label>
    <div class="options multiple"><br>
        <input type="checkbox" id="react" name="programming_stack[]" value="REACT">
        <label for="react">React JS</label><br>
        
        <input type="checkbox" id="angular" name="programming_stack[]" value="ANGULAR">
        <label for="angular">Angular JS</label><br>
        
        <input type="checkbox" id="vue" name="programming_stack[]" value="VUE">
        <label for="vue">Vue</label><br>
        
        <input type="checkbox" id="sql" name="programming_stack[]" value="SQL">
        <label for="sql">SQL</label><br>
        
        <input type="checkbox" id="mssql" name="programming_stack[]" value="MSSQL">
        <label for="mssql">Microsoft SQL Server</label><br>
        
        <input type="checkbox" id="postgres" name="programming_stack[]" value="POSTGRE">
        <label for="postgres">PostgreSQL</label><br>
        
        <input type="checkbox" id="mysql" name="programming_stack[]" value="MYSQL">
        <label for="mysql">MySQL</label><br>
        
        <input type="checkbox" id="java" name="programming_stack[]" value="JAVA">
        <label for="java">Java</label><br>
        
        <input type="checkbox" id="php" name="programming_stack[]" value="PHP">
        <label for="php">PHP</label><br>
        
        <input type="checkbox" id="go" name="programming_stack[]" value="GO">
        <label for="go">Go</label><br>
        
        <input type="checkbox" id="rust" name="programming_stack[]" value="RUST">
        <label for="rust">Rust</label><br><br>
    </div>
</div>


                    
                    <div class="form-group">
                        <label for="certificates">Upload any of your certificates?(<small>You can upload multiple files, preferably(.pdf)</small>) <span class="required">*</span></label>
                        <input type="file" id="certificates" name="certificates" accept=".pdf" multiple required><br>
                    
                    </div>

      <button type="submit">Submit</button>
     <a href="survey responses.php" class="btn">View Responses</a>


    </form>

    <?php
include 'connect.php';

ini_set('display_errors', 1);
error_reporting(E_ALL);

$uploadDir = __DIR__ . '/path/to/uploads/';
if (!file_exists($uploadDir)) {
    mkdir($uploadDir, 0777, true);
}

$fullName = isset($_POST['full_name']) ? htmlspecialchars($_POST['full_name']) : '';
$emailAddress = isset($_POST['email_address']) ? htmlspecialchars($_POST['email_address']) : '';
$description = isset($_POST['description']) ? htmlspecialchars($_POST['description']) : '';
$gender = isset($_POST['gender']) ? htmlspecialchars($_POST['gender']) : '';

$programmingStack = isset($_POST['programming_stack']) ? $_POST['programming_stack'] : [];
$programmingStackString = implode(',', $programmingStack);

$uploadedFiles = [];
$uploadedFilesString = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // First, validate the email address format
    if (!filter_var($emailAddress, FILTER_VALIDATE_EMAIL)) {
        echo "<p>Error: Invalid email format.</p>";
    } else if (!preg_match("/@gmail\.com$/", $emailAddress)) {
        echo "<p>Error: Email must be a Gmail address (example@gmail.com).</p>";
    } else {
        // File upload handling
        if (isset($_FILES['certificates']['name']) && !empty($_FILES['certificates']['name'])) {
            $fileCount = is_array($_FILES['certificates']['name']) ? count($_FILES['certificates']['name']) : 1;
            $fileNames = is_array($_FILES['certificates']['name']) ? $_FILES['certificates']['name'] : array($_FILES['certificates']['name']);
            $tmpNames = is_array($_FILES['certificates']['tmp_name']) ? $_FILES['certificates']['tmp_name'] : array($_FILES['certificates']['tmp_name']);
            $errorCodes = is_array($_FILES['certificates']['error']) ? $_FILES['certificates']['error'] : array($_FILES['certificates']['error']);

            for ($i = 0; $i < $fileCount; $i++) {
                if ($errorCodes[$i] === UPLOAD_ERR_OK) {
                    $tmp_name = $tmpNames[$i];
                    $name = basename($fileNames[$i]);
                    $destination = $uploadDir . $name;
                    if (move_uploaded_file($tmp_name, $destination)) {
                        $uploadedFiles[] = $name;
                    } else {
                        echo "<p>Error: Could not upload file $name.</p>";
                    }
                } else {
                    echo "<p>Error: Upload error for file.</p>";
                }
            }
            $uploadedFilesString = implode(',', $uploadedFiles);
        }

        // Database insertion
        if (!empty($fullName) && !empty($emailAddress) && !empty($description) && !empty($gender) && !empty($programmingStackString) && !empty($uploadedFilesString)) {
            try {
                $stmt = $pdo->prepare("INSERT INTO survey_responses (full_name, email_address, description, gender, programming_stack, certificates, date_responded) VALUES (?, ?, ?, ?, ?, ?, NOW())");
                $stmt->execute([$fullName, $emailAddress, $description, $gender, $programmingStackString, $uploadedFilesString]);
                echo "<p>Survey response has been recorded.</p>";
            } catch (PDOException $e) {
                echo "Database error: " . $e->getMessage();
            }
        }
    }
}
?>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>