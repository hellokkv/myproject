
  // Import the functions you need from the SDKs you need
  import { initializeApp } from "https://www.gstatic.com/firebasejs/11.6.0/firebase-app.js";
  import { getAnalytics } from "https://www.gstatic.com/firebasejs/11.6.0/firebase-analytics.js";
  import { getAuth, GoogleAuthProvider, signInWithPopup } from "https://www.gstatic.com/firebasejs/11.6.0/firebase-auth.js";
  const firebaseConfig = {
    apiKey: "AIzaSyArf4xdPprg35EfOBNrmRuOafW9l7Zkol0",
    authDomain: "login-inkribeai.firebaseapp.com",
    projectId: "login-inkribeai",
    storageBucket: "login-inkribeai.firebasestorage.app",
    messagingSenderId: "1001350945063",
    appId: "1:1001350945063:web:77617acb2dccea12d4b102",
    measurementId: "G-57F1SVRSZT"
  };

  // Initialize Firebase
  const app = initializeApp(firebaseConfig);

  const auth =getAuth(app);
  aith.languageCode = 'en'

  const analytics = getAnalytics(app);

  const provider = new GoogleAuthProvider;

  const googleLogin = document.getElementById("googleSignInBtn");

  googleLogin.addEventListener("click", function(){
    alert(5)
  })
