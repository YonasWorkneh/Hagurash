import { LOCAL_API_URL } from "./config.js";
import { fetchJSON } from "./helpers.js";

export const exportCustomerData = async function (format) {
  fetch(`${LOCAL_API_URL}/export.php?format=${format}`)
    .then((response) => {
      // Check if the response is successful
      if (response.ok) {
        // Trigger the file download
        response.blob().then((blob) => {
          var url = window.URL.createObjectURL(blob);
          var a = document.createElement("a");
          a.href = url;
          a.download = `export.${format}`;
          document.body.appendChild(a);
          a.click();
          a.remove();
        });
      } else {
        // Handle any errors
        console.error("Error:", response.status);
      }
    })
    .catch((error) => {
      console.error("Error:", error);
    });
};
