<template>
    <div v-show="success">Author was successfully created</div>
    <form @submit.prevent="createAuthor">
        <AuthorFields v-bind:author="this.fields"/>
    </form>
</template>

<script>
import axios from "axios";
import AuthorFields from "./AuthorFields.vue";

export default {
    name: "AuthorCreate",
    components: {
      AuthorFields
    },
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
