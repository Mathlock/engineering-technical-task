<template>
    <div>
        <h1>Login</h1>
        <form @submit.prevent="login">
            <input type="email" v-model="email" placeholder="Email" required />
            <input type="password" v-model="password" placeholder="Password" required />
            <button type="submit">Login</button>
        </form>
        <p v-if="errorMessage">{{ errorMessage }}</p>
    </div>
</template>

<script>
import axios from 'axios';
import { mapActions } from 'vuex';

export default {
    data() {
        return {
            email: '',
            password: '',
            error: ''
        };
    },
    methods: {
        ...mapActions(['saveToken']),
        async login() {
            try {
                const response = await axios.post('http://localhost/api/login', {
                    email: this.email,
                    password: this.password
                });
                const token = response.data.access_token;
                await this.saveToken(token);

                this.$router.push('/dashboard');
            } catch (err) {
                this.error = 'Login failed. Please check your credentials and try again.';
            }
        }
    }
};
</script>
