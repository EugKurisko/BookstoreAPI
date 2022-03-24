<template>
    <div v-show="success">Book was successfully reserved</div>
    <p>{{ bookData.title }}</p>
    <p>{{ bookData.short_description }}</p>
    Remain: <span>{{ bookData.amount }}</span><br>
    <div v-if="bookData.author">
        Author:
        <a @click="getAuthor(bookData.author.id)">
            {{ bookData.author.first_name }} {{ bookData.author.last_name }}
        </a>
    </div>
    <div v-if="bookData.amount">
        <form @submit.prevent="reserve">
        How many books do you want to reserve? <br>
        <input type="number" v-model="fields.quantity" min="1"><br>
        Your email: <br>
        <input type="email" v-model="fields.email"><br>
        <button type="submit">
            Reserve book
        </button>
        </form>
    </div>
    <div v-else>
        There are now available books to reserve. Visit this page later
    </div>
</template>

<script>
import axios from "axios";
export default {
    name: "BookPage",
    data() {
        return {
            bookData: {},
            fields: {},
            success: false,
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
        },
        reserve(){
            this.fields.book_id = this.bookData.id;
            axios.post('http://localhost/api/reservations/reserve', this.fields).
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
