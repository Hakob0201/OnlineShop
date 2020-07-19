<template>
    <div class="AdminColorsCmponent">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Color List</div>
                    <div class="table-app">
                        <div class="tbl-header">
                            <table cellpadding="0" cellspacing="0" border="0">
                                <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Name</th>
                                    <th>delete</th>
                                </tr>
                                </thead>
                            </table>
                        </div>
                        <div class="tbl-content">
                            <table cellpadding="0" cellspacing="0" border="0">
                                <tbody>
                                <tr v-for="color in colors" :key="color.id">
                                    <td>{{ color.id }}</td>
                                    <td>{{ color.name }}</td>
                                    <td><button class="btn third" v-on:click="deletcolor(color.id)">Delete</button></td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="add-input-container">
                            <div class="add-input-box">
                                <input type="text" placeholder="Add color" v-model="colorname">
                                <div class="add-input-button"><i class="fa fa-check" v-on:click="addcolor"></i></div>
                            </div>
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
                colors: {},
                colorname: '',
            };
        },
        methods: {
            getColor(){
                axios.post('/print/admin/colors')
                    .then((response)=>{
                        this.colors = response.data.colors
                    })
            },

            deletcolor(id) {
                axios.post('/delete/admin/color',  {color_id: id})
                    .then((response)=>{
                        this.getColor()
                    })
            },

            addcolor() {
                axios.post('/add/admin/color',  {color: this.colorname})
                    .then((response)=>{
                        this.getColor();
                        this.colorname = '';
                    })
            },

        },
        created() {
            this.getColor()
        },
    }
</script>
