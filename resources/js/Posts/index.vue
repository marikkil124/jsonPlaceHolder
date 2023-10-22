<script setup>
import {ref, watch} from "vue";

const start = ref(1)
const end = ref()
const posts = ref()
const size = ref(10)
const pageNumber = ref(0)

function getUsers() {
    axios.get('https:/jsonplaceholder.typicode.com/posts').then(res => {
        posts.value = res.data;
        page(posts.value)
    });

};
getUsers()


function prevPage() {
    pageNumber.value--
    console.log(pageNumber.value)
}

function nextPage() {
    pageNumber.value++
    console.log(pageNumber.value)

}

watch(pageNumber, () => {
    getUsers()
})

function page(posts1) {
    start.value = pageNumber.value * size.value
    end.value = start.value + size.value
    posts.value = posts1.slice(start.value, end.value)
    console.log(start.value)
}
const emit =defineEmits(['editPost'])
function editPost(post)
{
    emit("editPost", post);

}
</script>

<template>
       <div class="text-lg text-center"> Нажмите на пост, чтобы изменить /удалить</div>
    <button @click="prevPage" class="bg-sky-500 w-20">
        Previous
    </button>
    <button @click="nextPage" class="bg-sky-500 ml-10 w-20">
        Next
    </button>

    <table class="ml-7  border-solid border-2 border-gray-300 table-fixed ">
        <tr>
            <th scope="col">
                ID
            </th>
            <th>
                title

            </th>
            <th>
                body
            </th>
            <th>
                userId
            </th>
        </tr>
        <tbody>
        <tr v-for="post in posts" class="hover:bg-sky-500 cursor-pointer" @click="editPost(post)">
            <td>{{ post.id}}</td>
            <td>{{ post.title }}s</td>
            <td>{{ post.body }}</td>
            <td>{{ post.userId }}</td>
        </tr>
        </tbody>
    </table>

</template>

<style scoped>

</style>
