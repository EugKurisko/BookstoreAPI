<template>
    <div>
        <p>{{authorData.last_name}} {{authorData.first_name}}</p>
    </div>
</template>

<script>
export default {
    name: "AuthorPage",
    props: {
        authorData: Object
    },
}
</script>

<style scoped>

</style>
