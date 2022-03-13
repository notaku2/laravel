<template>
    <div class="container">
        <table class="table table-hover">
            <thead class="thead-light">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Show</th>
                <th scope="col">Edit</th>
                <th scope="col">Delete</th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="(user, index) in users" :key="index">
                <th scope="row">{{ user.id }}</th>
                <td>{{ user.name }}</td>
                <td>{{ user.email }}</td>
                <td>
                    <router-link v-bind:to="{name: 'user.show', params: {userId: user.id }}">
                        <button class="btn btn-primary">Show</button>
                    </router-link>
                </td>
                <td>
                    <router-link v-bind:to="{name: 'user.edit', params: {userId: user.id }}">
                        <button class="btn btn-success">Edit</button>
                    </router-link>
                </td>
                <td>
                     <button class="btn btn-danger" v-on:click="deleteUser(user.id)">Delete</button>
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
                users: []
            }
        },
        methods: {
            getUsers() {
                axios.get('/api/users')
                    .then((res) => {
                        this.users = res.data;
                    });
            },
            deleteUser(id) {
                axios.delete('/api/users/' + id)
                    .then((res) => {
                        this.getUsers();
                    });
            }
        },
        mounted() {
            this.getUsers();
        }
    }
</script>