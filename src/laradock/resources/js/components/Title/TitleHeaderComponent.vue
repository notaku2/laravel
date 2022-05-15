<template>
    <div class="container-fluid bg-dark mb-3">
        <div class="container">
            <nav class="navbar navbar-dark">
                <span class="navbar-brand mb-0 h1">Vue Laravel</span>
                <div>
                    <router-link v-bind:to="{name: 'title.list'}">
                        <button class="btn btn-success">TitleList</button>
                    </router-link>
                    <router-link v-bind:to="{name: 'title.create'}">
                        <button class="btn btn-success">TitleAdd</button>
                    </router-link>
                </div>
            </nav>
        </div>
    </div>
</template>

<script>
    export default {}
</script>