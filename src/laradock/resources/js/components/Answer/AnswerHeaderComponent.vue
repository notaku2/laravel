<template>
    <div class="container-fluid bg-dark mb-3">
        <div class="container">
            <nav class="navbar navbar-dark">
                <span class="navbar-brand mb-0 h1">Vue Laravel</span>
                <div>
                    <router-link v-bind:to="{name: 'answer.list'}">
                        <button class="btn btn-success">AnswerList</button>
                    </router-link>
                    <router-link v-bind:to="{name: 'answer.create'}">
                        <button class="btn btn-success">AnswerAdd</button>
                    </router-link>
                </div>
            </nav>
        </div>
    </div>
</template>

<script>
    export default {}
</script>