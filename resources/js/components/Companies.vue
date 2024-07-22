<template>
    <div class="container mx-auto p-4">
        <h2 class="text-2xl font-bold mb-4">Companies</h2>
        <table class="min-w-full bg-white border border-gray-300">
            <thead>
            <tr>
                <th class="py-2 px-4 border-b">Name</th>
                <th class="py-2 px-4 border-b">Email</th>
                <th class="py-2 px-4 border-b">Country</th>
                <th class="py-2 px-4 border-b">Actions</th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="company in companies" :key="company.id" class="hover:bg-gray-100">
                <td class="py-2 px-4 border-b">{{ company.name }}</td>
                <td class="py-2 px-4 border-b">{{ company.email }}</td>
                <td class="py-2 px-4 border-b">{{ company.country.name }}</td>
                <td class="py-2 px-4 border-b">
                    <button @click="editCompany(company.id)" class="bg-blue-500 text-white px-4 py-2 rounded mr-2">Edit</button>
                    <button @click="deleteCompany(company.id)" class="bg-red-500 text-white px-4 py-2 rounded">Delete</button>
                </td>
            </tr>
            </tbody>
        </table>
        <button @click="showAddForm" class="mt-4 bg-green-500 text-white px-4 py-2 rounded">Add Company</button>
        <div v-if="showForm" class="mt-4 bg-white p-4 shadow-md rounded">
            <h3 class="text-xl font-bold mb-2">Add/Edit Company</h3>
            <form @submit.prevent="saveCompany">
                <div class="mb-4">
                    <label class="block text-gray-700">Name:
                        <input v-model="company.name" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" />
                    </label>
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700">Email:
                        <input v-model="company.email" type="email" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" />
                    </label>
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700">Country:
                        <select v-model="company.country_id" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                            <option v-for="country in countries" :key="country.id" :value="country.id">
                                {{ country.name }}
                            </option>
                        </select>
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
            companies: [],
            company: { name: '', email: '', country_id: null },
            countries: [],
            showForm: false,
            editMode: false,
        };
    },
    created() {
        this.fetchCompanies();
        this.fetchCountries();
    },
    methods: {
        async fetchCompanies() {
            const response = await axios.get('/api/companies');
            this.companies = response.data;
        },
        async fetchCountries() {
            const response = await axios.get('/api/countries');
            this.countries = response.data;
        },
        showAddForm() {
            this.showForm = !this.showForm;
            this.editMode = false;
            this.company = { name: '', email: '', country_id: null };
        },
        async saveCompany() {
            if (this.editMode) {
                await axios.put(`/api/companies/${this.company.id}`, this.company);
            } else {
                await axios.post('/api/companies', this.company);
            }
            await this.fetchCompanies();
            this.showForm = false;
        },
        async deleteCompany(id) {
            await axios.delete(`/api/companies/${id}`);
            await this.fetchCompanies();
        },
        async editCompany(id) {
            const response = await axios.get(`/api/companies/${id}`);
            this.company = response.data;
            this.showForm = true;
            this.editMode = true;
        }
    }
};
</script>
