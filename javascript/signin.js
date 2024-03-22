// Function to handle user login
async function loginUser(email, password) {
    const apiUrl = 'http://localhost/storeApi/login'; // Replace with your API endpoint URL

    try {
        // Send POST request to the API endpoint with user credentials
        const response = await fetch(apiUrl, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({ email, password })
        });

        // Check if the response is successful
        if (response.ok) {
            // Parse the JSON response to extract the authentication token
            const data = await response.json();
            const authToken = data.token; // Assuming the API response contains a token field

            // Store the authentication token securely (e.g., in local storage or a secure cookie)
            localStorage.setItem('authToken', authToken);

            // Redirect the user to the dashboard or another page
            window.location.href = '/dashboard'; // Replace with the desired destination URL
        } else {
            // Display error message if authentication fails
            const errorMessage = await response.text();
            console.error('Login failed:', errorMessage);
            alert('Login failed. Please check your credentials.');
        }
    } catch (error) {
        console.error('Error:', error);
        alert('An unexpected error occurred. Please try again later.');
    }
}

// Example usage: Call the loginUser function with username and password
loginUser('email', 'password');
