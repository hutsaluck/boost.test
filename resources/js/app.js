import '../css/app.css';
import { createApp } from 'vue';
import App from './components/App.vue';
import router from './index.js';
import axios from 'axios';

// const app = createApp(App);
//
// app.use(router);
// app.mount('#app');


createApp(App)
    // .component('App', App)
    .use(router)
    .mount('#app')
