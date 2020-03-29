import axios from "axios";

class API {
    constructor() {
        this.URL = "/api/v1";
    }

    signup(user) {
        return axios.post(`${this.URL}/auth/signup`, user, {
            headers: {
                "Accept-Language": "es"
            }
        });
    }

    login(user) {
        return axios.post(`${this.URL}/auth/login`, user, {
            headers: {
                "Accept-Language": "es"
            }
        });
    }
}

export default API;