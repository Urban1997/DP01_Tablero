import { createApp } from 'vue';
import router from './router';
import '../css/app.css';
import App from './App.vue';

import PrimeVue from 'primevue/config';
import Aura from '@primevue/themes/aura';
import 'primeicons/primeicons.css';

const app = createApp(App);

app.use(router);
app.use(PrimeVue, {
  theme: {
    preset: Aura
  },
  locale: {
    startsWith: 'Empieza con',
    contains: 'Contiene',
    notContains: 'No contiene',
    endsWith: 'Termina con',
    equals: 'Es igual a',
    notEquals: 'No es igual',
    noFilter: 'Sin filtro',
    lt: 'Menor que',
    lte: 'Menor o igual que',
    gt: 'Mayor que',
    gte: 'Mayor o igual que',
    dateIs: 'La fecha es',
    dateIsNot: 'La fecha no es',
    dateBefore: 'Antes de',
    dateAfter: 'Después de',
    clear: 'Limpiar',
    apply: 'Aplicar',
    matchAll: 'Coincidir todos',
    matchAny: 'Coincidir alguno',
    addRule: 'Agregar regla',
    removeRule: 'Eliminar regla',
    accept: 'Aceptar',
    reject: 'Rechazar',
    choose: 'Elegir',
    upload: 'Subir',
    cancel: 'Cancelar'
  }
});

app.mount('#app');
