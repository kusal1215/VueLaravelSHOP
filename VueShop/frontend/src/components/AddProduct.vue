<template>
  <div class="container">
    <h2>Add product</h2>

    <form @submit.prevent="submitform">
      <div class="form-group">
        <label for="productInput">Product Name</label>
        <input type="text" v-model="item.name" class="form-control" id="productInput" placeholder="enter product name" autofocus required>
      </div>
      <div class="form-group">
      <label for="productQuantity">Quantity</label>
      <input type="number" v-model="item.quantity" class="form-control" id="productQuantity" placeholder="enter quantity">
    </div>
      <div class="form-group">
        <label for="productPrice">Price</label>
        <input type="number" v-model="item.price" class="form-control" id="productPrice" placeholder="enter price">
      </div>
      <div class="form-group">
        <label for="productPicture">Picture</label>
        <input type="file"
               name="image"
               class="form-control"
               id="productPicture"
               @change="getimage($event)"
               placeholder="select picture">
      </div>
      <button
        type="submit"
        class="btn btn-primary"
        v-show="item.name && item.quantity && item.price">Add To the List
      </button>
    </form>

  </div>
</template>

<script>
  export default {
    data(){
      return {

        item: {
          name:'',
          quantity:0,
          price:0,
          image:''
        }

      }
    },

    methods: {

      submitform(){

        let see = this;

        see.$http.post("http://127.0.0.1:8000/api/addItem", see.item)
        .then(function (response) {
          console.log(response);
          see.$router.push('/list')
        })
        // console.log("form submitted");

      },

      getimage(event) {
        var filereader = new FileReader();

        filereader.readAsDataURL(event.target.files[0]);
        filereader.onload = (event) => {
          this.item.image = event.target.result;
        }
        console.log(this.item)
      },

    },
  }
</script>
