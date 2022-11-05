// Import the functions you need from the SDKs you need
import { initializeApp } from "https://www.gstatic.com/firebasejs/9.6.2/firebase-app.js";
// TODO: Add SDKs for Firebase products that you want to use
// https://firebase.google.com/docs/web/setup#available-libraries
import {
  getFirestore,
  collection,
  getDocs,
  onSnapshot,
  addDoc,
  deleteDoc,
  doc,
  getDoc,
  updateDoc,
} from "https://www.gstatic.com/firebasejs/9.6.2/firebase-firestore.js";

// Your web app's Firebase configuration
const firebaseConfig = {
  apiKey: "AIzaSyDLP6BceiQjaLDWj9N6r-ZATl1erv_A-lg",
  authDomain: "golden-a0b91.firebaseapp.com",
  projectId: "golden-a0b91",
  storageBucket: "golden-a0b91.appspot.com",
  messagingSenderId: "1055118771266",
  appId: "1:1055118771266:web:656a8fd482ffad605519db"
};


// Initialize Firebase
export const app = initializeApp(firebaseConfig);

export const db = getFirestore();

/**
 * Save a New Task in Firestore
 * @param {string} title the title of the Task
 * @param {string} description the description of the Task
 */
export const saveTask = (title, description) =>
  addDoc(collection(db, "Recervacion"), { title, description });

export const onGetTasks = (callback) =>
  onSnapshot(collection(db, "Recervacion"), callback);

/**
 *
 * @param {string} id Task ID
 */
export const deleteTask = (id) => deleteDoc(doc(db, "Recervacion", id));

export const getTask = (id) => getDoc(doc(db, "Recervacion", id));

export const updateTask = (id, newFields) =>
  updateDoc(doc(db, "Recervacion", id), newFields);

export const getTasks = () => getDocs(collection(db, "Recervacion"));
