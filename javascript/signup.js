var name= document.getElementById('name').value
var email= document.getElementById('email').value
var phone= document.getElementById('phone').value
var address= document.getElementById('address').value
var password= document.getElementById('password1').value
// async function registerUser(name, email,phone,address, password){

 

//     const apiurl = 'http://localhost/storeApi/users/';

//     try{
//         const response = await fetch(apiurl, {
//             method: 'POST',
//             headers:{
//                 'Content-Type':'application/json'
//             },
//             body: JSON.stringify({name,email,phone,address,password})
//         });

//         if (response.ok){
//             const data = await response.json();
//             const authToken = data.token;

//             localStorage.setItem('authToken',authToken)

//             window.location('signup');
//         }else{
//             const errorMessage = await response.text()
//             console.error('fail to register', errorMessage)
//             alert('registration failure, try again')
//         }
//     }

//     catch(error){
//         console.error('Error:', error);
//         alert('unexpected error occured, try again later')
//     }
// }
// registerUser(name, email,phone,address, password)

// function registerUser(name, email, phone, address, password) {
//     const apiurl = 'http://localhost/storeApi/users/';
//     const xhr = new XMLHttpRequest();
  
//     xhr.open('POST', apiurl, true);
//     xhr.setRequestHeader('Content-Type', 'application/json');
//     xhr.onreadystatechange = function() {
//       if (xhr.readyState === XMLHttpRequest.DONE) {
//         if (xhr.status === 200) {
//           const data = JSON.parse(xhr.responseText);
//           const authToken = data.token;
//           localStorage.setItem('authToken', authToken);
//           window.location('signup');
//         } else {
//           console.error('Failed to register:', xhr.responseText);
//           alert('Registration failure, please try again');
//         }
//       }
//     };
  
//     const userData = {
//       name: name,
//       email: email,
//       phone: phone,
//       address: address,
//       password: password
//     };
//     xhr.send(JSON.stringify(userData));
//   }
  
//   registerUser(name, email, phone, address, password);


const signup = async () => {
    const data = {
        address: address,
        email: email,
        name: name,
        password: password,
        phone: phone
    };

    try {
        const response = await fetch('http://localhost/storeApi/users', {
            method: "POST",
            headers: { "Content-Type": "application/json" },
            body: JSON.stringify(data),
        });

        if (response.ok) {
            window.location = 'signup.php';
        } else {
            console.log("Registration failed");
            alert('Registration failure, try again');
        }

        const responseData = await response.json();
        console.log(responseData);
    } catch (error) {
        console.error("Error:", error);
    }
};

signup(address,phone,name,email,password);
console.log(name)