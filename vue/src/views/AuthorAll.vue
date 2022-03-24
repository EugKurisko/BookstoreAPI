<template>
    <h1>srgvsrv</h1>
</template>

<script>
// import axios from 'axios'
export default {
    name: "AuthorAll",
    data() {
        return {
            authors: [],
        }
    },
    methods: {
        getAuthors() {
            axios.get('')
        }
    }
}
</script>

<style scoped>

</style>
