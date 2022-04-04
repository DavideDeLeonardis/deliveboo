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
            // state.cart.push(dish)
            // Vue.set(dish, 'quantity', 1);
            let found = state.cart.find(product => product.id == dish.id);

            if (found) {
                found.quantity++;
            } else {
                state.cart.push(dish);

                Vue.set(dish, 'quantity', 1);
            }
        },
        SUBTRACT_DISH(state, dish){
            if (dish.quantity != 1){    
                dish.quantity--;
            }
        },
        DELETE_DISH(state, dish){
            let index = state.cart.indexOf(dish)
            state.cart.splice(index, 1)
        },
        CLEAR_CART(state){
            state.cart = []
        }
    },
    actions:{
        addItem({commit}, dish){
            commit('ADD_DISH', dish)
        },
        subtractItem({commit}, dish){
            commit('SUBTRACT_DISH', dish)
        },
        removeItem({commit}, dish){
            commit('DELETE_DISH', dish)
        },
        clearCart({commit}){
            commit('CLEAR_CART')
        }
    },
};

export default store;