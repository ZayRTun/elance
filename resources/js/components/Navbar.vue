<template>
    <nav>
        <v-toolbar flat app>
            <v-toolbar-side-icon class="grey--text" @click.stop="drawer = !drawer"></v-toolbar-side-icon>

            <v-toolbar-title class="text-uppercase grey--text">
                <!-- <span class="font-weight-light">eLance</span> -->
                <!-- <span>eLance</span> -->
                <!-- <span>{{ profile.name }}</span> -->
            </v-toolbar-title>

            <v-spacer></v-spacer>

            <!-- dropdown menu -->
            <v-menu offset-y>
                <v-btn flat color="grey" dark slot="activator">
                    <span>menu</span>
                    <v-icon right>expand_more</v-icon>
                </v-btn>

                </v-card>

                    <v-list>
                        <v-list-tile v-for="link in links" :key="link.text" router :to="link.route">
                            <v-list-tile-title>{{ link.text }}</v-list-tile-title>
                        </v-list-tile>
                    </v-list>

                </v-card>

            </v-menu>

            <v-btn flat color="grey">
                <span>Sign Out</span>
                <v-icon right>exit_to_app</v-icon>
            </v-btn>
        </v-toolbar>

        <v-navigation-drawer v-model="drawer" app class="primary">
            <v-layout column align-center>
                <v-flex class="mt-5">
                    <v-avatar size="75">
                        <img src="/img/user.png" alt="alt">
                    </v-avatar>
                    <p class="white--text subheading mt-1">
                        Username
                    </p>
                </v-flex>


            </v-layout>

            <v-list>
                <v-list-tile v-for="link in links" :key="link.text" router :to="link.route">
                    <v-list-tile-action>
                        <v-icon class="white--text" v-text="link.icon"></v-icon>
                    </v-list-tile-action>
                    <v-list-tile-content>
                        <v-list-tile-title class="white--text" v-text="link.text"></v-list-tile-title>
                    </v-list-tile-content>
                </v-list-tile>
            </v-list>
        </v-navigation-drawer>
    </nav>
</template>

<script>
// import Popup from './Popup.vue';

export default {
    data () {
        return {
            profile: null,
            drawer: false,
            links: [
                { icon: 'dashboard', text: 'Dashboard', route: '/'},
                { icon: 'folder', text: 'My Projects', route: '/projects'},
                { icon: 'person', text: 'Team', route: '/team'}
            ],

            snackbar: false,
        }
    },

    created() {
        axios.get('/api/elancer')
            .then(response => {
                this.profile = response.data[0];
                console.log(this.profile);
            })
    }
}
</script>
