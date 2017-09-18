
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */
// import List from './components/List.vue'


const STORAGE_KEY = "taison-products"

const store = {
  get: function () {
    const products = JSON.parse(localStorage.getItem(STORAGE_KEY) || '[]');
    products.forEach(function (p, index) {
      p.id = index
    })
    store.total = products.length
    return products
  },
  save: function (products) {
    localStorage.setItem(STORAGE_KEY, JSON.stringify(products))
  }
}

const generate = () => {
	return Math.random().toString(36).substr(2, 4)
}

Vue.component('List', {
  template: `
  	<tr>
	  	<td>{{ product.id }}</td>
	  	<td>{{ product.name }}</td>
		<td>{{ product.price }}</td>
		<td>{{ product.quantity }}</td>
		<td>{{ product.size }}</td>
		<td>{{ product.code }}</td>
		<td>
			<button class="btn btn-success btn-sm" v-on:click="$emit('edit')">
				<span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
			</button>
			<button v-on:click="$emit('remove')" class="btn btn-info btn-sm">
				<span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
			</button>
		</td>
  	</tr>
  `,
  props: ['product']
})

Vue.component('modal', {
  template: '#modal',
  props: ['product']
})

const app = new Vue({
    data: {
    	showModal: false,
    	status: false,
		products: store.get(),
		product: {
			name: "",
			price: "",
			quantity: "",
			size: "",
			code: generate(),
		},
	},
	methods: {
		add: function(){
			const {name, price, quantity, size} = this.product
			this.products.push({
		        id: store.total++,
		        name: name,
		        price: price,
		        quantity: quantity,
		        size: size,
		        code: generate(),
		    });
			this.save()
		},

		edit: function(product){
			this.showModal = true;
			this.product = product;
		},

		remove: function(id){
			this.products.splice(id, 1)
			this.save()
		},
		save: function() {
			store.save(this.products)
			this.showModal = false;
		}
	},
});

app.$mount('#app');