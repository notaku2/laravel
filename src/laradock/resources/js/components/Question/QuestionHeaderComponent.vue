<template>
    <div class="container-fluid bg-dark mb-3">
        <div class="container">
            <nav class="navbar navbar-dark">
                <span class="navbar-brand mb-0 h1">Vue Laravel</span>
                <div>
                    <router-link v-bind:to="{name: 'question.list'}">
                        <button class="btn btn-success">QuestionList</button>
                    </router-link>
                    <router-link v-bind:to="{name: 'question.create'}">
                        <button class="btn btn-success">QuestionAdd</button>
                    </router-link>
                </div>
            </nav>
        </div>
    </div>
</template>

<script>
    export default {}
</script>