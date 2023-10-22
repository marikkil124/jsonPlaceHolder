<script setup>

import {ref} from "vue";
const editedPost = ref()
const posts = ref(false)
const postCreate = ref(false)
import {useRouter} from "vue-router";
import Index from "@/Posts/index.vue";
import Create from "@/Posts/create.vue";
import Edit from "@/Posts/edit.vue";
function showPosts(){
    editedPost.value=null
    posts.value=true
    postCreate.value=false

}
function showPostCreate(){
    editedPost.value=null
    posts.value=false
    postCreate.value=true

}



</script>


<template>
    <a class=" text-sky-500 cursor-pointer flex justify-center"
       type="submit" @click="showPosts">
        Посты
    </a>
    <a class=" text-sky-500 cursor-pointer flex justify-center"
       type="submit" @click="showPostCreate">
        Создать пост
    </a>
<div class="flex justify-center  ">
  <div v-if="posts" >
      <div class="mt-12">
          <index @editPost="(msg) => {editedPost = msg ; posts=false }"></index>
      </div>

  </div>
    <div v-if="postCreate" >
        <div class="mt-12">
            <create></create>
        </div>

    </div>
    <div v-if="editedPost" >
        <div class="mt-12">
            <edit :post = editedPost></edit>
        </div>

    </div>
</div>

</template>

<style scoped>

</style>
