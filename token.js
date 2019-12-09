  // Initialize Firebase
  var config = {
    apiKey: "AIzaSyC_-l2x-DOGx_S-rRlAIna7EcP45ATffLU",
    authDomain: "athena-cd90a.firebaseapp.com",
    databaseURL: "https://athena-cd90a.firebaseio.com",
    projectId: "athena-cd90a",
    storageBucket: "athena-cd90a.appspot.com",
    messagingSenderId: "634389037570"
  };
  firebase.initializeApp(config);

const messaging = firebase.messaging();
messaging.requestPermission()
.then(function () {
    return messaging.getToken();
})
    .then(function (token) {
    console.log(token);
})
    .catch(function (err) {
    console.log('erro');
})
