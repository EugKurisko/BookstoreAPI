<template>
    <div v-for="author in authors" :key="author.id">
        <a @click="showAuthor(author.id)">
            {{ author.first_name }} {{ author.last_name }}
        </a> <br>
    </div>
</template>

<script>
import axios from "axios";
export default {
    name: "AuthorIterator",
    props: {
        authors: Array
    },
    methods: {
        showAuthor(authorId) {
            axios.get(`http://localhost/api/authors/${authorId}/show`).
                then((response) => {
                    console.log(response.data)
            }).
                catch((error) => {
                    console.log(error)
            })
        }
    }
}
</script>

<style scoped>

</style>
