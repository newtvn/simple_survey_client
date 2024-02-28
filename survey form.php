<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
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
    input[type="text"], input[type="email"], textarea, input[type="file"] {
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
    .options input[type="radio"], .options input[type="checkbox"] {
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
      text-decoration: none;
      text-align: center;
    }
    .btn:hover {
      background-color: #1D0200;
    }
  </style>
</head>
<body>
  <nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
      <a class="navbar-brand" href="#"><i class="fas fa-star"></i><b>Sky Survey Form</b></a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <!-- Navigation links here -->
        </ul>
        <form class="d-flex" role="search">
          <button>
            <a class="nav-link active" aria-current="page" href="survey responses.php">Responses</a>
          </button>
        </form>
      </div>
    </div>
  </nav>

  <div class="container">
    <form id="surveyForm" method="POST" enctype="multipart/form-data">
      <center><h1>Questionnaire</h1></center><br>
      <form action="api.php" method="post" enctype="multipart/form-data">
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
        <div class="options multiple">
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
        <label for="certificates">Upload any of your certificates?(<small>You can upload multiple files, preferably(.pdf)</small>) <span class="required">*</span></label><br>
        <input type="file" id="certificates" name="certificates[]" accept=".pdf" multiple required>
      </div>

      <button type="button" id="submitForm">Submit</button>
    </form>
  </div>

  <script src="https://kit.fontawesome.com/yourcode.js"></script>
  <script>
    document.addEventListener('DOMContentLoaded', function() {
      const emailInput = document.querySelector('input[type="email"]')
      const otherInputs = document.querySelectorAll('input:not([type="email"]), textarea')

      function checkEmailFormat() {
        const emailRegex = /^[^@]+@gmail\.com$/
        if (!emailRegex.test(emailInput.value.trim())) {
          otherInputs.forEach(input => input.disabled = true)
          emailInput.style.borderBottom = '2px solid red'
        } else {
          otherInputs.forEach(input => input.disabled = false)
          emailInput.style.borderBottom = ''
        }
      }

      emailInput.addEventListener('input', checkEmailFormat)

      otherInputs.forEach(input => input.disabled = true)
      emailInput.style.borderBottom = ''

      checkEmailFormat()

      document.getElementById('submitForm').addEventListener('click', function(event) {
        event.preventDefault()

        const formData = new FormData(document.getElementById('surveyForm'))

        fetch('http://localhost/simple_survey_client/api.php', {
          method: 'POST',
          body: formData
        })
        .then(response => response.json())
        .then(data => {
          console.log(data)
          if (data.status === 'success') {
            alert('Survey response has been recorded.')
          } else {
            alert('An error occurred. Please try again.')
          }
        })
        .catch(error => {
          console.error('Error:', error)
          alert('An error occurred. Please try again.')
        })
      })
    })
  </script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
