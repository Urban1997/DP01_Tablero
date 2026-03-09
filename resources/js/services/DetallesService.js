import axios from "axios";

const API_URL = "http://127.0.0.1:8001/api";

export const obtenerDetalles = async (ctrl) => {

    const response = await axios.get(`${API_URL}/detalles/${ctrl}`);

    return response.data;

};
