import '../css/app.css';
import { createApp } from 'vue';
import App from './components/App.vue';
import router from './index.js';

createApp(App)
    .use(router)
    .mount('#app')
