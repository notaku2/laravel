<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-sm-6">
                <form v-on:submit.prevent="submit">
                    <div class="form-group row">
                        <label for="id" class="col-sm-3 col-form-label">ID</label>
                        <input type="text" class="col-sm-9 form-control-plaintext" readonly id="id" v-model="user.id">
                    </div>
                    <div class="form-group row">
                        <label for="title" class="col-sm-3 col-form-label">Name</label>
                        <input type="text" class="col-sm-9 form-control" id="name" v-model="user.name">
                    </div>
                    <div class="form-group row">
                        <label for="content" class="col-sm-3 col-form-label">Email</label>
                        <input type="text" class="col-sm-9 form-control" id="email" v-model="user.email">
                    </div>
                    <div class="form-group row">
                        <label for="person-in-charge" class="col-sm-3 col-form-label">Password</label>
                        <input type="text" class="col-sm-9 form-control" id="password" v-model="user.password">
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
            userId: String
        },
        data: function () {
            return {
                user: {}
            }
        },
        methods: {
            getUser() {
                axios.get('/api/users/' + this.userId)
                    .then((res) => {
                        this.user = res.data;
                    });
            },
            submit() {
                axios.put('/api/users/' + this.userId, this.user)
                    .then((res) => {
                        this.$router.push({name: 'user.list'})
                    });
            }
        },
        mounted() {
            this.getUser();
        }
    }
</script>