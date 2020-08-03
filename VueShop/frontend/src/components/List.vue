<template>

  <div class="container">

    <h2>Product Basket</h2>

    <div id="products" class="row view-group">

      <div class="item col-xs-4 col-lg-4" v-for="item in items">
        <div class="thumbnail card">
          <div class="img-event">
            <img class="group list-group-image img-fluid" v-bind:src="'http://127.0.0.1:8000/'+item.image" alt="" />
          </div>
          <div class="caption card-body">
            <h4 class="group card-title inner list-group-item-heading">
              Name :{{item.name}}</h4>
            <p class="group inner list-group-item-text">
              Price : {{item.price}}</p>
            <div class="row">
              <div class="col-xs-12 col-md-6">
                <p class="lead">
                  Quantity : {{item.quantity}}</p>
              </div>
              <div class="col-xs-12 col-md-6">
<!--                <a class="btn btn-success" href="#">Edit</a>-->
                <router-link class="btn btn-success" :to="'/edit/'+item.id"> Edit </router-link>
              </div>
              <div class="col-xs-12 col-md-6">
                <a class="btn btn-danger" href="#" @click="deleteItem($event)" v-bind:id="item.id">Delete</a>
              </div>
            </div>
          </div>
        </div>
      </div>

    </div>

  </div>

</template>

<script>
  export default{

    data(){
      return{

        items:[]

      }
    },

    created() {

      this.$http.get("http://127.0.0.1:8000/api/getItems")
      .then(function (response) {
            console.log(response)
          this.items = response.body.allItems;
      })
    },

    methods: {
      deleteItem(event) {
        console.log(event.target.id)
        this.$http.delete("http://127.0.0.1:8000/api/deleteItem/"+event.target.id)
        .then(function (response) {
            console.log(response);

            var position = this.items.findIndex(function (element) {
                return element.id == event.target.id;
            });

          this.items.splice(position,1)
        })
      }
    }

  }
</script>
