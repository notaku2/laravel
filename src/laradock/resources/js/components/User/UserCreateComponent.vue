<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-sm-6">
                <form v-on:submit.prevent="submit">
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
    data: function () {
        return {
            user: {}
        }
    },
    methods: {
        submit() {
            axios.post('/api/users', this.user)
                .then((res) => {
                    this.$router.push({name: 'user.list'});
                });
        }
    }
}
</script>