<template>
  <div>
    <h2>Create Task</h2>
    <!-- Task creation form -->
  </div>
</template>

<script>
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
       //Send a POST request to create the task using Axios
      // Example:
       axios.post('/api/tasks', this.task)
        .then(() => {
           // Task created successfully, you can redirect to the task list or perform other actions
           alert(this.task);
        })
         .catch(error => {
          console.error('Error creating task:', error);
         });
    },
  },
};
</script>
