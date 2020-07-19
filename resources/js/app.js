import component from "vuetify/lib/util/component";

require('./bootstrap');

window.Vue = require('vue');

import VueRouter from 'vue-router';
Vue.use(VueRouter);

import VueAxios from 'vue-axios';
import axios from 'axios';
//
import admin from './app/app';
Vue.use(VueAxios, axios);




import AdminHomeComponet from './components/AdminHomeComponet/AdminHomeComponet';
import AdminMenuComponent from './components/AdminMenuComponent/AdminMenuComponent';
import TbaleComponent from './app/app';
import AdminSizesComponent from './components/AdminSizesComponent/AdminSizesComponent';
import AdminLengthsComponent from './components/AdminLengthsComponent/AdminLengthsComponent';
import AdminColorsComponent from './components/AdminColorsComponent/AdminColorsComponent';
import AdminCategoriesComponent from './components/AdminCategoriesComponent/AdminCategoriesComponent';
import AdminUsersComponent from './components/AdminUsersComponent/AdminUsersComponent';
import AdminInboxComponent from './components/AdminInboxComponent/AdminInboxComponent';
import AdminShowMessageComponent from './components/AdminShowMessageComponent/AdminShowMessageComponent';

const routes = [
    {
        name: 'usersadmin',
        path: '/profil/admin/usersadmin',
        component: AdminUsersComponent,
    },

    {
        name: 'adminsizes',
        path: '/profil/admin/sizesadmin',
        component: AdminSizesComponent,
    },

    {
        name: 'adminlengths',
        path: '/profil/admin/lengthsadmin',
        component: AdminLengthsComponent,
    },

    {
        name: 'admincolors',
        path: '/profil/admin/colorsadmin',
        component: AdminColorsComponent,
    },

    {
        name: 'admincategories',
        path: '/profil/admin/categoriesadmin',
        component: AdminCategoriesComponent,
    },

    {
        name: 'admininbox',
        path: '/profil/admin/inboxadmin',
        component: AdminInboxComponent,
    },

    {
        name: 'adminshowmessage',
        path: '/profil/admin/showmessage/:id',
        component: AdminShowMessageComponent,
    },

];


// let routes = [
//     {path:'/index',component:require('./app/app')}
// ]
//
// const  router = new VueRouter({
//
//     routes
// })

// Vue.component('example-component',require('./app/app'));
const router = new VueRouter({ mode: 'history', routes: routes});
const app = new Vue(Vue.util.extend({ router }, AdminMenuComponent)).$mount('#app');
