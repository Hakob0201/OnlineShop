<template>
    <div class="AdminSizesComponent">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Size List</div>
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
                                <tr v-for="size in sizes" :key="size.id">
                                    <td>{{ size.id }}</td>
                                    <td>{{ size.name }}</td>
                                    <td><button class="btn third" v-on:click="deletesize(size.id)">Delete</button></td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="add-input-container">
                            <div class="add-input-box">
                                <input type="text" placeholder="Add size" v-model="sizename">
                                <div class="add-input-button"><i class="fa fa-check" v-on:click="addsize"></i></div>
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
                sizes: {},
                sizename: '',
            };
        },
        methods: {
            getSize(){
                axios.post('/print/admin/sizes')
                    .then((response)=>{
                        this.sizes = response.data.sizes
                    })
            },

            deletesize(id) {
                axios.post('/delete/admin/size',  {size_id: id})
                    .then((response)=>{
                        this.getSize()
                    })
            },

            addsize() {
                axios.post('/add/admin/sizes',  {size: this.sizename})
                    .then((response)=>{
                        this.getSize();
                        this.sizename = '';
                    })
            },

        },
        created() {
            this.getSize()
        },
    }
</script>
