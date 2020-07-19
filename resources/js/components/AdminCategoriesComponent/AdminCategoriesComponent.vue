<template>
    <div class="AdminCategoriesComponent">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Category List</div>
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
                                <tr v-for="category in categories" :key="category.id">
                                    <td>{{ category.id }}</td>
                                    <td>{{ category.name }}</td>
                                    <td><button class="btn third" v-on:click="deletcategory(category.id)">Delete</button></td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="add-input-container">
                            <div class="add-input-box">
                                <input type="text" placeholder="Add category" v-model="categoryname">
                                <div class="add-input-button"><i class="fa fa-check" v-on:click="addcategory"></i></div>
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
                categories: {},
                categoryname: '',
            };
        },
        methods: {
            getCategory(){
                axios.post('/print/admin/categories')
                    .then((response)=>{
                        this.categories = response.data.categories
                    })
            },

            deletcategory(id) {
                axios.post('/delete/admin/category',  {category_id: id})
                    .then((response)=>{
                        this.getCategory()
                    })
            },

            addcategory() {
                axios.post('/add/admin/category',  {category: this.categoryname})
                    .then((response)=>{
                        this.getCategory();
                        this.categoryname = '';
                    })
            },

        },
        created() {
            this.getCategory()
        },
    }

</script>
