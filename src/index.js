// Import the functions you need from the SDKs you need

import { initializeApp } from "firebase/app";

import { getAnalytics } from "firebase/analytics";

// TODO: Add SDKs for Firebase products that you want to use

// https://firebase.google.com/docs/web/setup#available-libraries


// Your web app's Firebase configuration

// For Firebase JS SDK v7.20.0 and later, measurementId is optional

const firebaseConfig = {

  apiKey: "AIzaSyDc_b1SeOf-DakMQ6AHozAcXe_DFEJHnlI",

  authDomain: "chrisolysimgym.firebaseapp.com",

  projectId: "chrisolysimgym",

  storageBucket: "chrisolysimgym.appspot.com",

  messagingSenderId: "409405984681",

  appId: "1:409405984681:web:c7564a5422571d728abeb8",

  measurementId: "G-SD6V0T8D00"

};


// Initialize Firebase

const app = initializeApp(firebaseConfig);

const analytics = getAnalytics(app);