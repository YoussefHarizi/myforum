import Vue from "vue";
import VueRouter from "vue-router";
import routes from "./routes/index";
import store from "./store/index";
Vue.use(VueRouter);

// vform
import { Form, HasError, AlertError } from "vform";
window.Form = Form;

Vue.component(HasError.name, HasError);
Vue.component(AlertError.name, AlertError);

const app = new Vue({
    el: "#app",
    router: new VueRouter(routes),
    store
});
