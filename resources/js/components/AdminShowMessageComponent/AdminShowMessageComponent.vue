<template>
    <div class="AdminShowMessageComponent">
        <div class="mail-wrapper" style="display: block;" v-for="message in messages" :key="message.id">
            <div class="mail-top shadow">
                <div class="mail-subject">Fedback:{{ message.message_sender.emali}} Subjeqt:{{ message.message_text}}</div>
                <div class="mail-action"></div>
            </div>
            <div class="mail-content" style="display: block;">
                <div class="mail-body ">
                    <div class="image">
                        <img :src="'/'+message.message_sender.photo">
                    </div>
                    <div class="someClass">
                        <div class="sender">
                            <span>{{ message.message_sender.name}}</span>
                            <span>   {{ message.message_sender.surname}} </span>
                        </div>
                        <div class="message">
                            {{ message.message_text}}
                        </div>
                    </div>
                </div>
<!--                <div class="mail-footer shadow">-->
<!--                    <div class="image">-->
<!--                        <img :src="'/'+message.message_sender.photo">-->
<!--                    </div>-->
<!--                    <div class="replybox">-->
<!--                        <div class="draft"><span>Draft </span><span>to, Kennedy <i class="fa fa-angle-down"></i></span></div>-->
<!--                        <textarea></textarea>-->
<!--                        <div class="left">-->
<!--                            <a href="#" class="send-btn">SEND</a>-->
<!--                            <a href="#"><i class="fa fa-paperclip"></i></a>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                </div>-->
            </div>
        </div>
    </div>
</template>

<script>

    export default {
        data() {
            return {
                messages: {},
            }
        },
        methods: {
            getInbox(){
                axios.post(`/profil/admin/showmessage/${this.$route.params.id}`)
                    .then((response)=>{
                        this.messages = response.data.message;
                        console.log(response.data.message)
                    })
            },

        },
        created() {
            this.getInbox()
        },

    };


</script>
