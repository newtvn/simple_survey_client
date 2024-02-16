<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Add the link to Font Awesome CSS at the head of your HTML -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">

<!-- ... rest of your HTML ... -->

<!-- Update the button in your HTML form -->
<button type="submit"><i class="fa fa-upload"></i>Upload CSV</button>

<!-- ... rest of your HTML ... -->

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Validation Application</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <h1>Data Validation Application</h1>
    </header>
    <main>
        <section id="upload-section">
            <form id="upload-form" method="post" enctype="multipart/form-data" action="process_upload.php">
                <input type="file" name="csvFile" id="csvFile" accept=".csv" required>
                <button type="submit">Upload CSV</button>
            </form>
        </section>
        <section id="results-section" class="hidden">
            <h2>Validation Results</h2>
            <div id="valid-records">
                <h3>Valid Records</h3>
                <!-- Dynamically generated content -->
            </div>
            <div id="invalid-records">
                <h3>Invalid Records</h3>
                <!-- Dynamically generated content -->
            </div>
        </section>
    </main>
    <footer>
        <p>2024 Data Validation Application</p>
    </footer>
    <script src="app.js"></script>
</body>
</html>
