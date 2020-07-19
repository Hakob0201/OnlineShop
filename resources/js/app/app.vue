<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">User List</div>
                    <div class="table-app">
                    <div class="tbl-header">
                        <table cellpadding="0" cellspacing="0" border="0">
                            <thead>
                            <tr>
                                <th>Id</th>
                                <th>Name</th>
                                <th>Surname</th>
                                <th>Email</th>
                                <th>Status</th>
                                <th>delete</th>
                                <th>Block</th>
                                <th>Active</th>
                            </tr>
                            </thead>
                        </table>
                    </div>
                    <div class="tbl-content">
                        <table cellpadding="0" cellspacing="0" border="0">
                            <tbody>
                            <tr v-for="user in users" :key="user.id">
                                <td>{{ user.id }}</td>
                                <td>{{ user.name }}</td>
                                <td>{{ user.surname }}</td>
                                <td>{{ user.email }}</td>
                                <td>{{ user.status }}</td>
                                <td><button class="btn third" v-on:click="deleteuser(user.id)">Delete</button></td>
                                <td><button class="btn third" v-on:click="blockuser(user.id)">Block</button></td>
                                <td><button class="btn third" v-on:click="activeuser(user.id)">Active</button></td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
    export default {

        data() {
            return {
                users: {},
            }
        },
        methods: {
            getUser(){
                axios.post('/profil/app')
                    .then((response)=>{
                        this.users = response.data.users
                    })
            },

            deleteuser(id) {
                axios.post('/delete/user/app',  {user_id: id})
                .then((response)=>{
                    this.getUser()
                })
            },

            blockuser(id) {
                axios.post('/block/user/app',  {user_id: id})
                    .then((response)=>{
                        this.getUser()
                    })
            },

            activeuser(id) {
                axios.post('/active/user/app',  {user_id: id})
                    .then((response)=>{
                        this.getUser()
                    })
            }

        },
        created() {
            this.getUser()
        }
    }
</script>