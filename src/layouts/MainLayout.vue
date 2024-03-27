<template>
  <div>
    <input v-model="name" type="text" />
    <button @click="postData">Send Data</button>
  </div>
  {{}}
</template>

<script setup>
import { ref } from "vue";
import axios from "axios";

const name = ref("");

const postData = () => {
  const data = {
    name: name.value,
  };

  axios
    .post("http://localhost/comparator/backend/post_handler.php", data)
    .then((response) => {
      console.log(response.data);
    })
    .catch((error) => {
      console.error("Error:", error);
    });
};
</script>

<style></style>
