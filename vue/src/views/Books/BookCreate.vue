<template>
    <div v-show="success">Book was successfully created</div>
    <form @submit.prevent="createBook">
        <BookFields v-bind:book="this.fields" v-bind:authors="this.authors"/>
    </form>
</template>

<script>
import axios from "axios";
import BookFields from "./BookFields.vue";
export default {
    name: "BookCreate",
    components: {
      BookFields
    },
    data() {
        return {
            fields: {},
            success: false,
            authors: [],
        }
    },
    created() {
        axios.get('http://localhost/api/authors/all').
            then(response => {
                this.authors = response.data.data;
        }).catch(error => console.log(error))
    },
    methods: {
        createBook() {
            axios.post('http://localhost/api/books/create', this.fields).
            then((response) => {
                this.fields = {};
                this.success = true;
                setTimeout(() => {
                    location.reload()
                }, 3000)
            }).
            catch((error) => console.log(error))
        }
    },
}
</script>

<style scoped>

</style>
