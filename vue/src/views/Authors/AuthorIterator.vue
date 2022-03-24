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
    }
}
</script>

<style scoped>

</style>
