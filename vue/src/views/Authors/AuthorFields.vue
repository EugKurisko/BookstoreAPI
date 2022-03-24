<template>
    First Name: <input type="text" v-model="author.first_name"><br><br>
    Last Name: <input type="text" v-model="author.last_name"><br><br>
    <button type="submit">
        Submit
    </button>
</template>

<script>
export default {
    name: "AuthorFields",
    props: {
        author: {
            type: Object,
            required: true,
        }
    },
}
</script>

<style scoped>

</style>
