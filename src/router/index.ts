import { createRouter, createWebHistory } from 'vue-router'
import Group from '../components/Group.vue'
import HomeView from '../views/HomeView.vue'
import CategoryView from '@/components/CategoryView.vue'

const routes = [
  {
    path : '/',
    name : 'home',
    component : HomeView,
  },
  { 
    path: '/group/:name',
    name: 'group',
    component: Group,
    props: true,  
  },
  {
    path: '/productdetail/:id',
    name: 'viewProduct',
    component:CategoryView,
    
  }
  
]

const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes: routes,   
})




export default router
