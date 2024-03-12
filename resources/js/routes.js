import Viewsalles from "./components/salles/Viewsalles.vue"
import Addspectacle from "./components/salles/Addspectacle.vue"
export const routes = [
{
name: 'Viewsalles',
path: '/listsal',
component: Viewsalles
},
{
    name:"Addspectacle",
    path:"/addspectacle",
    component:Addspectacle
    }
];
