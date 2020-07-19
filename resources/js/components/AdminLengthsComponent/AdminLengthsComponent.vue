<template>
    <div class="AdminLengthsComponent">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Length List</div>
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
                                <tr v-for="length in lengths" :key="length.id">
                                    <td>{{ length.id }}</td>
                                    <td>{{ length.name }}</td>
                                    <td><button class="btn third" v-on:click="deletlength(length.id)">Delete</button></td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="add-input-container">
                            <div class="add-input-box">
                                <input type="text" placeholder="Add length" v-model="lengthname">
                                <div class="add-input-button"><i class="fa fa-check" v-on:click="addlength"></i></div>
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
                lengths: {},
                lengthname: '',
            };
        },
        methods: {
            getLength(){
                axios.post('/print/admin/lengths')
                    .then((response)=>{
                        this.lengths = response.data.lengths
                    })
            },

            deletlength(id) {
                axios.post('/delete/admin/length',  {length_id: id})
                    .then((response)=>{
                        this.getLength()
                    })
            },

            addlength() {
                axios.post('/add/admin/length',  {length: this.lengthname})
                    .then((response)=>{
                        this.getLength();
                        this.lengthname = '';
                    })
            },

        },
        created() {
            this.getLength()
        },
    }
</script>
