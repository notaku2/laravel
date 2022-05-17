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
            <tr v-for="(question, index) in questions" :key="index">
                <th scope="row">{{ question.id }}</th>
                <td>{{ question.character }}</td>
                <td>
                    <router-link v-bind:to="{name: 'question.show', params: {questionId: question.id }}">
                        <button class="btn btn-primary">Show</button>
                    </router-link>
                </td>
                <td>
                    <router-link v-bind:to="{name: 'question.edit', params: {questionId: question.id }}">
                        <button class="btn btn-success">Edit</button>
                    </router-link>
                </td>
                <td>
                     <button class="btn btn-danger" v-on:click="deleteQuestion(question.id)">Delete</button>
                </td>
                <td>
                    <router-link v-bind:to="{name: 'task.show', params: {taskId: question.id }}">
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
                questions: []
            }
        },
        methods: {
            getQuestions() {
                axios.get('/api/questions')
                    .then((res) => {
                        this.questions = res.data;
                    });
            },
            deleteQuestion(id) {
                axios.delete('/api/questions/' + id)
                    .then((res) => {
                        this.getQuestions();
                    });
            }
        },
        mounted() {
            this.getQuestions();
        }
    }
</script>