<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-sm-6">
                <form>
                    <div class="form-group row border-bottom">
                        <label for="id" class="col-sm-3 col-form-label">ID</label>
                        <input type="text" class="col-sm-9 form-control-plaintext" readonly id="id"
                            v-model="user.id">
                    </div>
                    <div class="form-group row border-bottom">
                        <label for="title" class="col-sm-3 col-form-label">Name</label>
                        <input type="text" class="col-sm-9 form-control-plaintext" readonly id="name"
                            v-model="user.name">
                    </div>
                    <div class="form-group row border-bottom">
                        <label for="content" class="col-sm-3 col-form-label">Email</label>
                        <input type="text" class="col-sm-9 form-control-plaintext" readonly id="email"
                            v-model="user.email">
                    </div>
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
            }
        },
        mounted() {
            this.getUser();
        }
    }
</script>