<template id="list">
	<div v-show="products.length">
		<ul>
			<li v-for="product in products">{{ product.id }}</li>
		</ul>
	</div>
</template>
