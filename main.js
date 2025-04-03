import { initializeApp } from "https://www.gstatic.com/firebasejs/11.6.0/firebase-app.js";
import { getAuth, GoogleAuthProvider, signInWithPopup } from "https://www.gstatic.com/firebasejs/11.6.0/firebase-auth.js";

// Firebase configuration
const firebaseConfig = {
  apiKey: "AIzaSyBqQjxwLLlZd6cGkyUn9T6qOvykQbdnoh8",
  authDomain: "login-inkribe.firebaseapp.com",
  projectId: "login-inkribe",
  storageBucket: "login-inkribe.firebasestorage.app",
  messagingSenderId: "639204809625",
  appId: "1:639204809625:web:a152cd9f9444dad56ad108"
};

// Initialize Firebase
const app = initializeApp(firebaseConfig);
const auth = getAuth(app);
auth.languageCode = 'en';

document.addEventListener('DOMContentLoaded', () => {
  const googleLoginButton = document.getElementById("googleSignInBtn");
  const provider = new GoogleAuthProvider();

  if (googleLoginButton) {
    googleLoginButton.addEventListener("click", () => {
      signInWithPopup(auth, provider)
        .then((result) => {
          // This gives you a Google Access Token. You can use it to access the Google API.
          const credential = GoogleAuthProvider.credentialFromResult(result);
          const token = credential.accessToken;
          const user = result.user;
          console.log("User signed in: ", user);
          // Redirect to another page or do something with the user info
          window.location.href = "dashboard.html";  // Redirecting to dashboard after successful login
        }).catch((error) => {
          // Handle Errors here.
          const errorCode = error.code;
          const errorMessage = error.message;
          const email = error.email;
          const credential = GoogleAuthProvider.credentialFromError(error);
          console.error("Error during sign in:", errorCode, errorMessage);
          // You can also show these errors to the user
        });
    });
  } else {
    console.error("Google Sign-In button not found");
  }
});
