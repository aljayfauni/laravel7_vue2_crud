import Vue from 'vue';
import VueRouter from 'vue-router';
import TaskForm from './components/TaskForm.vue';
import TaskList from './components/TaskList.vue';
import TaskCreate from './components/TaskCreate.vue';
import TaskEdit from './components/TaskEdit.vue';

Vue.use(VueRouter);

const routes = [
  { path: '/', component: TaskForm },
  { path: '/tasks/create', component: TaskCreate },
  { path: '/tasks/edit/:id', name: 'edit-task', component: TaskEdit },
  { path: '/tasks/list', component: TaskList },
];

const router = new VueRouter({
  routes,
  mode: 'history',
});

export default router;
