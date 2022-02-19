import { createApp } from 'vue';
import { createRouter, createWebHistory } from 'vue-router';
// コンポーネントをインポート
import HeaderComponent from "./components/HeaderComponent";
import TaskListComponent from "./components/TaskListComponent";
import TaskShowComponent from "./components/TaskShowComponent";
import TaskCreateComponent from "./components/TaskCreateComponent";
import TaskEditComponent from "./components/TaskEditComponent";


require('./bootstrap');

window.Vue = require('vue').default;

const routes = [
    {path: '/tasks', name: 'task.list', component: TaskListComponent},
    {path: '/tasks/:taskId', name: 'task.show', component: TaskShowComponent, props: true},
    {path: '/tasks/create', name: 'task.create', component: TaskCreateComponent},
    {path: '/tasks/:taskId/edit', name: 'task.edit', component: TaskEditComponent, props: true}
    
]

const router = createRouter({
  history: createWebHistory(),
  routes,
})

const app = createApp({});
app.use(router);
app.component('header-component', HeaderComponent);
app.mount('#app');
//https://codelikes.com/laravel-use-vue3/#toc3 #参考サイト

//chrome キャッシュクリア:ctrl+shift+delete
//下記エラーが出た場合にchrome キャッシュクリアを試みる。解決する可能性がある。
//If this is a native custom element, make sure to exclude it from component resolution via compilerOptions.isCustomElement.
