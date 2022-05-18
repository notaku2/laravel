<template>
    <div class="container">
        <table class="table table-hover">
            <thead class="thead-light">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Character</th>
                <th scope="col">Show</th>
                <th scope="col">Edit</th>
                <th scope="col">Delete</th>
                <th scope="col">Task</th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="(answer, index) in answers" :key="index">
                <th scope="row">{{ answer.id }}</th>
                <td>{{ answer.character }}</td>
                <td>
                    <router-link v-bind:to="{name: 'answer.show', params: {answerId: answer.id }}">
                        <button class="btn btn-primary">Show</button>
                    </router-link>
                </td>
                <td>
                    <router-link v-bind:to="{name: 'answer.edit', params: {answerId: answer.id }}">
                        <button class="btn btn-success">Edit</button>
                    </router-link>
                </td>
                <td>
                     <button class="btn btn-danger" v-on:click="deleteAnswer(answer.id)">Delete</button>
                </td>
                <td>
                    <router-link v-bind:to="{name: 'task.show', params: {taskId: answer.id }}">
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
                answers: []
            }
        },
        methods: {
            getAnswers() {
                axios.get('/api/answers')
                    .then((res) => {
                        this.answers = res.data;
                    });
            },
            deleteAnswer(id) {
                axios.delete('/api/answers/' + id)
                    .then((res) => {
                        this.getAnswers();
                    });
            }
        },
        mounted() {
            this.getAnswers();
        }
    }
</script>