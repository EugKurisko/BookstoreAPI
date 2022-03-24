<template>
    <div v-show="success">Author was successfully updated</div>
    <form @submit.prevent="updateAuthor">
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
    name: "AuthorUpdate",
    data() {
        return {
            fields: {},
            success: false,
        }
    },
    created() {
        const authorId  = this.$route.params.authorId;
        axios.get(`http://localhost/api/authors/${authorId}/show`).
        then((response) => {
            this.fields = response.data.data
        }).
        catch((error) => console.log(error))
    },
    methods: {
        updateAuthor() {
            axios.post(`http://localhost/api/authors/${this.fields.id}/update`, this.fields).
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
