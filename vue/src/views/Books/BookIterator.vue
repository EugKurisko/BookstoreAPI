<template>
    <div v-for="book in books" :key="book.id">
        <a @click="">
            {{ book.title }}
        </a> <br>

    </div>
</template>

<script>
export default {
    name: "BookIterator",
    props: {
        books: Array
    }
}
</script>

<style scoped>

</style>
