import axios from 'axios';
import store from './store';

store.dispatch('loadToken');

axios.interceptors.request.use(
    config => {
        const token = store.state.token;
        if (token) {
            config.headers.Authorization = `Bearer ${token}`;
        }
        return config;
    },
    error => Promise.reject(error)
);

export default axios;
