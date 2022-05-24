<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-sm-6">
                <form v-on:submit.prevent="submit">
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
    /*
    computed: {
        user_id: {
            get () {
                return this.$props.titleId
            },
            set (value) {
                this.emit('update:modelValue', value)
            }
        }
    },
    */
    data: function () {
        return {
            title: {
                user_id: this.$props.titleId
            }
        }
    },
    methods: {
        submit() {
            axios.post('/api/titles', this.title)
                .then((res) => {
                    this.$router.push({name: 'title.list'});
                });
        }
    }
}
</script>