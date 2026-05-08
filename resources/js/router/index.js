import { createRouter, createWebHistory } from 'vue-router'
import Home from '../components/Home.vue'
import Admin from '../components/Admin.vue'
import Login from '../components/Login.vue'

const routes = [
  { path: '/', component: Home },
  { path: '/admin', component: Admin },
  { path: '/login', component: Login }
]

export default createRouter({
  history: createWebHistory(),
  routes
})