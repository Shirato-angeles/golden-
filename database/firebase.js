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
  appId: "1:1055118771266:web:666c0c99c23120335519db",
};

// Initialize Firebase
export const app = initializeApp(firebaseConfig);

export const db = getFirestore();

/**
 * Save a New Task in Firestore
 * @param {string} habitacion the title of the Task
 * @param {string} llegada the llegada of the Task
 * @param {string} partida
 * @param {string} number
 * @param {string} tipo
 * @param {string} adultos
 * @param {string} ninos
 */
export const saveReceva = (
  habitacion,
  llegada,
  partida,
  tipo,
  adultos,
  ninos,
  number
) =>
  addDoc(collection(db, "Recervaciones"), {
    habitacion,
    llegada,
    partida,
    tipo,
    adultos,
    ninos,
    number
  });

export const onGetRecervas = (callback) =>
  onSnapshot(collection(db, "Recervaciones"), callback);

/**
 *
 * @param {string} id Recerva ID
 */

 export const deleteRecervas = (id) => deleteDoc(doc(db, "Recervaciones", id));

 export const getRecervas = (id) => getDoc(doc(db, "Recervaciones", id));
 
 export const updateRecervas = (id, newFields) =>
   updateDoc(doc(db, "Recervaciones", id), newFields);
 
 export const getRecervaciones = () => getDocs(collection(db, "Recervaciones"));
 