<template>
    <div v-for="author in authors" :key="author.id">
        <p>
            {{ author.first_name }} {{ author.last_name }}
        </p>
    </div>
</template>

<script>
export default {
    name: "AuthorIterator",
    props: {
        authors: Array
    }
}
</script>

<style scoped>

</style>
