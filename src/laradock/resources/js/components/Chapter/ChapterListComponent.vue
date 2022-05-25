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
            <tr v-for="(chapter, index) in chapters" :key="index">
                <th scope="row">{{ chapter.id }}</th>
                <td>{{ chapter.name }}</td>
                <td>
                    <router-link v-bind:to="{name: 'chapter.show', params: {chapterId: chapter.id }}">
                        <button class="btn btn-primary">Show</button>
                    </router-link>
                </td>
                <td>
                    <router-link v-bind:to="{name: 'chapter.edit', params: {chapterId: chapter.id }}">
                        <button class="btn btn-success">Edit</button>
                    </router-link>
                </td>
                <td>
                     <button class="btn btn-danger" v-on:click="deleteChapter(chapter.id)">Delete</button>
                </td>
                <td>
                    <router-link v-bind:to="{name: 'question.create', params: {chapterId: chapter.id }}">
                        <button class="btn btn-success">Question</button>
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
                chapters: []
            }
        },
        methods: {
            getChapters() {
                axios.get('/api/chapters')
                    .then((res) => {
                        this.chapters = res.data;
                    });
            },
            deleteChapter(id) {
                axios.delete('/api/chapters/' + id)
                    .then((res) => {
                        this.getChapters();
                    });
            }
        },
        mounted() {
            this.getChapters();
        }
    }
</script>