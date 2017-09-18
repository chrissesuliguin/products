<script type="text/x-template" id="modal">
  <transition name="modal">
    <div class="modal-mask">
      <div class="modal-wrapper">
        <div class="modal-container">

          <div class="modal-header">
            <slot name="header">
              <h4 class="modal-title" id="modalLabel">Add Product</h4>
            </slot>
          </div>

          <div class="modal-body">
            <slot name="body">
              <form action="/" method="POST" id="modal-form">
				  <div class="form-group">
				    <label for="productName">Name</label>
				    <input type="text" v-model="product.name" name="name" class="form-control" id="productName">
				  </div>
				  <div class="row">
				  	<div class="col-lg-6">
				  		<div class="form-group">
						    <label for="productPrice">Price</label>
						  	<div class="input-group">
							  	<span class="input-group-addon">$</span>
							  	<input type="text" v-model="product.price" class="form-control" id="productPrice" name="price">
							</div>
						  </div>
					</div>
				  	<div class="col-lg-6">
						<div class="form-group">
						    <label for="productQuantity">Quantity</label>
						    <input type="number" v-model="product.quantity" min="0" class="form-control" id="productQuantity" name="quantity">
					 	</div>
					</div>
				  </div>
				  <div class="form-group">
				    <label for="productSize">Size</label>
				    <select v-model="product.size">
					  <option disabled value="">Please select one</option>
					  <option value="S">Small</option>
					  <option value="M">Medium</option>
					  <option value="L">Large</option>
					</select>
				  </div>
				</form>
            </slot>
          </div>

          <div class="modal-footer">
            <slot name="footer">
            	<button type="button" class="btn btn-default" @click="$emit('close')">Cancel</button>
        		<button type="button" @click="$emit('update')" class="btn btn-primary btn-submit">Update</button>
        		<button type="button" @click="$emit('add')" class="btn btn-primary btn-submit">Add</button>
            </slot>
          </div>
        </div>
      </div>
    </div>
  </transition>
</script>