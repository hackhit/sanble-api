import axios from "axios";

class API {
    constructor() {
        this.URL = "/api/web/v1";
    }

    // Auth
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
    checkToken(token) {
        return axios.post(`${this.URL}/auth/check`, null, {
            headers: {
                Authorization: `Bearer ${token}`
            }
        });
    }
}

export default API;
