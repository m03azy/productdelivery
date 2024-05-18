document.addEventListener('DOMContentLoaded', function() {
    document.getElementById('logoutButton').addEventListener('click', logout);
});

function logout() {
    fetch('http://localhost/storeApi/logout.php', {
        method: 'POST',
        credentials: 'include' // Include credentials for session-based auth
    })
    .then(response => response.json())
    .then(data => {
        if (data.status === 200) {
            // Clear local storage or cookies where the token is stored
            localStorage.removeItem('token');
            alert(data.message);
            // Redirect to login page or home page
            window.location.href = 'login.html';
        } else {
            alert('Failed to log out');
        }
    })
    .catch(error => {
        console.error('Error logging out:', error);
    });
}

// Call the function to log out
logout();
