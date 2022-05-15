<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-sm-6">
                <form>
                    <div class="form-group row border-bottom">
                        <label for="id" class="col-sm-3 col-form-label">ID</label>
                        <input type="text" class="col-sm-9 form-control-plaintext" readonly id="id"
                            v-model="chapter.id">
                    </div>
                    <div class="form-group row border-bottom">
                        <label for="chapter" class="col-sm-3 col-form-label">Name</label>
                        <input type="text" class="col-sm-9 form-control-plaintext" readonly id="name"
                            v-model="chapter.name">
                    </div>
                    <div class="form-group row border-bottom">
                        <label for="content" class="col-sm-3 col-form-label">User_id</label>
                        <input type="text" class="col-sm-9 form-control-plaintext" readonly id="user_id"
                            v-model="chapter.user_id">
                    </div>
                    <div class="form-group row border-bottom">
                        <label for="content" class="col-sm-3 col-form-label">Title_id</label>
                        <input type="text" class="col-sm-9 form-control-plaintext" readonly id="title_id"
                            v-model="chapter.title_id">
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: {
            chapterId: String
        },
        data: function () {
            return {
                chapter: {}
            }
        },
        methods: {
            getChapter() {
                axios.get('/api/chapters/' + this.chapterId)
                    .then((res) => {
                        this.chapter = res.data;
                    });
            }
        },
        mounted() {
            this.getChapter();
        }
    }
</script>