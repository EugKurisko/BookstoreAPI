<template>
    <div v-for="author in authors" :key="author.id">
        <a @click="getAuthor(author.id)">
            {{ author.first_name }} {{ author.last_name }}
        </a> <br>
    </div>
</template>

<script>
export default {
    name: "AuthorIterator",
    props: {
        authors: {
            type: Array,
            required: true,
        }
    },
    data() {
        return {
            author: {},
        }
    },
    methods: {
        getAuthor(authorId) {
            this.$router.push(`/authors/${authorId}/show`)
        }
    }
}
</script>

<style scoped>

</style>
