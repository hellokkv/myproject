// Import Firebase auth
  import { getAuth, signOut, onAuthStateChanged } from "https://www.gstatic.com/firebasejs/10.8.0/firebase-auth.js";
  import { app } from "./firebase-config.js"; // make sure this is your Firebase config file

  const auth = getAuth(app);

  // Handle My Account Click
  document.getElementById('myAccountLink').addEventListener('click', () => {
    // You can redirect to an account page or display a modal
    window.location.href = "/account.html"; // or show modal
  });

  // Handle Logout
  document.getElementById('logoutBtn').addEventListener('click', () => {
    signOut(auth)
      .then(() => {
        console.log("User signed out");
        window.location.href = "/login.html"; // Redirect after logout
      })
      .catch((error) => {
        console.error("Logout Error: ", error);
        alert("Failed to log out. Try again.");
      });
  });

  // Optional: Redirect if not logged in
  onAuthStateChanged(auth, (user) => {
    if (!user) {
      window.location.href = "/login.html";
    }
  });

