<template>
    <div v-for="book in books" :key="book.id">
        <a @click="getBook(book.id)">
            {{ book.title }}
        </a> <br>

    </div>
</template>

<script>
export default {
    name: "BookIterator",
    props: {
        books: Array
    },
    methods: {
        getBook(bookId) {
            this.$router.push(`/books/${bookId}/show`)
        }
    }
}
</script>

<style scoped>

</style>
