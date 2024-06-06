import axios from 'axios';
import { createStore } from 'vuex'

export default createStore({
  state: {
      token: localStorage.getItem('token') || '',
      user: {},
  },
  getters: {
      isAuthenticated: state => !!state.token,
      user: state => state.user,
  },
  mutations: {
      setToken(state, token) {
          state.token = token;
      },
      setUser(state, user) {
          state.user = user;
      },
      logout(state) {
          state.token = '';
          state.user = {};
      },
  },
  actions: {
      saveToken({ commit }, token) {
          commit('setToken', token);
          localStorage.setItem('token', token);
      },
      removeToken({ commit }) {
          commit('clearToken');
          localStorage.removeItem('token');
      },
      loadToken({ commit }) {
          const token = localStorage.getItem('token');
          if (token) {
              commit('setToken', token);
          }
      }
  },
  modules: {
  }
})
