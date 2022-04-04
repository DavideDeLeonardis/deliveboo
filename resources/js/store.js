let cart = window.localStorage.getItem('cart');


let store = {
    state: {
        data: 'prova',
        dishes: '',
        cart: cart ? JSON.parse(cart) : [],
    }, 
    getters:{},
    mutations:{
        ADD_DISH(state, dish){
            state.cart.push(dish)
        },
        DELETE_DISH(state, dish){
            let index = state.cart.indexOf(dish)
            state.cart.splice(index, 1)
        }
    },
    actions:{
        addItem({commit}, dish){
            commit('ADD_DISH', dish)
        },
        removeItem({commit}, dish){
            commit('DELETE_DISH', dish)
        }
    },
};

export default store;