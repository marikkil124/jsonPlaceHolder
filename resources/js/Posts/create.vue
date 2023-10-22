<script setup>
import {onUpdated, ref, watch} from "vue";
import {onBeforeRouteUpdate, useRoute, useRouter} from "vue-router";

const title = ref()
const body = ref()
const userId = ref()
const route = useRoute()

function addPost() {
    axios.post('https:/jsonplaceholder.typicode.com/posts', {
        title: title.value,
        body: body.value,
        userId: userId.value
    }).then(res => {
        console.log(res)

    })
}


</script>

<template>

    <div class=" mt-6 flex justify-center  ">


        <form>
            <div class="mb-6">
                <h1 > СОЗДАТЬ ПОСТ</h1>
            </div>
            <div class="mb-3">

                <label for="serialNumber">Введите title </label>
                <div>
                    <input id="serialNumber"
                           class=" form-input rounded-full w-40  border-sky-500 border-2 text-center h-10"
                           placeholder="title" v-model="title">
                </div>


            </div>
            <div>
                <label for="serialNumber">Введите body: </label>
                <p class="mt-3">
                    <input id="serialNumber"
                           class=" form-input rounded-full w-40  border-sky-500 border-2 text-center h-10"
                           placeholder="body" v-model="body">
                </p>

            </div>
            <div>
                <label for="serialNumber">Введите userId: </label>
                <p class="mt-3">
                    <input id="serialNumber"
                           class=" form-input rounded-full w-40  border-sky-500 border-2 text-center h-10"
                           placeholder="userId" v-model="userId">
                </p>

            </div>
            <a class=" cursor-pointer w-24  bg-blue-500  text-white  text-center border-1 rounded-3xl px-2 py-0.5
        hover:bg-white hover:text-black border border-gray-300 mt-6"
               type="submit" @click="addPost( )">
                Добавить
            </a>

        </form>
    </div>
</template>

<style scoped>

</style>
