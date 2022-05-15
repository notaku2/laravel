import { createApp } from 'vue';
import { createRouter, createWebHistory } from 'vue-router';
// コンポーネントをインポート
import HeaderComponent from "./components/Task/HeaderComponent";
import TaskListComponent from "./components/Task/TaskListComponent";
import TaskShowComponent from "./components/Task/TaskShowComponent";
import TaskCreateComponent from "./components/Task/TaskCreateComponent";
import TaskEditComponent from "./components/Task/TaskEditComponent";

//User
import UserHeaderComponent from "./components/User/UserHeaderComponent";
import UserListComponent from "./components/User/UserListComponent";
import UserShowComponent from "./components/User/UserShowComponent";
import UserCreateComponent from "./components/User/UserCreateComponent";
import UserEditComponent from "./components/User/UserEditComponent";

//Title
import TitleHeaderComponent from "./components/Title/TitleHeaderComponent";
import TitleListComponent from "./components/Title/TitleListComponent";
import TitleShowComponent from "./components/Title/TitleShowComponent";
import TitleCreateComponent from "./components/Title/TitleCreateComponent";
import TitleEditComponent from "./components/Title/TitleEditComponent";

require('./bootstrap');

window.Vue = require('vue').default;

const routes = [
    {path: '/tasks', name: 'task.list', component: TaskListComponent},
    {path: '/tasks/:taskId', name: 'task.show', component: TaskShowComponent, props: true},
    {path: '/tasks/create', name: 'task.create', component: TaskCreateComponent},
    {path: '/tasks/:taskId/edit', name: 'task.edit', component: TaskEditComponent, props: true},
    {path: '/users', name: 'user.list', component: UserListComponent},
    {path: '/users/:userId', name: 'user.show', component: UserShowComponent, props: true},
    {path: '/users/create', name: 'user.create', component: UserCreateComponent},
    {path: '/users/:userId/edit', name: 'user.edit', component: UserEditComponent, props: true},
    {path: '/titles', name: 'title.list', component: TitleListComponent},
    {path: '/titles/:titleId', name: 'title.show', component: TitleShowComponent, props: true},
    {path: '/titles/create', name: 'title.create', component: TitleCreateComponent},
    {path: '/titles/:titleId/edit', name: 'title.edit', component: TitleEditComponent, props: true}
]
/*
const users = [
  {path: '/users', name: 'user.list', component: UserListComponent},
  {path: '/users/:userId', name: 'user.show', component: UserShowComponent, props: true},
  {path: '/users/create', name: 'user.create', component: UserCreateComponent},
  {path: '/users/:userId/edit', name: 'user.edit', component: UserEditComponent, props: true}   
]
*/
const router = createRouter({
  history: createWebHistory(),
  routes,
})

const task = createApp({});
task.use(router);
task.component('header-component', HeaderComponent);
task.mount('#task');
//https://codelikes.com/laravel-use-vue3/#toc3 #参考サイト

const user = createApp({});
user.use(router);
user.component('userheader-component', UserHeaderComponent);
user.mount('#user');

const title = createApp({});
user.use(router);
user.component('titleheader-component', TitleHeaderComponent);
user.mount('#title');

//chrome キャッシュクリア:ctrl+shift+delete
//下記エラーが出た場合にchrome キャッシュクリアを試みる。解決する可能性がある。
//If this is a native custom element, make sure to exclude it from component resolution via compilerOptions.isCustomElement.
