<template>
  <table class="table table-bordered">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Desc</th>
          <th scope="col">Link</th>
          <th scope="col">Vitamina k</th>
        </tr>
      </thead>
      <tbody>
        <slot></slot>
      </tbody>
    </table>
</template>

<script>

export default {
 
  data() {
    return {};
  }
};
</script>

<style >

</style>
