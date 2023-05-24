const links = document.querySelectorAll("a");
const elections = document.querySelector("#elections");
const create = document.querySelector("#create");
const requests = document.querySelector("#requests");
var shown = elections;

sendRequest(elections, 2, "request=1");

links[0].addEventListener("click", (event) => {
    event.preventDefault();
    sendRequest(elections, 2, "request=1");
});

links[2].addEventListener("click", (event) => {
    event.preventDefault();
    console.log("haha");
    sendRequest(requests, 1, "request=2");
});

links[1].addEventListener("click", (event) => {
    event.preventDefault();
    if(shown != create){
        shown.style.display = "none";
    }
    shown = create;
    create.style.display = "flex";
});


function sendRequest(element, child, data){
    if(shown != element){
        shown.style.display = "none";
    }
    shown = element;
    element.style.display = "flex";
    let xhr = new XMLHttpRequest();
        xhr.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                console.log(this.responseText);
                element.children[child].innerHTML += this.responseText;
            }
        };
        xhr.open("POST", "dashboardHandler.php", true);
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        xhr.send(data);
}

