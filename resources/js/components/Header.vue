<template>
    <header>
        <nav class="navbar navbar-expand-sm bg-dark navbar-dark navbar-right">
         <div class="container-fluid">
            <div class="navbar-brand">
                Test
            </div>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
            <div class="collapse navbar-collapse navbar-right" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    <li>
                        <a href="/"class="nav-link text-decoration-none">Home</a></li>
                    <li class="nav-item">
                        <router-link to="/tasks/list" class="nav-link text-decoration-none">Task List</router-link>
                    </li>
                    <li class="nav-item">
                        <router-link to="/" class="nav-link text-decoration-none">Create Task</router-link>
                    </li>
                </ul>
            </div>
            </div>
        </nav>
    </header>
</template>




<script>
export default {
  name: 'Header',
  // ...
};
</script>

<style scoped>
/* Add your CSS styles for the header here */
</style>
