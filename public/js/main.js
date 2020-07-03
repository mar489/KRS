let app = new Vue({
    el:'#main',
    data:{
        size: 3,
        res: 0,
        final: 0,
        delivery: '',
    },

    created:function () {
        if (this.getCookie('avail_cart')){
            let cart = JSON.parse(this.getCookie('avail_cart'));
            for (let i = 0; i < cart.length; i++){
                this.res += cart[i].count * cart[i].price;
            }
            this.final = this.res
        }
    },

    methods:{
        updatePrice(){
            console.log(this.delivery);
            this.res = 0;
            let cart = JSON.parse(this.getCookie('avail_cart'));
            for (let i = 0; i < cart.length; i++){
                this.res += cart[i].count * cart[i].price;
                console.log(cart[i].count);
                console.log(cart[i].price);
            }

            if (this.delivery === "1" && this.res < 1000){
                this.final = this.res + 300;
                console.log(this.final)
            }
            else{
                this.final = this.res;
            }
        },

        safeToCart(id, prod_key, price){
            if(!this.getCookie(prod_key)){
                this.setCookie(prod_key, JSON.stringify([{item_id: id, size:this.size, count: 1, price: price}]), {"max-age":315532800});
            } else {
                let temp = JSON.parse(this.getCookie(prod_key));
                if (!temp.find(item => item.item_id === id && item.size === this.size)) {
                    temp.push({item_id: id, size:this.size, count: 1, price: price});
                    this.setCookie(prod_key, JSON.stringify(temp), {"max-age":315532800})
                }
                else {
                    let prod = temp.find(item => item.item_id === id && item.size === this.size);
                    let index = temp.indexOf(prod);
                    temp[index] = {item_id: prod.item_id, size:prod.size, count: prod.count + 1, price: prod.price};
                    this.setCookie(prod_key, JSON.stringify(temp), {"max-age":315532800})
                }
            }
            this.updatePrice()
        },

        safeToCartFromCart(id, size, sign){
            let temp = JSON.parse(this.getCookie('avail_cart'));
            let prod = temp.find(item => item.item_id === id && item.size === size);
            let index = temp.indexOf(prod);
            if (sign === 'plus') {
                temp[index] = {item_id: prod.item_id, size:prod.size, count: prod.count + 1, price: prod.price};
                this.setCookie('cart', JSON.stringify(temp), {"max-age":315532800});
                this.setCookie('avail_cart', JSON.stringify(temp));
            }
            else if(sign === 'minus'){
                if (prod.count > 1){
                    temp[index] = {item_id: prod.item_id, size:prod.size, count: prod.count - 1, price: prod.price};
                    this.setCookie('cart', JSON.stringify(temp), {"max-age":315532800});
                    this.setCookie('avail_cart', JSON.stringify(temp));
                }
            }
            this.updatePrice()
        },

        safeToFav(id, prod_key){
            if(!this.getCookie(prod_key)){
                this.setCookie(prod_key, JSON.stringify([id]), {"max-age":315532800});
            } else {
                let temp = JSON.parse(this.getCookie(prod_key));
                if (!temp.find(item => item=== id )) {
                    temp.push(id);
                    this.setCookie(prod_key, JSON.stringify(temp), {"max-age":315532800})
                }
            }
        },

        deleteFav(id){
            let temp = JSON.parse(this.getCookie('liked_prod'));
            let index = temp.indexOf(id);
            temp.splice(index, 1);
            this.setCookie('liked_prod', JSON.stringify(temp), {"max-age":315532800});
            location.reload()
        },

        deleteCart(id, size){
            let temp = JSON.parse(this.getCookie('cart'));
            let index = temp.indexOf(temp.find(item => item.item_id === id && item.size === size));
            temp.splice(index, 1);
            this.setCookie('cart', JSON.stringify(temp), {"max-age":315532800});
            location.reload()
        },


        getCookie(name) {
            let matches = document.cookie.match(new RegExp(
            "(?:^|; )" + name.replace(/([\.$?*|{}\(\)\[\]\\\/\+^])/g, '\\$1') + "=([^;]*)"
                ));
            return matches ? decodeURIComponent(matches[1]) : undefined;
        },

        setCookie(name, value, options = {}) {

            options = {
                path: '/',
                //
                ...options
            };

            if (options.expires instanceof Date) {
                options.expires = options.expires.toUTCString();
            }

            let updatedCookie = encodeURIComponent(name) + "=" + encodeURIComponent(value);

            for (let optionKey in options) {
                updatedCookie += "; " + optionKey;
                let optionValue = options[optionKey];
                if (optionValue !== true) {
                    updatedCookie += "=" + optionValue;
                }
            }

            document.cookie = updatedCookie;
        },

        setFinal(){
            this.setCookie('final', this.final, {"max-age":1800})
        },
    },
});

