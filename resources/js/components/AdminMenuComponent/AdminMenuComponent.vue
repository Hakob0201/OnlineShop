<template>
    <div class="AdminMenuComponet">
        <nav class="dropdownmenu">
            <ul style="background: none">
                <li>
                    <router-link to = "/profil/app">Home</router-link>
                </li>
                <li>
                    <router-link to = "/profil/app/admintable">Table</router-link>
                </li>
                <li><a>  Tables </a>
                    <ul class="submenu">
                        <li>
                            <router-link to = "/profil/admin/usersadmin">Users</router-link>
                        </li>
                        <li>
                            <router-link to = "/profil/admin/categoriesadmin">Categories</router-link>
                        </li>
                        <li>
                            <router-link to = "/profil/admin/sizesadmin">Sizes</router-link>
                        </li>
                        <li>
                            <router-link to = "/profil/admin/lengthsadmin">Lengths</router-link>
                        </li>
                        <li>
                            <router-link to = "/profil/admin/colorsadmin">Colors</router-link>
                        </li>
                    </ul>
                </li>
                <li><a><i class="fa fa-envelope"></i> </a>
                    <ul class="submenu">
                        <li>
                            <router-link to = "/profil/admin/inboxadmin">Inbox</router-link>
                        </li>
                        <li>
                            <router-link to = "/profil/admin/categoriesadmin">Sent</router-link>
                        </li>
                    </ul>
                </li>
                <li><a href="http://www.jochaho.com/wordpress/about-pritesh-badge/">Contact Us</a></li>
            </ul>
        </nav>
        <router-view></router-view>
    </div>
</template>

<script>
    export default {
        props: {
        },
    };
</script>
