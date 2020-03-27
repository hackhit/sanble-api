import axios from "axios";

class API {
    constructor() {
        this.URL = "/api/v1";
    }

    signup(user) {
        console.log(user);
        return axios.post(`${this.URL}/auth/signup`, user);
    }
}

export default API;
