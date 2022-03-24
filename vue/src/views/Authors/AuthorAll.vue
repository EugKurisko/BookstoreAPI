<template>
    <div v-if="this.authors.length > 0">
        <AuthorIterator v-bind:authors="this.authors"/>
    </div>
    <div v-else>
        There are no authors
    </div>
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
