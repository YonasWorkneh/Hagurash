import { LOCAL_API_URL } from "./config.js"
import { fetchJSON } from "./helpers.js"

export const setUserCookieConsent = async function (consent) {
  const res = await fetchJSON(`${LOCAL_API_URL}/cookieConsent.php`, "POST", { consent: consent });
  return res;
}