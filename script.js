document.addEventListener('DOMContentLoaded', function() {
    // Initialize the survey form steps
    // Fetch questions from the API and populate form
    // Handle Next/Previous button clicks
    // Submit responses to the API
});

function fetchQuestions() {
    // Use XMLHttpRequest or fetch API to get questions from your PHP endpoint
    /api/questions
}

function submitResponses() {
    // Use XMLHttpRequest or fetch API to submit responses to your PHP endpoint
    /api/questions/responses
}

function fetchResponses() {
    // Fetch and display responses
    /api/questions/responses
}


function downloadcertificates() {
    // Fetch and display responses
    /api/questions/responses/certificates/{id} 
}

// // JavaScript to select a row with a specific id
var row = document.getElementById("record_1"); 


function filterRecords() {
    var input, filter, table, tr, td, i, txtValue;
    input = document.getElementById("searchInput");
    filter = input.value.toUpperCase();
    table = document.getElementById("responsesTable");
    tr = table.getElementsByTagName("tr");

    // Loop through all table rows, and hide those who don't match the search query
    for (i = 1; i < tr.length; i++) {
        td = tr[i].getElementsByTagName("td")[1]; // Assuming the second `td` is the email address
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

