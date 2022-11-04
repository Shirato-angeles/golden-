// Import the functions you need from the SDKs you need
import { initializeApp } from "firebase/app";
import { getAuth } from "https://www.gstatic.com/firebasejs/9.10.0/firebase-auth.js"
import { getFirestore } from "https://www.gstatic.com/firebasejs/9.10.0/firebase-firestore.js"

// Your web app's Firebase configuration
const firebaseConfig = {
  apiKey: "AIzaSyDLP6BceiQjaLDWj9N6r-ZATl1erv_A-lg",
  authDomain: "golden-a0b91.firebaseapp.com",
  projectId: "golden-a0b91",
  storageBucket: "golden-a0b91.appspot.com",
  messagingSenderId: "1055118771266",
  appId: "1:1055118771266:web:666c0c99c23120335519db",
};

// Initialize Firebase
export const app = initializeApp(firebaseConfig);
export const auth = getAuth(app);
export const db = getFirestore(app);
