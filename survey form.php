<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Survey Form</title>
  
  <style>
    body {
      background-color: #800000; 
      font-family: Arial, sans-serif; 
    }
    .container {
      width: 80%;
      margin: auto;
      background-color: #f7f7f7; 
      padding: 20px;
      border-radius: 5px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); 
    }
    h1 {
      text-align: center; 
      color: #333; 
    }
    .form-group {
      margin-bottom: 15px; 
    }
    label {
      display: block;
      margin-bottom: 5px;
    }
    input[type="text"],
    input[type="email"],
    textarea,
    input[type="file"] {
      width: 100%;
      padding: 10px;
      border-radius: 5px;
      border: 1px solid #ddd; 
    }
    .options label {
      margin-right: 10px; 
    }
    .options input[type="radio"],
    .options input[type="checkbox"] {
      margin-right: 5px;
    }
    .multiple {
      display: flex;
      flex-wrap: wrap;
      gap: 10px;
    }
    button {
      padding: 10px 20px;
      background-color: #5cb85c;
      color: white;
      border: none;
      border-radius: 5px;
      cursor: pointer;
      font-size: 16px;
    }
    button:hover {
      background-color: #4cae4c; 
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
                         <input type="radio" id="male" name="gender" value="MALE" required>
                            
                            
                         <label for="female">Female</label>
                          <input type="radio" id="female" name="gender" value="FEMALE">
                            
                            
                          <label for="other">prefer not to say</label>
                           <input type="radio" id="other" name="gender" value="OTHER">
                            
                        </div>
                    </div>
      
                    <div class="form-group">
                        <label>What programming stack are you familiar with? <span class="required">*</span></label>
                        <div class="options multiple"><br>
                            <!-- options -->
                            <input type="checkbox" id="react" name="programming_stack" value="REACT">
                            <label for="react">React JS</label><br>
            
                            <input type="checkbox" id="ANGULAR" name="programming_stack" value="ANGULAR">
                            <label for="ANGULAR">ANGULAR JS</label><br>
            
                            <input type="checkbox" id="VUE" name="programming_stack" value="VUE">
                            <label for="VUE">VUE</label><br>
            
                            <input type="checkbox" id="SQL" name="programming_stack" value="SQL">
                            <label for="SQL">SQL</label><br>
            
                            <input type="checkbox" id="MSSQL" name="programming_stack" value="MSSQL">
                            <label for="MSSQL">MSSQL</label><br>
            
                            <input type="checkbox" id="react" name="programming_stack" value="POSTGRE">
                            <label for="POSTGRE">POSTGRE</label><br>
            
                            <input type="checkbox" id="MYSQL" name="programming_stack" value="MYSQL">
                            <label for="MYSQL">MYSQL</label><br>
            
                            <input type="checkbox" id="JAVA" name="programming_stack" value="JAVA">
                            <label for="JAVA">JAVA</label><br>
            
                            <input type="checkbox" id="PHP" name="programming_stack" value="PHP">
                            <label for="PHP">PHP</label><br>
            
                            <input type="checkbox" id="GO" name="programming_stack" value="GO">
                            <label for="GO">GO</label><br>
            
                            <input type="checkbox" id="RUST" name="programming_stack" value="RUST">
                            <label for="RUST">RUST</label><br><br>
            
                            <!-- end of ooptions... -->
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="certificates">Upload any of your certificates?(<small>You can upload multiple files, preferably(.pdf)</small>) <span class="required">*</span></label>
                        <input type="file" id="certificates" name="certificates" accept=".pdf" multiple required><br>
                    
                    </div>

      <button type="submit">Submit</button>
    </form>
    <?php
    ?>


<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fullName = htmlspecialchars($_POST['full_name']);
    $emailAddress = htmlspecialchars($_POST['email_address']);
    $description = htmlspecialchars($_POST['description']);
    $gender = htmlspecialchars($_POST['gender']);
    // Correct handling of checkboxes as an array
    $programmingStack = isset($_POST['programming_stack']) ? $_POST['programming_stack'] : [];
    
    // Handle file upload
    if (isset($_FILES['certificates']['name']) && is_array($_FILES['certificates']['name'])) {
        // Loop through each file
        foreach ($_FILES['certificates']['name'] as $i => $name) {
            if ($_FILES['certificates']['error'][$i] === UPLOAD_ERR_OK) {
                $tmp_name = $_FILES['certificates']['tmp_name'][$i];
                // Update the path to the directory where you want to save the files
                $uploadDir = "/path/to/uploads/"; // Make sure this directory exists and is writable
                $destination = $uploadDir . basename($name);
                move_uploaded_file($tmp_name, $destination);
                // Output success for each uploaded file
                echo "<p>Uploaded $name successfully.</p>";
            } else {
                // Handle file upload errors here
                switch ($_FILES['certificates']['error'][$i]) {
                    case UPLOAD_ERR_INI_SIZE:
                    case UPLOAD_ERR_FORM_SIZE:
                        echo "<p>Error: File $name is too large.</p>";
                        break;
                    case UPLOAD_ERR_NO_FILE:
                        echo "<p>Error: No file sent.</p>";
                        break;
                    // ... Handle other errors
                    default:
                        echo "<p>An error occurred while uploading $name.</p>";
                        break;
                }
            }
        }
    }
} else {
}
?>
  </div>
</body>
</html>
