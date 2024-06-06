<template>
    <div class="">
        <h1>Properties</h1>
        <div class="resource" v-if="data">
            <pre>{{ data }}</pre>
        </div>
        <router-link to="/dashboard">Back to dashboard</router-link>
    </div>
</template>

<script>
import axios from 'axios';

export default {
    data() {
        return {
            data: null
        };
    },
    computed: {
        formattedData() {
            return JSON.stringify(this.data, null, 2);
        }
    },
    async created() {
        try {
            const response = await axios.get('http://localhost/api/properties');
            this.data = response.data;
        } catch (error) {
            console.error('Error fetching protected resource:', error);
        }
    }
};
</script>
<style scoped>
.resource {
    padding: 20px;
    border: 1px solid #ccc;
    border-radius: 4px;
    background-color: #f9f9f9;
}
.resource pre {
    background-color: #333;
    color: #fff;
    padding: 10px;
    border-radius: 4px;
    overflow-x: auto;
}
</style>
