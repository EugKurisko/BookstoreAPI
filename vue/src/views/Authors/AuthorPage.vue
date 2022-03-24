<template>
    <div>
        <p>{{authorData.first_name}} {{authorData.last_name}}</p>
    </div>

    <div v-if="authorData.books.length > 0">
        Author's Books:
        <div v-for="book in authorData.books" :key="book.id">
            <a @click="getBook(book.id)">
                {{ book.title }}
            </a>
        </div>
    </div>
    <div v-else>
        Author has no books
    </div>
    <br>
    <div>
        <button @click="updateAuthorRedirect">Update Author</button>
        <button @click="deleteAuthor">Delete Author</button>
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
        },
        deleteAuthor() {
            axios.post(`http://localhost/api/authors/${this.authorData.id}/delete`, this.fields).
            then((response) => {
               this.$router.push(`/authors/all`)
            }).
            catch((error) => console.log(error))
        },
        getBook(bookId) {
            this.$router.push(`/books/${bookId}/show`,
                {
                    bookId: bookId,
                })
        }
    }
}
</script>

<style scoped>

</style>
