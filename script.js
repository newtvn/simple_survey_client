document.addEventListener('DOMContentLoaded', function() {
    const surveyForm = document.getElementById('surveyForm');

    surveyForm.addEventListener('submit', function(event) {
        event.preventDefault();
        const formData = new FormData(surveyForm);

        fetch('http://localhost/simple_survey_client/api.php', {
            method: 'POST',
            body: formData
        })
        .then(response      => response.json()) 
        .then(data          => {
            console.log(data);
            if (data.status === 'success') {
                alert('Survey response has been recorded.');
            } else {
                throw new Error(data.error || 'An error occurred while submitting the survey.');
            }
        })
        .catch((error) => {
            console.error('Error:', error);
            alert(error.message);
        });
    });
});
