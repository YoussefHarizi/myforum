// import Home from "../components/Home.vue";
import Home from "../pages/Home.vue";
import Login from "../pages/auth/Login.vue";

export default {
    mode: "history",
    routes: [
        // {
        //     path: "/",
        //     name: "home",
        //     component: Home
        // },
        {
            path: "/home",
            name: "home",
            component: Home
        },
        {
            path: "/login",
            name: "login",
            component: Login
        }
    ]
};
