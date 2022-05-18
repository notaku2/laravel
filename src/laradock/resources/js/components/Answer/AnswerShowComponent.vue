<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-sm-6">
                <form>
                    <div class="form-group row border-bottom">
                        <label for="id" class="col-sm-3 col-form-label">ID</label>
                        <input type="text" class="col-sm-9 form-control-plaintext" readonly id="id"
                            v-model="answer.id">
                    </div>
                    <div class="form-group row border-bottom">
                        <label for="answer" class="col-sm-3 col-form-label">Character</label>
                        <input type="text" class="col-sm-9 form-control-plaintext" readonly id="character"
                            v-model="answer.character">
                    </div>
                    <div class="form-group row border-bottom">
                        <label for="answer" class="col-sm-3 col-form-label">Line</label>
                        <input type="text" class="col-sm-9 form-control-plaintext" readonly id="line"
                            v-model="answer.line">
                    </div>
                    <div class="form-group row border-bottom">
                        <label for="content" class="col-sm-3 col-form-label">User_id</label>
                        <input type="text" class="col-sm-9 form-control-plaintext" readonly id="user_id"
                            v-model="answer.user_id">
                    </div>
                    <div class="form-group row border-bottom">
                        <label for="content" class="col-sm-3 col-form-label">Title_id</label>
                        <input type="text" class="col-sm-9 form-control-plaintext" readonly id="title_id"
                            v-model="answer.title_id">
                    </div>
                    <div class="form-group row border-bottom">
                        <label for="content" class="col-sm-3 col-form-label">Chapter_id</label>
                        <input type="text" class="col-sm-9 form-control-plaintext" readonly id="chapter_id"
                            v-model="answer.chapter_id">
                    </div>
                    <div class="form-group row border-bottom">
                        <label for="content" class="col-sm-3 col-form-label">Question_id</label>
                        <input type="text" class="col-sm-9 form-control-plaintext" readonly id="question_id"
                            v-model="answer.question_id">
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: {
            answerId: String
        },
        data: function () {
            return {
                answer: {}
            }
        },
        methods: {
            getAnswer() {
                axios.get('/api/answers/' + this.answerId)
                    .then((res) => {
                        this.answer = res.data;
                    });
            }
        },
        mounted() {
            this.getAnswer();
        }
    }
</script>