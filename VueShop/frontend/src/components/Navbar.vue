<template>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="#">SHOP</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item active"><router-link to="/"> Home </router-link></li>
        <li class="nav-item"><router-link to="add">Add Product</router-link></li>
        <li class="nav-item"><router-link to="list"> Product Basket </router-link></li>
        <li class="nav-item"><router-link to="about">About</router-link></li>
        <li class="nav-item">Contact</li>
      </ul>
    </div>
  </nav>
</template>

<script>
  export default {
  }
</script>
