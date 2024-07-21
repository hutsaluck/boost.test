<template>
    <div class="container mx-auto p-4">
        <h2 class="text-2xl font-bold mb-4">Leaders</h2>
        <div class="mb-4">
            <label for="month" class="block text-gray-700">Select Month:</label>
            <select v-model="selectedMonth" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                <option v-for="month in months" :key="month" :value="month">{{ month }}</option>
            </select>
        </div>
        <div class="mb-4">
            <button @click="showReport" class="bg-blue-500 text-white px-4 py-2 rounded mr-2">Show Report</button>
            <button @click="generateData" class="bg-green-500 text-white px-4 py-2 rounded">Generate Data</button>
        </div>
        <div v-if="report.length" class="mt-4">
            <h3 class="text-xl font-bold mb-2">Report for {{ selectedMonth }}</h3>
            <table class="min-w-full bg-white border border-gray-300">
                <thead>
                <tr>
                    <th class="py-2 px-4 border-b">Country</th>
                    <th class="py-2 px-4 border-b">Mined</th>
                    <th class="py-2 px-4 border-b">Plan</th>
                </tr>
                </thead>
                <tbody>
                <tr v-for="item in report" :key="item.country" class="hover:bg-gray-100">
                    <td class="py-2 px-4 border-b">{{ item.country }}</td>
                    <td class="py-2 px-4 border-b">{{ item.mined }} T</td>
                    <td class="py-2 px-4 border-b">{{ item.plan }} T</td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
</template>

<script>
import axios from 'axios';

export default {
    data() {
        return {
            report: [],
            selectedMonth: '2024-01',
            months: ['2024-01', '2024-02', '2024-03', '2024-04', '2024-05', '2024-06']
        };
    },
    methods: {
        async showReport() {
            try {
                const response = await axios.get(`/api/report`, {
                    params: { month: this.selectedMonth }
                });
                this.report = response.data;
            } catch (error) {
                console.error('Error fetching report:', error);
            }
        },
        async generateData() {
            try {
                await axios.post('/api/generate-data');
                alert("Data generated successfully!");
            } catch (error) {
                console.error("Error generating data:", error);
            }
        }
    }
};
</script>

<style scoped>
table {
    width: 100%;
    border-collapse: collapse;
}

th, td {
    padding: 8px;
    text-align: left;
    border-bottom: 1px solid #ddd;
}

th {
    background-color: #f4f4f4;
}
</style>
