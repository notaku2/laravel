<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-sm-6">
                <form v-on:submit.prevent="submit">
                    <div class="form-group row">
                        <label for="id" class="col-sm-3 col-form-label">ID</label>
                        <input type="text" class="col-sm-9 form-control-plaintext" readonly id="id" v-model="question.id">
                    </div>
                    <div class="form-group row">
                        <label for="title" class="col-sm-3 col-form-label">Character</label>
                        <input type="text" class="col-sm-9 form-control" id="name" v-model="question.character">
                    </div>
                    <div class="form-group row">
                        <label for="title" class="col-sm-3 col-form-label">Line</label>
                        <input type="text" class="col-sm-9 form-control" id="name" v-model="question.line">
                    </div>
                    <div class="form-group row">
                        <label for="content" class="col-sm-3 col-form-label">User_id</label>
                        <input type="text" class="col-sm-9 form-control" id="user_id" v-model="question.user_id">
                    </div>
                    <div class="form-group row">
                        <label for="content" class="col-sm-3 col-form-label">Title_id</label>
                        <input type="text" class="col-sm-9 form-control" id="title_id" v-model="question.title_id">
                    </div>
                    <div class="form-group row">
                        <label for="content" class="col-sm-3 col-form-label">Chapter_id</label>
                        <input type="text" class="col-sm-9 form-control" id="title_id" v-model="question.chapter_id">
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: {
            questionId: String
        },
        data: function () {
            return {
                question: {}
            }
        },
        methods: {
            getQuestion() {
                axios.get('/api/questions/' + this.questionId)
                    .then((res) => {
                        this.question = res.data;
                    });
            },
            submit() {
                axios.put('/api/questions/' + this.questionId, this.question)
                    .then((res) => {
                        this.$router.push({name: 'question.list'})
                    });
            }
        },
        mounted() {
            this.getQuestion();
        }
    }
</script>