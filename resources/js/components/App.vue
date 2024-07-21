<template>
    <div id="app" class="container mx-auto p-4">
        <nav class="mb-4">
            <router-link :to="{ name: 'Countries' }" class="text-blue-500 hover:underline mr-4">Countries</router-link>
            <router-link :to="{ name: 'Companies' }" class="text-blue-500 hover:underline mr-4">Companies</router-link>
            <router-link :to="{ name: 'Leaders' }" class="text-blue-500 hover:underline">Leaders</router-link>
        </nav>
        <router-view></router-view>
    </div>
</template>

<script>
export default {
    name: 'App',
};
</script>

<style>
nav {
    padding: 1em;
}

nav a {
    margin-right: 1em;
}
</style>
