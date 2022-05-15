<template>
    <div class="container">
        <table class="table table-hover">
            <thead class="thead-light">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Show</th>
                <th scope="col">Edit</th>
                <th scope="col">Delete</th>
                <th scope="col">Task</th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="(title, index) in titles" :key="index">
                <th scope="row">{{ title.id }}</th>
                <td>{{ title.name }}</td>
                <td>
                    <router-link v-bind:to="{name: 'title.show', params: {titleId: title.id }}">
                        <button class="btn btn-primary">Show</button>
                    </router-link>
                </td>
                <td>
                    <router-link v-bind:to="{name: 'title.edit', params: {titleId: title.id }}">
                        <button class="btn btn-success">Edit</button>
                    </router-link>
                </td>
                <td>
                     <button class="btn btn-danger" v-on:click="deleteTitle(title.id)">Delete</button>
                </td>
                <td>
                    <router-link v-bind:to="{name: 'task.show', params: {taskId: title.id }}">
                        <button class="btn btn-success">Task</button>
                    </router-link>
                </td>
            </tr>
            </tbody>
        </table>
    </div>
</template>


<script>
    export default {
        data: function () {
            return {
                titles: []
            }
        },
        methods: {
            getTitles() {
                axios.get('/api/titles')
                    .then((res) => {
                        this.titles = res.data;
                    });
            },
            deleteTitle(id) {
                axios.delete('/api/titles/' + id)
                    .then((res) => {
                        this.getTitles();
                    });
            }
        },
        mounted() {
            this.getTitles();
        }
    }
</script>