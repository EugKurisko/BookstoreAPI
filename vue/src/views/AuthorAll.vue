<template>
    <div v-for="author in authors" :key="author.id">
        <p>
            {{ author.first_name }} {{ author.last_name }}
        </p>
    </div>
</template>

<script>
import axios from 'axios'
export default {
    name: "AuthorAll",
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
