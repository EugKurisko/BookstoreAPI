<template>
    <div>
        <p>{{authorData.first_name}} {{authorData.last_name}}</p>
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
            console.log(this.authorData)
        }).
        catch((error) => console.log(error))
    }
}
</script>

<style scoped>

</style>
