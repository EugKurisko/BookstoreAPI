<template>
    <div v-show="success">Book was successfully created</div>
    <form @submit.prevent="createBook">
        Title: <input type="text" v-model="fields.title" required><br><br>
        Short Description: <input type="text" v-model="fields.short_description"><br><br>
        Amount of books to add: <input type="number" v-model="fields.amount" min="0" required><br><br>
        <button type="submit">
            Submit
        </button>
    </form>
</template>

<script>
import axios from "axios";

export default {
    name: "BookCreate",
    data() {
        return {
            fields: {},
            success: false,
        }
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
