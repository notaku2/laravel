<template>
    <div class="container-fluid bg-dark mb-3">
        <div class="container">
            <nav class="navbar navbar-dark">
                <span class="navbar-brand mb-0 h1">Vue Laravel</span>
                <div>
                    <router-link v-bind:to="{name: 'chapter.list'}">
                        <button class="btn btn-success">ChapterList</button>
                    </router-link>
                    <router-link v-bind:to="{name: 'chapter.create'}">
                        <button class="btn btn-success">ChapterAdd</button>
                    </router-link>
                </div>
            </nav>
        </div>
    </div>
</template>

<script>
    export default {}
</script>