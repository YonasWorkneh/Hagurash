import { TIMEOUT_SEC } from "./config.js";

export const timeOut = function (s) {
  return new Promise(function (_, reject) {
    setTimeout(function () {
      reject(new Error(`Request took too long! Time out after ${s} seconds.`));
    }, s * 1000);
  });
};

export const fetchJSON = async function (url, method = "GET", data) {
  try {
    const fetchPro =
      method === "GET"
        ? fetch(url)
        : fetch(url, {
            method,
            headers: {
              "Content-Type": "application/JSON",
            },
            body: JSON.stringify(data),
          });
    const response = await Promise.race([fetchPro, timeOut(TIMEOUT_SEC)]);
    if (!response.ok)
      throw new Error(`Problem while trying to fetch the requested Url`);
    return response.json();
  } catch (err) {
    throw err;
  }
};

