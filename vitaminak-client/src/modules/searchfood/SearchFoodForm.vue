<template>
  <div>

   
    <form
  id="app"
  @submit="checkForm"
  action="https://vuejs.org/"
  method="post"
  novalidate="true">

  <p v-if="errors.length">
    <b>Please correct the following error(s):</b>
    <ul>
      <li v-for="error in errors" >
        {{ error }}
        </li>
    </ul>
  </p>

  <p>
    <label for="title">Description:</label>
    <input
      id="desc"
      v-model="food.desc"
      type="text"
      name="desc"
    />
  </p>
  <p>
    <input
      type="button"
      value="Search"  @click="checkForm"  >
  </p>

</form>

  </div>
</template>

<script>
export default {
  data() {
    return {
      errors: [],
      food: {
        desc: ""
      }
    };
  },
  methods: {
    checkForm: function(event) {
       event.preventDefault();
      this.errors = [];

      if (!this.food.desc) {
        this.errors.push("desc is required.");
      }
      
      if (this.errors.length == 0) {
        this.searchFood(JSON.parse(JSON.stringify(this.food)));
      } 
    },

    searchFood(food) {
      this.$emit("searchFood",food);
    }
  },
  created() {}
};
</script>

<style >
</style>
