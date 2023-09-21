<template>
  <div>
   <Header></Header> <!-- Include the Header component -->
    <router-view></router-view>
  </div>
</template>

<script>
import axios from 'axios'; // Import Axios
import Header from './Header.vue'; //
export default {
  name: 'Root',
  components: {
    Header, // Register the Header component
  },
};
</script>
