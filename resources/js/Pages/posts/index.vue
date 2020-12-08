<template>
    <app-layout>
        <form @submit.prevent="submitPost">
            <label for="post">
                Postear
                <input type="text" v-model="form.title">
            </label>
            <button type="submit">postear</button>
        </form>
        <table class="ml-8">
            {{notifications.length}}
            <thead>
                <tr>
                    <th>title</th>
                    <th>Detalles</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="p in this.post" :key="p.id">
                    <td>{{p.title}}</td>
                    <td><inertia-link :href="route('post.show',p.id)">Ver mas</inertia-link></td>
                </tr>
            </tbody>
        </table>
    </app-layout>
</template>
<script>
import AppLayout from '../../Layouts/AppLayout.vue'
export default {
    name:"indexPost",
    components:{
        AppLayout,
    },
     props:{
        notifications:Array,
        user:Object,
        list_post:Array,
    },
    data(){
        return{
            post:this.list_post,
            form:{
                title:null,
            }
        }   
    },
    methods:{
        submitPost()
        {
            this.$inertia.post(this.route('post.store'),this.form);
        }
    }
}
</script>