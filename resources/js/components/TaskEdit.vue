<template>
  <div class="taskEdit">
    <h2>Edit Task</h2>
    <form @submit.prevent="updateTask">
      <div class="form-group">
        <label for="title">Title:</label>
        <input type="text" id="title" v-model="editedTask.title" class="form-control" required>
      </div>
      <div class="form-group">
        <label for="description">Description:</label>
        <textarea id="description" v-model="editedTask.description" class="form-control" required></textarea>
      </div>
      <button type="submit" class="btn btn-primary">Update Task</button>
    </form>
  </div>
</template>

<script>
import axios from 'axios'; // Import Axios
export default {
  data() {
    return {
      editedTask: {
        title: '',
        description: '',
      },
    };
  },
  methods: {
    updateTask() {
      // Send a PUT request to update the task using Axios
      axios.put(`/api/tasks/${this.$route.params.id}`, this.editedTask)
        .then(response => {
          // Task updated successfully, you can redirect to the task list or perform other actions
          window.location.href="/tasks/list";
        })
        .catch(error => {
          console.error('Error updating task:', error);
        });

    },
    // Fetch the task details when the component is mounted using Axios
    fetchTask() {
      axios.get(`/api/tasks/${this.$route.params.id}`)
        .then(response => {
          this.editedTask = response.data;
        })
        .catch(error => {
          console.error('Error fetching task:', error);
        });
    },
  },
  mounted() {
    // Fetch the task details when the component is mounted
    this.fetchTask();
  },
};
</script>
<style scoped>
    .taskEdit {
        margin:300px auto;
        align-items: center;
        width:400px;
    }

</style>
