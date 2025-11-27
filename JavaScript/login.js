// document.getElementById("Button_Login").addEventListener("click", async (e) => {
//     // Read form values
//     const username = document.getElementById("username").value;
//     const password = document.getElementById("password").value;
//     const remember = document.getElementById("remember").checked;

//     // Validate inputs
//     if (!username || !password) {
//         console.error("Username and password are required");
//         e.preventDefault();
//         return;
//     }
    
//     // Hash password before sending
//     try {
//         const hashedPassword = await hashPassword(password);
        
//         // Replace password field with hashed version
//         document.getElementById("password").value = hashedPassword;
        
//         console.log("Password hashed successfully");
//     } catch (error) {
//         console.error("Error hashing password:", error);
//         e.preventDefault();
//         return;
//     }
    
//     // If form is valid and password is hashed, let it submit to PHP
//     // PHP will handle cookie creation with setcookie()
// });

// // Function to hash password using SHA-256
// async function hashPassword(password) {
//     const encoder = new TextEncoder();
//     const data = encoder.encode(password);
//     const hashBuffer = await crypto.subtle.digest('SHA-256', data);
    
//     // Convert buffer to hex string
//     const hashArray = Array.from(new Uint8Array(hashBuffer));
//     const hashHex = hashArray.map(b => b.toString(16).padStart(2, '0')).join('');
    
//     return hashHex;
// }
