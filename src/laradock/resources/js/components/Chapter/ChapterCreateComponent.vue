<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-sm-6">
                <form v-on:submit.prevent="submit">
                    <div class="form-group row">
                        <p>{{title.name}}</p>
                    </div>
                    <div class="form-group row">
                        <label for="title" class="col-sm-3 col-form-label">Chapter_Name</label>
                        <input type="text" class="col-sm-9 form-control" id="name" v-model="chapter.name">
                    </div>
                    <div class="form-group row">
                        <label for="content" class="col-sm-3 col-form-label">User_id</label>
                        <input type="text" class="col-sm-9 form-control" id="user_id" v-model="chapter.user_id">
                    </div>
                    <div class="form-group row">
                        <label for="content" class="col-sm-3 col-form-label">Title_id</label>
                        <input type="text" class="col-sm-9 form-control" id="title_id" v-model="chapter.title_id">
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
        titleId: String
    },
    data: function () {
        return {
            chapter: {},
            title: {}
        }
    },
    methods: {
        /*
        getTitle() {
            axios.get('/api/titles/' + this.titleId)
                .then((res) => {
                    this.title = res.data;
                    console.log(this.title);
                });
        },
        */
        submit() {
            axios.post('/api/chapters', this.chapter)
                .then((res) => {
                    this.$router.push({name: 'chapter.list'});
                });
        },
        /*
        addChapter(){
            this.chapter.title_id = this.title.id;
            this.chapter.user_id = this.title.user_id;
        }
        */
    },
    created() {
        axios.get('/api/titles/' + this.titleId)
            .then((res) => {
                this.title = res.data;
                this.chapter.title_id = this.title.id; //chapterにtitle.idを代入
                this.chapter.user_id = this.title.user_id; //chapterにtitle.user_idを代入
            });
    },
    /*
    mounted() {
        //this.getTitle();
        //console.log(this.title.user_id);
        this.addChapter();
        console.log(this.chapter);
    }
    */
}
</script>