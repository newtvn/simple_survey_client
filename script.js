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

function filterRecords() {
    var input, filter, table, tr, td, i, txtValue;
    input = document.getElementById("searchInput");
    filter = input.value.toUpperCase();
    table = document.querySelector(".responsive-table");
    tr = table.getElementsByTagName("tr");

    // Loop through all table rows, and hide those that don't match the search query
    for (i = 0; i < tr.length; i++) {
        // Loop through all table columns
        td = tr[i].getElementsByTagName("td");
        for (var j = 0; j < td.length; j++) {
            if (td[j]) {
                txtValue = td[j].textContent || td[j].innerText;
                if (txtValue.toUpperCase().indexOf(filter) > -1) {
                    tr[i].style.display = "";
                    break; // Stop the loop if found and display the row
                } else {
                    tr[i].style.display = "none"; // Hide the row if not found
                }
            }       
        }
    }
}
