import { createRouter, createWebHistory } from 'vue-router'

import Dashboard from '../views/Dashboard.vue'
import Usuarios from '../views/Usuarios.vue'

const routes = [
    { path: '/', component: Dashboard },
    { path: '/usuarios', component: Usuarios },
]

const router = createRouter({
    history: createWebHistory(),
    routes,
})

export default router
