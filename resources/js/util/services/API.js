import axios from "axios";

class API {
    constructor() {
        this.URL = "/api/v1";
    }

    signup(user) {
        return axios.post(`${this.URL}/auth/signup`, user);
    }

    login(user) {
        return axios.post(`${this.URL}/auth/login`, user);
    }
}

export default API;
