<template>
    <AuthorIterator v-bind:authors="this.authors"/>
</template>

<script>
import axios from 'axios'
import AuthorIterator from "./AuthorIterator.vue";
export default {
    name: "AuthorAll",
    components: {
        AuthorIterator
    },

    created() {
        this.getAuthors()
    },
    data() {
        return {
            authors: [],
        }
    },
    methods: {
        getAuthors() {
            axios.get('http://localhost/api/authors/all').
                then((response) => {
                    this.authors = response.data.data
            }).
            catch((error) => console.log(error))
        }
    }
}
</script>

<style scoped>

</style>
