<template>
    <div class="AdminInboxComponet">
        <div class="content-wrapper" v-for="inbox in inboxs" :key="inbox.id" >
            <router-link :to = "'/profil/admin/showmessage/'+inbox.id">
            <div class="image">
                <img :src="'/'+inbox.message_sender.photo">
            </div>
            <div class="name"><span>{{ inbox.message_sender.name}}</span></div>
            <div class="subject">
                <div class="actions">
                    <a href="#" class="pinned-msg"><i class="fa fa-thumb-tack"></i></a>
                </div>
                <div class="content">
                    <span class="fs">{{ inbox.subject}}</span><span> - </span><span class="sn">{{ inbox.message_text }}</span>
                </div>
            </div>
            </router-link>
        </div>
    </div>


</template>

<script>
    export default {

        data() {
            return {
                inboxs: {},
            }
        },
        methods: {
            getInbox(){
                axios.post('/print/admin/inboxs')
                    .then((response)=>{
                        this.inboxs = response.data.inboxs
                    })
            },

        },
        created() {
            this.getInbox()
        },

    }
</script>