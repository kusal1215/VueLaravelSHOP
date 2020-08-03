import Vue from 'vue'
import VueRouter from 'vue-router'

Vue.use(VueRouter)

import  Home from './components/Home'
import AddProduct from './components/AddProduct'
import About from './components/About'
import Contact from './components/Contact'
import List from './components/List'
import Edit from './components/Edit'

const router = new VueRouter({

  mode:'history',

  routes:[

    {
      path:"/",
      component:Home,
    },

    {
      path:"/add",
      component:AddProduct,
    },

    {
      path:"/about",
      component:About,
    },

    {
      path:"/contact",
      component:Contact,
    },

    {
      path:"/list",
      component:List,
    },

    {
      path:"/edit/:id",
      component:Edit,
    },
  ]

});

export default router

