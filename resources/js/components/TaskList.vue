<template>
  <div class="taskList">
    <h1>Task List</h1>
      <div class="search-bar">
            <!-- <input type="text" v-model="searchQuery" @input="searchTasks" placeholder="Search tasks"> -->
            <form class="form-inline col-sm-3" style="float:right;">
                <input class="form-control mr-sm-2  col-sm-3 "  v-model="searchQuery" @input="searchTasks" type="search" placeholder="Search" aria-label="Search">
            </form>
            <br/>
            <br/>
        </div>
    <table class="table table-bordered">

      <thead>
        <tr>
          <th>Title</th>
          <th>Description</th>
           <th>Date Created</th>
           <th>Date Last Update</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>

      <!-- Render tasks from filteredTasks -->
        <!-- Task rendering goes here -->
        <tr v-for="task in filteredTasks" :key="task.id">
          <td>{{ task.title }}</td>
          <td>{{ task.description }}</td>
          <td>{{ task.created_at | formatDate}}</td>
          <td>{{ task.updated_at | formatDate }}</td>
          <td>
          <router-link :to="{ name: 'edit-task', params: { id: task.id } }" class="btn btn-primary">Edit</router-link>
          <!-- Use a confirmation dialog for the Delete button -->
          <button @click="confirmDelete(task.id)" class="btn btn-danger">Delete</button>
          </td>
        </tr>

        <!-- <tr v-for="task in tasks" :key="task.id">
          <td>{{ task.title }}</td>
          <td>{{ task.description }}</td>
          <td>
          <router-link :to="{ name: 'edit-task', params: { id: task.id } }" class="btn btn-primary">Edit</router-link> -->
          <!-- Use a confirmation dialog for the Delete button -->
          <!-- <button @click="confirmDelete(task.id)" class="btn btn-danger">Delete</button>
          </td>
        </tr> -->
      </tbody>
    </table>
  </div>
</template>

<script>
import axios from 'axios'; // Import Axios
export default {
    data() {
        return {
            searchQuery: '',
            tasks: [], // Initialize tasks as an empty array
        };
    },
    filters: {
        formatDate(value) {
        if (value) {
            // Parse the ISO 8601 date string and format it as desired (e.g., using the Date object)
            const date = new Date(value);
            return date.toLocaleString(); // You can adjust the format using date methods
        }
        return value;
        },
    },
    methods: {
    searchTasks() {
        axios.get(`/api/tasks?search=${this.searchQuery}`)
            .then((response) => {
                this.tasks = response.data;
            })
            .catch((error) => {
                console.error('Error fetching tasks:', error);
            });
    },
    confirmDelete(taskId) {
        this.deleteTask(taskId);
    },
    deleteTask(taskId) {
        if (confirm('Are you sure you want to delete this task?')) {
        axios.delete(`/api/tasks/${taskId}`)
            .then(() => {
            // Task deleted successfully, you can reload the task list or perform other actions
            this.fetchTasks(); // Reload the task list after deletion
            })
            .catch(error => {
            console.error('Error deleting task:', error);
            });
        }
    },
    // Fetch tasks from the API using Axios
    fetchTasks() {
        axios.get('/api/tasks')
        .then(response => {
            this.tasks = response.data;
        })
        .catch(error => {
            console.error('Error fetching tasks:', error);
        });
    },
    editTask(task) {
        console.log(task);
        // Handle editing the task here
    },

    },

    mounted() {
    // Fetch the task list when the component is mounted
        this.fetchTasks();
    },
    computed: {
        filteredTasks() {
            // Filter tasks based on the search query
            const query = this.searchQuery.toLowerCase();
            return this.tasks.filter(task => {
            return task.title.toLowerCase().includes(query) || task.description.toLowerCase().includes(query);
            });
        },
    },
};
</script>
<style scoped>
    .taskList {
        margin:300px auto;
        align-items: center;
        width:70%;
    }
</style>
