// require('./bootstrap');

// import Vue from 'vue';
// import router from './routes';
// import TaskForm from './components/TaskForm.vue'; // Import the TaskForm component
// import TaskList from './components/TaskList.vue'; // Import the TaskForm component
// import TaskEdit from './components/TaskEdit.vue'; // Import the TaskEdit component

// new Vue({
//   el: '#app',
//   router,
//   components: {
//     TaskForm, // Register the TaskForm component
//     TaskEdit,
//   },
// });

// new Vue({
//     el: '#list',
//     router,
//     components: {

//       TaskList, // Register the TaskForm component
//     },
//   });

//   new Vue({
//     el: '#Edit',
//     router,
//     components: {

//       TaskEdit, // Register the TaskForm component
//     },
//   });

import Vue from 'vue';
import Root from './components/Root.vue'; // Import the Root component
import Header from './components/Header.vue'; //
import router from './routes';

new Vue({
  el: '#app',
  router,
  components: {
    Header, // Register the Header component
  },

  render: (h) => h(Root,Header), // Use the Root component as the root component
});


