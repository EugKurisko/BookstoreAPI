<template>
    <div>

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
                    console.log(response.data)
            }).
            catch((error) => console.log(error))
        }
    }
}
</script>

<style scoped>

</style>
