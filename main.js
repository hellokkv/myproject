  import { initializeApp } from "https://www.gstatic.com/firebasejs/11.5.0/firebase-app.js";
  import { getAnalytics } from "https://www.gstatic.com/firebasejs/11.5.0/firebase-analytics.js";
  import { getAuth, GoogleAuthProvider, signInWithPopup} from "https://www.gstatic.com/firebasejs/11.5.0/firebase-auth.js";
  const firebaseConfig = {
    apiKey: "AIzaSyDrFhoLMM2XgzI9Wp56iSyKZL2l7xzhH2o",
    authDomain: "login-9a6d5.firebaseapp.com",
    projectId: "login-9a6d5",
    storageBucket: "login-9a6d5.firebasestorage.app",
    messagingSenderId: "322644008968",
    appId: "1:322644008968:web:c9821085b3c44b5ddc31bd",
    measurementId: "G-DXGWY4QHTJ"
  };
  // Initialize Firebase
  const app = initializeApp(firebaseConfig);
  const analytics = getAnalytics(app);
  const provider = new GoogleAuthProvider();
  const auth = getAuth(app);
  const googleLogin = document.getElementById("googleSignInBtn");
  auth.languageCode = 'en'

  googleLogin.addEventListener("click", function(){

    signInWithPopup(auth, provider)
  .then((result) => {
    const credential = GoogleAuthProvider.credentialFromResult(result);
    const user = result.user;
    console.log(user);
    window.location.href="dashboard.html";

  }).catch((error) => {
    const errorCode = error.code;
    const errorMessage = error.message;


  });

  })