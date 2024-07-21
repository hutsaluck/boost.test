import { createRouter, createWebHistory } from 'vue-router';
import Countries from './components/Countries.vue';
import Companies from './components/Companies.vue';
import Leaders from './components/Leaders.vue';
import Home from "./components/Home.vue";

const routes = [
    {
        path: '/',
        name: 'Home',
        component: Home
    },
    {
        path: '/countries',
        name: 'Countries',
        component: Countries
    },
    {
        path: '/companies',
        name: 'Companies',
        component: Companies
    },
    {
        path: '/leaders',
        name: 'Leaders',
        component: Leaders
    }
];

const router = createRouter({
    history: createWebHistory(),
    routes
});

export default router;
