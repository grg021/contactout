import axios from "axios";

const service = axios.create({
    baseURL: 'http://contactout.test'
})

export default service;
