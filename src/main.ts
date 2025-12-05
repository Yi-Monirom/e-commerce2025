import './assets/main.css'

import { createApp } from 'vue'
import App from './App.vue'
import { createPinia } from 'pinia'
import router from './router';
import PPPSS from 'pinia-plugin-persistedstate'

const app = createApp(App);
const pinia = createPinia();
pinia.use(PPPSS);
app.use(router);
app.use(pinia);   // VERY IMPORTANT
app.mount('#app');

