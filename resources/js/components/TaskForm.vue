<template>
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-6">
        <div class="card">
          <div class="card-header">Create Form   </div>


          <div class="card-body">
            <form @submit.prevent="createTask">
              <div class="form-group">
                <label for="title">Title:</label>
                <input type="text" id="title" v-model="task.title" class="form-control" required>
              </div>
              <div class="form-group">
                <label for="description">Description:</label>
                <textarea id="description" v-model="task.description" class="form-control" required></textarea>
              </div>
              <button type="submit" class="btn btn-primary">Create Task</button>
              <router-link to="tasks/list" class="btn btn-danger">Go to List</router-link>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import axios from 'axios'; // Import Axios
export default {
  data() {
    return {
      task: {
        title: '',
        description: '',
      },
    };
  },
  methods: {
    createTask() {
      // Handle form submission here
   axios.post('/api/tasks', this.task)
        .then(() => {
           // Task created successfully, you can redirect to the task list or perform other actions
           alert("ok");
           this.$router.push('tasks/list');
        })
         .catch(error => {
          console.error('Error creating task:', error);
         });
    },
  },
};
</script>

<style scoped>
.container {
 position: absolute;
  left: 50%;
  transform: translate(-50%, 30%);
  align-items: center;
  min-height: 100vh;

}

.card {
  width: 100%;
}

.form-group {
  margin-bottom: 15px;
}
</style>
