<template>
    <div class="container mx-auto p-4">
        <h2 class="text-2xl font-bold mb-4">Countries</h2>
        <table class="min-w-full bg-white border border-gray-300">
            <thead>
            <tr>
                <th class="py-2 px-4 border-b">Name</th>
                <th class="py-2 px-4 border-b">Planned Weight</th>
                <th class="py-2 px-4 border-b">Actions</th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="country in countries" :key="country.id" class="hover:bg-gray-100">
                <td class="py-2 px-4 border-b">{{ country.name }}</td>
                <td class="py-2 px-4 border-b">{{ country.planned_weight }}</td>
                <td class="py-2 px-4 border-b">
                    <button @click="editCountry(country.id)" class="bg-blue-500 text-white px-4 py-2 rounded mr-2">Edit</button>
                    <button @click="deleteCountry(country.id)" class="bg-red-500 text-white px-4 py-2 rounded">Delete</button>
                </td>
            </tr>
            </tbody>
        </table>
        <button @click="showAddForm" class="mt-4 bg-green-500 text-white px-4 py-2 rounded">Add Country</button>
        <div v-if="showForm" class="mt-4">
            <h3 class="text-xl font-bold mb-2">Add/Edit Country</h3>
            <form @submit.prevent="saveCountry" class="bg-white p-4 shadow-md rounded">
                <div class="mb-4">
                    <label class="block text-gray-700">Name:
                        <input v-model="country.name" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" />
                    </label>
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700">Planned Weight:
                        <input v-model="country.planned_weight" type="number" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" />
                    </label>
                </div>
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Save</button>
            </form>
        </div>
    </div>
</template>

<script>
import axios from 'axios';

export default {
    data() {
        return {
            countries: [],
            country: { name: '', planned_weight: '' },
            showForm: false,
            editMode: false,
        };
    },
    created() {
        this.fetchCountries();
    },
    methods: {
        async fetchCountries() {
            const response = await axios.get('/api/countries');
            this.countries = response.data;
        },
        showAddForm() {
            this.showForm = !this.showForm;
            this.editMode = false;
            this.country = { name: '', planned_weight: '' };
        },
        async saveCountry() {
            if (this.editMode) {
                await axios.put(`/api/countries/${this.country.id}`, this.country);
            } else {
                await axios.post('/api/countries', this.country);
            }
            await this.fetchCountries();
            this.showForm = false;
        },
        async deleteCountry(id) {
            await axios.delete(`/api/countries/${id}`);
            await this.fetchCountries();
        },
        async editCountry(id) {
            const response = await axios.get(`/api/countries/${id}`);
            this.country = response.data;
            this.showForm = true;
            this.editMode = true;
        }
    }
};

</script>
