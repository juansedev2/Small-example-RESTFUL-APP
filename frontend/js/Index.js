// Let's go to learn to use AJAX: https://developer.mozilla.org/es/docs/conflicting/Web/Guide/AJAX_21419c7dfa67c94789f037a33c4e4e3e

// This is to validate how to instance the correct  

/* if (window.XMLHttpRequest) { // Mozilla, Safari, ...
    http_request = new XMLHttpRequest();
} else if (window.ActiveXObject) { // IE BUT IE IS DEAD... so
    http_request = new ActiveXObject("Microsoft.XMLHTTP");
} */

// Create a new XMLHttpRequest
const http_request = new XMLHttpRequest();
const query_button = document.getElementById("query_button");

/***
 * The next step is decide what to do after the get the answer of the server of the request send. It'only necessary to say 
 * to the HTTPRequest object that function will be in charge of processing the response.
 * To do this, it's necessary to assing to the property onreadystatechange of the object the function or the reference function
 * that it'll use
*/
http_request.onreadystatechange = getAnimeSeriesApi;
/**
 * After specifying what will happen when receiving the response, it is necessary to make the request. 
 * For this, the open() and send() methods of the HTTP request class are used, as shown below:
*/

function getAnimeSeriesApi() {
    /***
     * Below you will see what this function does. 
     * First of all you need to check the status of the request. 
     * If the status has the value 4, it means that the complete response from the server has been received and it is possible to continue processing it.
     * The complete list of values for the readyState property is:
     * 0 (not initialized)
     * 1 (reading)
     * 2 (read)
     * 3 (interactive)
     * 4 (complete)
     * */
    if(http_request.readyState == 4){
        // Now it is necessary to check the status code of the HTTP response.
        if (http_request.status == 200) {
            console.log("Succesful");
            const series = JSON.parse(http_request.responseText);
            // Create a new list to show each JSON
            const tbody_series = document.getElementById("tbody_series");
            tbody_series.innerHTML = "";
            
            for(let serie of series){
                
                const tr = document.createElement("tr");
                
                for(property in serie){
                    const td = document.createElement("td");
                    if(property == "created_at" || property == "updated_at"){
                        continue;
                    }
                    td.textContent = serie[property];
                    tr.appendChild(td);
                }

                tbody_series.appendChild(tr);
            }

        }else{
            console.log("Error in the request");
        }
    }else{
        console.log("The request cannot be resolved...");
    }

}

query_button.addEventListener("click", () => {
    // The method will be always in uppercase and the server support, the second param is the url to do the request,the third param it's to say if the method is asynchronous or no
    http_request.open('GET', 'http://127.0.0.1:3000/api/series', true);
    http_request.send();// Initiates the request. The body argument provides the request body, if any, and is ignored if the request method is GET or HEAD.
});