


    
 
function clearForms() {
    console.log("clearForms function called");
    const forms = document.querySelectorAll('form');
    console.log("Forms found:", forms);
    forms.forEach(form => {
        console.log("Resetting form:", form);
        form.reset();
    });
}

function goBack() {

    window.location.href = 'index.php';
}
function clearFormGrade() {
    document.getElementById('gradeForm').reset();
    document.getElementById('verifyMessage').textContent = '';  // Clear the message
    document.getElementById('submitBtn').disabled = true;  // Disable submit button again
}


// Function to verify if the student exists
function verifyStudent() {
    const studentId = document.getElementById('student_id').value;

    if (studentId) {
        fetch('verifyStudent.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded',
            },
            body: new URLSearchParams({
                'student_id': studentId
            })
        })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    alert('Student found!');
                    // Enable the submit button
                    document.getElementById('submitBtn').disabled = false;
                } else {
                    alert('Student not found');
                    // Disable the submit button if student is not found
                    document.getElementById('submitBtn').disabled = true;
                }
            })
            .catch(error => {
                console.error('Error:', error);
            });
    } else {
        alert('Please enter a Student ID');
    }
}

document.addEventListener('DOMContentLoaded', () => {
    document.querySelectorAll('input').forEach(input => {
        input.addEventListener('input', hideMessages);
    });

    function hideMessages() {
        document.getElementById('success-message').style.display = 'none';
        document.getElementById('error-message').style.display = 'none';
    }

 function showMessages() {
        const urlParams = new URLSearchParams(window.location.search);
        const success = urlParams.get('success');
        if (success === '1') {
            document.getElementById('success-message').style.display = 'block';
        } else if (success === '0') {
            document.getElementById('error-message').style.display = 'block';
        }
    }


    showMessages();
});


