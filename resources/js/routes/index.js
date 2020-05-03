import Home from "../components/Home.vue";
import Test from "../components/Test.vue";

export default {
    mode: "history",
    routes: [
        {
            path: "/",
            name: "home",
            component: Home
        },
        {
            path: "/test",
            name: "test",
            component: Test
        }
    ]
};
