@extends('layout.app')

@section('header')
    <header>
        <h1 class="text-center">Taison Products</h1>
    </header>  
@endsection

@section('content')
    @include('modal')
    <section>
        <div class="panel panel-primary">
            <div class="panel-heading">
                Products List
                <button class="btn btn-success btn-sm"  id="show-modal" @click="showModal = true" v-bind:type="add"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span></button>
            </div>
            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Size</th>
                        <th>Product Code</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr
                      is="List"
                      v-for="(product, index) in products"
                      v-bind:key="product.id"
                      v-bind:product="product"
                      @remove="remove(index)"
                      @edit="edit(product)"
                    ></tr>
                </tbody>
            </table>
        </div>
    </section>
      
      <modal v-if="showModal" @close="showModal = false" @add="add()" @update="save()" v-bind:product="product"></modal>
@endsection