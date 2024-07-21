<template>
    <div id="app" class="container mx-auto p-4">
        <div class="mb-4 flex justify-between items-center">
            <router-link :to="{ name: 'Home' }" class="logo no-underline uppercase text-2xl leading-6 font-extrabold text-white">
                Gold Mining App
            </router-link>
            <nav class="mb-4 p-4">
                <router-link :to="{ name: 'Countries' }" class="text-black hover:text-gray-400 mr-4">Countries
                </router-link>
                <router-link :to="{ name: 'Companies' }" class="text-black hover:text-gray-400 mr-4">Companies
                </router-link>
                <router-link :to="{ name: 'Leaders' }" class="text-black hover:text-gray-400">Leaders</router-link>
            </nav>
        </div>
        <main>
            <router-view></router-view>
        </main>
    </div>
</template>

<script>
export default {
    name: 'App',
};
</script>

<style>
.logo {
    font-family: 'Montserrat ExtraBold', sans-serif;
    text-shadow: #000 0 0 1px, #000 0 0 1px, #000 0 0 1px, #000 0 0 1px, #000 0 0 1px, #000 0 0 1px;
}
</style>
