import axios from "axios"
import Cookies from "js-cookie"
import * as types from "../mutations_types"

// state
const state = {
    user=null,
    token:Cookies.get("token")
}

// getters
const getters={
    user:state=>state.user,
    token:state=>state.token,
    check:state=>state.user!==null
}
// mutations
const mutations={
    [types.SAVE_TOKEN](state,{token,remember}){
        state.token=token;
        Cookies.set("token",token,{expires:remember ?100:null});
    },
    [types.FETCH_USER_SUCCESS](state,{user}){
        state.user=user.data;
    },
    [types.FETCH_USER_FAILURE](state){
        state.token=null;
        Cookies.remove("token");
    },
    [types.LOGOUT](state){
        state.user=null;
        state.token=null;
        Cookies.remove("token");
    }
}
