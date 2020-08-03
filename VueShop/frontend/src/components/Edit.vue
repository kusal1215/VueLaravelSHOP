<template>

  <div class="container">
    <h2>Eit product</h2>

    <form @submit.prevent="updateInfo">
      <div class="form-group">
        <label for="productInput">Product Name</label>
        <input type="text" class="form-control" v-model="product.name" id="productInput" placeholder="enter product name" autofocus required>
      </div>
      <div class="form-group">
        <label for="productQuantity">Quantity</label>
        <input type="number"  class="form-control" v-model="product.quantity" id="productQuantity" placeholder="enter quantity">
      </div>
      <div class="form-group">
        <label for="productPrice">Price</label>
        <input type="number" class="form-control" v-model="product.price" id="productPrice" placeholder="enter price">
      </div>

      <button
        type="submit"
        class="btn btn-primary"
        v-show="product.name && product.quantity && product.price">Update
      </button>
    </form>

  </div>

</template>

<script>
  export default {

    data() {
      return {
        product:[]
      }
    },

    created() {
      console.log(this.$route.params.id)
      this.getData();
    },

    methods: {
      getData() {

        this.$http.get("http://127.0.0.1:8000/api/getItem/"+this.$route.params.id)
        .then(function (response) {
            console.log(response);
            this.product = response.body.item;
        })

      },

      updateInfo() {

        this.$http.put("http://127.0.0.1:8000/api/editItem/"+this.$route.params.id,this.product)
          .then(function (response) {
            console.log(response);
            this.$router.push('/list')
          })

      },
    }

  }


</script>
