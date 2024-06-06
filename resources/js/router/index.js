import { createRouter, createWebHashHistory } from 'vue-router'
import LoginView from '../components/LoginView.vue'

const routes = [
  {
    path: '/',
    name: 'login',
    component: LoginView
  },
  {
    path: '/dashboard',
    name: 'dashboard',
    component: () => import('../components/DashboardView.vue')
  },
  {
    path: '/rooms',
    name: 'rooms',
    component: () => import('../components/RoomsView.vue')
  },
  {
    path: '/properties',
    name: 'properties',
    component: () => import('../components/PropertiesView.vue')
  }
]

const router = createRouter({
  history: createWebHashHistory(),
  routes
})

export default router

