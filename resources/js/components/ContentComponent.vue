<template>
    <v-container class="grey lighten-5">
        <v-row no-gutters>
            <v-col cols="12" sm="12" md="4">
                <v-card class="pa-2" outlined tile>
                    <panel-search-component></panel-search-component>
                </v-card>
            </v-col>
            <v-col cols="12" sm="12" md="8">
                <v-row>
                   
                </v-row>
            </v-col>
        </v-row>
    </v-container>
</template>

<script>
export default {
    data() {
        return {
            colors: [
                "indigo",
                "warning",
                "pink darken-2",
                "red lighten-1",
                "deep-purple accent-4"
            ],
            slides: ["First", "Second", "Third", "Fourth", "Fifth"]
        };
    }
};
</script>

<style></style>
