<template>
    <div>
        <p>{{authorData.first_name}} {{authorData.last_name}}</p>
    </div>
    <div>
        <button @click="updateAuthorRedirect">Update Author</button>
        <button>Delete Author</button>
    </div>
</template>

<script>
import axios from "axios";
export default {
    name: "AuthorPage",
    data() {
        return {
            authorData: {}
        }
    },
    created() {
        const authorId  = this.$route.params.authorId;
        axios.get(`http://localhost/api/authors/${authorId}/show`).
        then((response) => {
            this.authorData = response.data.data
        }).
        catch((error) => console.log(error))
    },
    methods: {
        updateAuthorRedirect() {
            this.$router.push(`/authors/${this.authorData.id}/update`,
                {
                    authorId: this.authorData.id,
                })
        }
    }
}
</script>

<style scoped>

</style>
