<template>
    <div v-show="success">Book was successfully updated</div>
    <form @submit.prevent="updateBook">
        <BookFields v-bind:book="this.fields" v-bind:authors="this.authors"/>
    </form>
</template>

<script>
import axios from "axios";
import BookFields from "./BookFields.vue";

export default {
    name: "BookUpdate",
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
        const bookId  = this.$route.params.bookId;
        axios.get(`http://localhost/api/books/${bookId}/show`).
        then((response) => {
            this.fields = response.data.data
        }).
        catch((error) => console.log(error))
        axios.get(`http://localhost/api/authors/all`).
        then((response) => {
            this.authors = response.data.data
        }).
        catch((error) => console.log(error))
    },
    methods: {
        updateBook() {
            axios.post(`http://localhost/api/books/${this.fields.id}/update`, this.fields).
            then((response) => {
                this.success = true;
                setTimeout(() => {
                    location.reload()
                }, 3000)
            }).
            catch((error) => console.log(error))
        },
    }
}
</script>

<style scoped>

</style>
