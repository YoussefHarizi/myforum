export default {
    state: {
        title: "test vuex "
    },
    mutations: {},
    actions: {},
    modules: {},
    getters: {
        showmsg(state) {
            return state.title;
        }
    }
};
