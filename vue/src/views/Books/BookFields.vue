<template>
    Title: <input type="text" v-model="book.title" required><br><br>
    Short Description: <input type="text" v-model="book.short_description"><br><br>
    Amount of books to add: <input type="number" v-model="book.amount" min="0" required><br><br>
    Choose Author: <select  v-model="book.author_id">
        <option v-for="author in authors" :value="author.id">
            {{ author.last_name }} {{ author.first_name }}
        </option>
    </select><br><br>
    <button type="submit">
        Submit
    </button>
</template>

<script>
export default {
    name: "BookFields",
    props: {
        book: Object,
        authors: Array,
    },
}
</script>

<style scoped>

</style>
