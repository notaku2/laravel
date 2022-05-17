<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-sm-6">
                <form>
                    <div class="form-group row border-bottom">
                        <label for="id" class="col-sm-3 col-form-label">ID</label>
                        <input type="text" class="col-sm-9 form-control-plaintext" readonly id="id"
                            v-model="question.id">
                    </div>
                    <div class="form-group row border-bottom">
                        <label for="question" class="col-sm-3 col-form-label">Character</label>
                        <input type="text" class="col-sm-9 form-control-plaintext" readonly id="character"
                            v-model="question.character">
                    </div>
                    <div class="form-group row border-bottom">
                        <label for="question" class="col-sm-3 col-form-label">Line</label>
                        <input type="text" class="col-sm-9 form-control-plaintext" readonly id="line"
                            v-model="question.line">
                    </div>
                    <div class="form-group row border-bottom">
                        <label for="content" class="col-sm-3 col-form-label">User_id</label>
                        <input type="text" class="col-sm-9 form-control-plaintext" readonly id="user_id"
                            v-model="question.user_id">
                    </div>
                    <div class="form-group row border-bottom">
                        <label for="content" class="col-sm-3 col-form-label">Title_id</label>
                        <input type="text" class="col-sm-9 form-control-plaintext" readonly id="title_id"
                            v-model="question.title_id">
                    </div>
                    <div class="form-group row border-bottom">
                        <label for="content" class="col-sm-3 col-form-label">Chapter_id</label>
                        <input type="text" class="col-sm-9 form-control-plaintext" readonly id="chapter_id"
                            v-model="question.chapter_id">
                    </div>
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
            }
        },
        mounted() {
            this.getQuestion();
        }
    }
</script>