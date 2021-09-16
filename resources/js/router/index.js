import Vue from 'vue'
import VueRouter from 'vue-router';

Vue.use(VueRouter);



import Dashboard from '../components/DashBoard.vue'
import Dataset from '../components/Dataset/DatasetComponent.vue'
import Prediksi from '../components/Prediksi/MainPrediksi.vue'

let routes=[
    {
        path:'/',
        name:"Dashboard",
        component:Dashboard,
    },
    {
        path:'/dashboard',
        name:"Dashboard",
        component:Dashboard,
    },
    {
        path:'/dataset',
        name:"Dataset",
        component:Dataset,
    },
    {
        path:'/prediksi',
        name:"Prediksi",
        component:Prediksi,
    }
];


const router = new VueRouter({
    mode: 'history',
    routes    
})

export default router;


