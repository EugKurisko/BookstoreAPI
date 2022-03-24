<template>
    <div v-show="success">Author was successfully updated</div>
    <form @submit.prevent="updateAuthor">
        <AuthorFields v-bind:author="this.fields"/>
    </form>
</template>

<script>
import axios from "axios";
import AuthorFields from "./AuthorFields.vue";

export default {
    name: "AuthorUpdate",
    components: {
      AuthorFields
    },
    data() {
        return {
            fields: {},
            success: false,
        }
    },
    created() {
        const authorId  = this.$route.params.authorId;
        axios.get(`api/authors/${authorId}/show`).
        then((response) => {
            this.fields = response.data.data
        }).
        catch((error) => console.log(error))
    },
    methods: {
        updateAuthor() {
            axios.post(`api/authors/${this.fields.id}/update`, this.fields).
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
