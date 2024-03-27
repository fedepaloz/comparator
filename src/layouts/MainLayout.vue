<template>
  <div>
    <input type="text" v-model="field1" placeholder="Field 1" />
    <input type="text" v-model="field2" placeholder="Field 2" />
    <button @click="submitData">Submit</button>
  </div>
</template>

<script>
export default {
  data() {
    return {
      field1: "",
      field2: "",
    };
  },
  methods: {
    submitData() {
      // Send POST request to the backend
      fetch("http://your-backend-url/post_handler.php", {
        method: "POST",
        headers: {
          "Content-Type": "application/json",
        },
        body: JSON.stringify({
          field1: this.field1,
          field2: this.field2,
        }),
      })
        .then((response) => {
          if (response.ok) {
            console.log("Data submitted successfully");
            // Reset form fields if needed
            this.field1 = "";
            this.field2 = "";
          } else {
            throw new Error("Network response was not ok.");
          }
        })
        .catch((error) => {
          console.error(
            "There was a problem with your fetch operation:",
            error
          );
        });
    },
  },
};
</script>
