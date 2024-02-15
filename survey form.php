<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Survey Form</title>

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
      background-color: #4e3200; 
    }
    .required {
      color: red;
    }
  </style>


</head>
<body>
  <div class="container">
  
  

  <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" enctype="multipart/form-data">
      <center><h1>Questionnaire</h1></center><br>
     
      <form action="/submit-form" method="POST">
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

                        <label for="male">Male</label>
                         <input type="radio" id="male" name="gender" value="MALE">
                            
                            
                         <label for="female">Female</label>
                          <input type="radio" id="female" name="gender" value="FEMALE">
                            
                            
                          <label for="other">prefer not to say</label>
                           <input type="radio" id="other" name="gender" value="OTHER">
                            
                        </div>
                    </div>
      
                    <!-- ... other form fields ... -->

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
    </form>

    <?php
include 'connect.php';

$uploadDir = __DIR__ . '/path/to/uploads/'; // Adjust '/path/to/uploads/' to your desired path
if (!file_exists($uploadDir)) {
    mkdir($uploadDir, 0777, true); // Creates the directory with read/write permissions
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize and assign input data
    $fullName = htmlspecialchars($_POST['full_name']);
    $emailAddress = htmlspecialchars($_POST['email_address']);
    $description = htmlspecialchars($_POST['description']);
    $gender = htmlspecialchars($_POST['gender']);
    // Ensure $programmingStack is always treated as an array
    $programmingStack = isset($_POST['programming_stack']) ? (array)$_POST['programming_stack'] : [];
    $programmingStackString = implode(',', $programmingStack);

    // Initialize variables for file uploads
    $uploadedFiles = [];
    $uploadDir = "path/to/uploads/"; // Adjust accordingly

    // Check if any file is uploaded by ensuring $_FILES['certificates'] is set and not empty
    if (isset($_FILES['certificates']['name']) && !empty($_FILES['certificates']['name'])) {
        // Normalize the file structure when dealing with a single file to mimic multiple files format
        $fileCount = is_array($_FILES['certificates']['name']) ? count($_FILES['certificates']['name']) : 1;
        $fileNames = is_array($_FILES['certificates']['name']) ? $_FILES['certificates']['name'] : array($_FILES['certificates']['name']);
        $tmpNames = is_array($_FILES['certificates']['tmp_name']) ? $_FILES['certificates']['tmp_name'] : array($_FILES['certificates']['tmp_name']);
        $errorCodes = is_array($_FILES['certificates']['error']) ? $_FILES['certificates']['error'] : array($_FILES['certificates']['error']);

        for ($i = 0; $i < $fileCount; $i++) {
            if ($errorCodes[$i] === UPLOAD_ERR_OK) {
                // Perform your file validation and upload logic here
                $tmp_name = $tmpNames[$i];
                $name = basename($fileNames[$i]);
                $destination = $uploadDir . $name;
                if (move_uploaded_file($tmp_name, $destination)) {
                    $uploadedFiles[] = $name; // Collect uploaded file names
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
    if (!empty($uploadedFiles)) {
        try {
            $stmt = $pdo->prepare("INSERT INTO survey_responses (full_name, email_address, description, gender, programming_stack, certificates, date_responded) VALUES (?, ?, ?, ?, ?, ?, NOW())");
            $stmt->execute([$fullName, $emailAddress, $description, $gender, $programmingStackString, $uploadedFilesString]);
            echo "<p>Survey response has been recorded.</p>";
        } catch (PDOException $e) {
            echo "Database error: " . $e->getMessage();
        }
    }
}
?>