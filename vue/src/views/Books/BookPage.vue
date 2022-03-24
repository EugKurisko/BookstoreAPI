<template>
    <p>{{ bookData.title }}</p>
    <p>{{ bookData.short_description }}</p>
    Remain: <span>{{ bookData.amount }}</span><br>
    <div v-if="bookData.author">
        Author:
        <a @click="getAuthor(bookData.author.id)">
            {{ bookData.author.first_name }} {{ bookData.author.last_name }}
        </a>
    </div>
</template>

<script>
import axios from "axios";
export default {
    name: "BookPage",
    data() {
        return {
            bookData: {}
        }
    },
    created() {
        const bookId  = this.$route.params.bookId;
        axios.get(`http://localhost/api/books/${bookId}/show`).
        then((response) => {
            this.bookData = response.data.data
        }).
        catch((error) => console.log(error))
    },
    methods: {
        getAuthor(authorId) {
            this.$router.push(`/authors/${authorId}/show`,
                {
                    authorId: authorId,
                })
        }
    }
}
</script>

<style scoped>

</style>
