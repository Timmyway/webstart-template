import { createApp } from 'vue';
import { createPinia } from 'pinia';
import main from '../pages/main';

const pinia = createPinia()
const app = createApp(main);

// app.provide('apiURL', window.apiURL);
app.use(pinia)

app.mount('#app');
