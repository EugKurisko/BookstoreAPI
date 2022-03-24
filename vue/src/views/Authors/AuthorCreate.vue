<template>
    <div v-show="success">Author was successfully created</div>
    <form @submit.prevent="createAuthor">
        First Name: <input type="text" v-model="fields.first_name"><br><br>
        Last Name: <input type="text" v-model="fields.last_name"><br><br>
        <button type="submit">
            Submit
        </button>
    </form>
</template>

<script>
import axios from "axios";

export default {
    name: "AuthorCreate",
    data() {
        return {
            fields: {},
            success: false,
        }
    },
    methods: {
        createAuthor() {
            axios.post('http://localhost/api/authors/create', this.fields).
            then((response) => {
                this.fields = {};
                this.success = true;
                setTimeout(() => {
                    location.reload()
                }, 3000)
            }).
            catch((error) => console.log(error))
        }
    }
}
</script>

<style scoped>

</style>
