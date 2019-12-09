importScripts("https://www.gstatic.com/firebasejs/4.1.5/firebase-app.js");
importScripts("https://www.gstatic.com/firebasejs/4.1.5/firebase-messaging.js");
importScripts('https://www.gstatic.com/firebasejs/4.1.5/firebase.js');
  
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
messaging.setBackgroundMessageHandler(function(payload){
	const notificationTitle = 'Athena';
  const notificationOptions = {
    body: 'Nova Mensagem.',
    icon: 'img/favicon.png'

	};
	return self.registration.showNotification(notificationTitle, notificationOptions);
});