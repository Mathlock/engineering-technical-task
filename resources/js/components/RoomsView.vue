<template>
  <div class="">
    <h1>Rooms</h1>
    <div v-if="data" class="resource">
        <pre>{{ data }}</pre>
    </div>
      <div v-else>
          <p>Loading data...</p>
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
            const response = await axios.get('http://localhost/api/rooms');
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
