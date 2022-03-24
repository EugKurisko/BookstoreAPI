<template>
    <div v-for="author in authors" :key="author.id">
        <a @click="getAuthor(author.id)">
            {{ author.first_name }} {{ author.last_name }}
        </a> <br>
    </div>
</template>

<script>
import axios from "axios";
export default {
    name: "AuthorIterator",
    props: {
        authors: Array
    },
    data() {
        return {
            author: {},
        }
    },
    methods: {
        getAuthor(authorId) {
            this.$router.push(`/authors/${authorId}/show`,
                {
                    authorId: authorId,
                })
            // axios.get(`http://localhost/api/authors/${authorId}/show`).
            // then((response) => {
            //     this.author = response.data.data
            //     this.$router.push(`/authors/${authorId}/show`,
            //         {
            //         authorId: authorId,
            //     })
            // }).
            // catch((error) => console.log(error))
        }
    }

}
</script>

<style scoped>

</style>
