import Vue from 'vue'
import App from './App.vue'
import Router from './routes'
import Vuelidate from 'vuelidate'
import vueResource from 'vue-resource'

Vue.use(Vuelidate);
Vue.use(vueResource);

new Vue({
  el: '#app',
  render: h => h(App),
  router:Router
})
