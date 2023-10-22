<script setup>
import {onUpdated, ref, watch} from "vue";
import {onBeforeRouteUpdate, useRoute, useRouter} from "vue-router";

const title = ref()
const body = ref()
const userId = ref()
const route = useRoute()
const props = defineProps(['post'])
console.log(props.post)
function editPost() {
    axios.put(`https://jsonplaceholder.typicode.com/posts/${props.post.id}`,{
        title: title.value,
        body: body.value,
        userId: userId.value
    }).then(res => {
        console.log(res)
    })

}

function deletePost() {
axios.delete(`https://jsonplaceholder.typicode.com/posts/${props.post.id}`).then(res=>{
    console.log(res)
})

}
</script>

<template>
    <div class=" mt-6 flex justify-center  ">
        <form>
            <div class="mb-6">
                <h1 > РЕДАКТИРОВАТЬ/Удалить ПОСТ {{props.post.id}}</h1>
            </div>
            <div class="mb-3">

                <label for="serialNumber">Изменить title </label>
                <div>
                    <input id="serialNumber"
                           class=" form-input rounded-full w-96  border-sky-500 border-2 text-center h-10"
                           placeholder="title" v-model="props.post.title">
                </div>


            </div>
            <div>
                <label for="serialNumber">Изменить body: </label>
                <p class="mt-3">
                    <textarea id="serialNumber"
                           class=" form-input rounded-full w-96 h-32  border-sky-500 border-2 text-center h-10"
                              placeholder="body" v-model="props.post.body"></textarea>
                </p>

            </div>
            <div>
                <label for="serialNumber">Изменить userId: </label>
                <p class="mt-3">
                    <input id="serialNumber"
                           class=" form-input rounded-full w-40  border-sky-500 border-2 text-center h-10"
                           placeholder="userId" v-model="props.post.userId">
                </p>

            </div>
            <a class=" cursor-pointer w-24  bg-blue-500  text-white  text-center border-1 rounded-3xl px-2 py-0.5
        hover:bg-white hover:text-black border border-gray-300 mt-6"
               type="submit" @click="editPost">
                Изменить
            </a>
            <a class=" cursor-pointer w-24  bg-red-500  text-white  text-center border-1 rounded-3xl px-2 py-0.5
        hover:bg-white hover:text-black border border-gray-300 mt-6"
               type="submit" @click="deletePost">
                Удалить
            </a>


        </form>
    </div>
</template>

<style scoped>

</style>
