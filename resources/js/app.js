/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

import './bootstrap';
import { initializeApp } from "firebase/app";
import { getMessaging, getToken } from "firebase/messaging";
import axios from 'axios';

/**
 * Next, we will create a fresh Vue application instance. You may then begin
 * registering components with the application instance so they are ready
 * to use in your application's views. An example is included for you.
 */

// const app = createApp({});

// import ExampleComponent from './components/ExampleComponent.vue';
// app.component('example-component', ExampleComponent);

const firebaseConfig = {
    apiKey: "AIzaSyATm0LUoSIzAQ2tvCSjx9WQCtWnl9-A7e0",
    authDomain: "chat-app-ad5d1.firebaseapp.com",
    projectId: "chat-app-ad5d1",
    storageBucket: "chat-app-ad5d1.appspot.com",
    messagingSenderId: "281207159662",
    appId: "1:281207159662:web:ccee54da2511ea7443df7f",
    measurementId: "G-HNMP1887J7"
};

const app = initializeApp(firebaseConfig);

const messaging = getMessaging(app);

messaging.requestPermission().then(() => {
    console.log('Notification permission granted.');
    return getToken(messaging, { vapidKey: "BKagOny0KF_2pCJQ3m....moL0ewzQ8rZu" });;
}).then(token => {
    console.log(token)
    axios.post('/save-device-token', { token });
}).catch(err => {
    console.log('Unable to get permission to notify.', err);
});

messaging.onMessage(payload => {
    console.log('Message received. ', payload);
});

app.mount('#app');
