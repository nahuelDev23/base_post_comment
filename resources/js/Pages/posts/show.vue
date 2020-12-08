<template>
    <app-layout>
        "show POST"
        {{post_specific[0].user_id}}
        <form @submit.prevent="submitcomment">
            <label for="comment">
                comment
                <input type="text" v-model="form.comment">
            </label>
            <button type="submit">Comentar</button>
        </form>
    </app-layout>
</template>
<script>
import AppLayout from '../../Layouts/AppLayout.vue'
export default {
    name:"showPost",
    components:{
        AppLayout,
    },
     props:{
        post:Array,
    },
    data(){
        return{
            post_specific:this.post,
            form:{
                comment:null,
                post_id:this.post[0].id,
                user_id:this.post[0].user_id,
            }
        }   
    },
    methods:{
        submitcomment(){
           this.$inertia.post(this.route('comment.store'),this.form);
        }
    }
}
</script>