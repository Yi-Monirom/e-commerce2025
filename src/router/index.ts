import { createRouter, createWebHistory } from 'vue-router'
import Group from '../components/Group.vue'

const routes = [
  { 
    path: '/group/:name',
    name: 'group',
    component: Group,
    props: true,  
  }
]

const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes: routes,   
})

export default router
