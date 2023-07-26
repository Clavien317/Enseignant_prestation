import {createRouter,createWebHistory} from "vue-router"
import HelloWorld from './components/HelloWorld.vue'
import Contact from "../src/routes/Contact.vue"
import Apropos from "../src/routes/Apropos.vue"
import Enseignant from '../src/routes/Enseignant.vue'
import Ajouter from '../src/routes/Ajout.vue'
import Modifier from "./routes/Modifier.vue"
// import Mod from './routes/Mod.vue'



const routes=
[
    {
        path: "/",
        name: "Home",
        component: HelloWorld
    },
    {
        path: "/contact",
        name: "Contact",
        component: Contact    
    },
    {
        path: "/about",
        name: "Apropos",
        component: Apropos    
    },
    {
        path: "/enseignant",
        name: "Enseignant",
        component: Enseignant    
    },
    {
        path: "/ajout",
        name: "Ajouter",
        component: Ajouter    
    },
    {
        path: "/modifier/:id",
        name: "Modifier",
        component: Modifier   
    }
]


const router = createRouter({
    history: createWebHistory(),
    routes
})


export default router