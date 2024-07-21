<template>
    <div class="container mx-auto p-4">
        <div class="mt-8 p-6 bg-gray-100 rounded shadow">
            <h2 class="text-xl font-semibold mb-4">Welcome to the Gold Mining App!</h2>
            <p class="mb-4">
                This application allows you to manage gold mining data, including countries, companies, and their mining
                activities.
            </p>
            <p>
                Use the navigation links above to access different sections of the app:
                <ul class="list-disc ml-6">
                    <li><strong>Countries</strong>: Manage and view information about countries.</li>
                    <li><strong>Companies</strong>: Manage and view information about mining companies.</li>
                    <li><strong>Leaders</strong>: View reports and data on gold mining performance.</li>
                </ul>
            </p>
        </div>
    </div>
</template>

<script>
export default {
    name: 'Home',
}
</script>

<style scoped>

</style>
