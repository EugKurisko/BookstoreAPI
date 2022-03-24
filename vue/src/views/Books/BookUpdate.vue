<template>
    <div v-show="success">Book was successfully updated</div>
    <form @submit.prevent="updateBook">
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
    name: "BookUpdate",
    data() {
        return {
            fields: {},
            success: false,
        }
    },
    created() {
        const bookId  = this.$route.params.bookId;
        axios.get(`http://localhost/api/books/${bookId}/show`).
        then((response) => {
            this.fields = response.data.data
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
