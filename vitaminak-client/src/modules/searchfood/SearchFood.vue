<template>
  <div>
    <h2>Search Food</h2>
    <search-food-form @searchFood="searchFood($event)"></search-food-form>
    <search-food-table>
      <tr v-for="(food) of foods" v-bind:key="food.id">
        <th scope="row">{{food.id}}</th>
        <td>{{food.desc}}</td>
        <td><a :href="food.link" target="_blank">full desc</a></td>
        <td>{{food.vitaminak}}</td>
      </tr>
    </search-food-table>

  </div>
</template>

<script>

import SearchFoodTable from "../searchfood/SearchFoodTable"; 
import SearchFoodForm from "../searchfood/SearchFoodForm"; 
export default {
  components: {
    "search-food-table": SearchFoodTable,
    "search-food-form": SearchFoodForm,
  },
  data() {
    return {
      foods: []
    };
  },
  created() {
   
  },
  methods: {
    searchFood(event){
      let url = "/food?desc="+event.desc;
    this.$http
        .get(url)
        .then(res => res.json())
        .then(
          response => (this.foods = response.data.foods),
          err => console.log()
        );

      alert(url);
    }
  }
};
</script>

<style>
.table-head > span {
  border: 1px solid;
  margin: 0px;
  width: 100%;
}

.table-head {
  width: 100%;
}
</style>

