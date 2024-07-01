import { LOCAL_API_URL } from "./config.js";
import { fetchJSON } from "./helpers.js";


export const getVideos = async function () {
  return await fetchJSON(`${LOCAL_API_URL}/video.php`);
}

export const getTrendingVideos = async function () {
  return await fetchJSON(`${LOCAL_API_URL}/trending.php`);
}
