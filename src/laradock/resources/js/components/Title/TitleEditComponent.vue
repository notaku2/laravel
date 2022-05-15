<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-sm-6">
                <form v-on:submit.prevent="submit">
                    <div class="form-group row">
                        <label for="id" class="col-sm-3 col-form-label">ID</label>
                        <input type="text" class="col-sm-9 form-control-plaintext" readonly id="id" v-model="title.id">
                    </div>
                    <div class="form-group row">
                        <label for="title" class="col-sm-3 col-form-label">Name</label>
                        <input type="text" class="col-sm-9 form-control" id="name" v-model="title.name">
                    </div>
                    <div class="form-group row">
                        <label for="content" class="col-sm-3 col-form-label">User_id</label>
                        <input type="text" class="col-sm-9 form-control" id="user_id" v-model="title.user_id">
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
                title: {}
            }
        },
        methods: {
            getTitle() {
                axios.get('/api/titles/' + this.titleId)
                    .then((res) => {
                        this.title = res.data;
                    });
            },
            submit() {
                axios.put('/api/titles/' + this.titleId, this.title)
                    .then((res) => {
                        this.$router.push({name: 'title.list'})
                    });
            }
        },
        mounted() {
            this.getTitle();
        }
    }
</script>