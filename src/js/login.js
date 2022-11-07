// Your web app's Firebase configuration
const firebaseConfig = {
  apiKey: "AIzaSyDLP6BceiQjaLDWj9N6r-ZATl1erv_A-lg",
  authDomain: "golden-a0b91.firebaseapp.com",
  projectId: "golden-a0b91",
  storageBucket: "golden-a0b91.appspot.com",
  messagingSenderId: "1055118771266",
  appId: "1:1055118771266:web:656a8fd482ffad605519db",
};
// Initialize Firebase
firebase.initializeApp(firebaseConfig);
// Initialize constiables
const auth = firebase.auth();
const database = firebase.database();

// Set up our register function
function register() {
  // Get all our input fields
  email = document.getElementById("email").value;
  password = document.getElementById("password").value;
  full_name = document.getElementById("full_name").value;
  full_lastname = document.getElementById("full_lastname").value;

   /* Validate input fields
  if (validate_email(email) == false || validate_password(password) == false) {
    alert("¡El correo electrónico o la contraseña están fuera de línea!!!");
    return;
     Don't continue running the code
  }
  if (
    validate_field(full_name) == false ||
    validate_field(full_lastname) == false 
  ) {
    alert("One or More Extra Fields is Outta Line!!");
    return;
  }*/

  // Move on with Auth
  auth
    .createUserWithEmailAndPassword(email, password)
    .then(function () {
      // Declare user constiable
      const user = auth.currentUser;

      // Add this user to Firebase Database
      const database_ref = database.ref();

      // Create User data
      const user_data = {
        email: email,
        full_name: full_name,
        full_lastname: full_lastname,
        last_login: Date.now(),
      };

      // Push to Firebase Database
      database_ref.child("Usuarios/recervas/" + user.uid).set(user_data);

      // DOne
      alert("User Created!!");
    })
    .catch(function (error) {
      // Firebase will use this to alert of its errors
      const error_code = error.code;
      const error_message = error.message;

      alert(error_message);
    });
}

// Set up our login function
function login() {
  // Get all our input fields
  email = document.getElementById("email").value;
  password = document.getElementById("password").value;
  full_name = document.getElementById("full_name").value;

  /* Validate input fields
  if (validate_email(email) == false || validate_password(password) == false) {
    alert("Email or Password is Outta Line!!");
    return;
    // Don't continue running the code
  }*/

  auth
    .signInWithEmailAndPassword(email, password)
    .then(function () {
      // Declare user constiable
      const user = auth.currentUser;

      // añadir este usuario a  Firebase Database
      const database_ref = database.ref();

      // Crear los datos del usuario 
      const user_data = {
        last_login: Date.now(),
      };

      // Push to Firebase Database
      database_ref.child("Usuarios/recervas/" + user.uid).update(user_data);

      // DOne
      alert("Usuario conectado!!");
	  href="../html/index.html"
    })
    .catch(function (error) {
      // Firebase will use this to alert of its errors
      const error_code = error.code;
      const error_message = error.message;

      alert(error_message);
    });
}

// Validate Functions
function validate_email(email) {
  expression = /^[^@]+@\w+(\.\w+)+\w$/;
  if (expression.test(email) == true) {
    // Email esta bien 
    return true;
  } else {
    // Email esta mal
    return false;
  }
}

function validate_password(password) {
  // Firebase only accepts lengths greater than 6
  if (password < 6) {
    return false;
  } else {
    return true;
  }
}

function validate_field(field) {
  if (field == null) {
    return false;
  }

  if (field.length <= 0) {
    return false;
  } else {
    return true;
  }
}
