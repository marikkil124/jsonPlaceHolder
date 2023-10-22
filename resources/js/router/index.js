import {createRouter, createWebHistory, useRoute} from "vue-router";
import {watch} from "vue";
const route = useRoute()
const router = createRouter({
    // 4. Provide the history implementation to use. We are using the hash history for simplicity here.
    history: createWebHistory(),
    routes: [

        {
            path: '/posts',
            component: () => import('../posts/index.vue')
        },
        {
            path: '/CreatePost',
            component: () => import('../posts/create.vue')
        },


    ]
})

export default router
