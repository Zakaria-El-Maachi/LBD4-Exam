const links = document.querySelectorAll("a");
const elections = document.querySelector("#elections");
const create = document.querySelector("#create");
const requests = document.querySelector("#requests");
const message = document.querySelector("#message");
const descr = document.querySelector("#description");
var shown = elections;

if(window.location.search == "?message=createdElection"){
    message.style["background-color"] = "green";
    message.children[0].textContent = "The election has successfully been created";
    message.style["display"] = "block";
} else if(window.location.search == "?message=deletedElection"){
    message.style["background-color"] = "green";
    message.children[0].textContent = "The election has successfully been deleted";
    message.style["display"] = "block";
}
else if(window.location.search == "?message=error"){
    message.style["background-color"] = "pink";
    message.children[0].textContent = "There was an error in the operation";
    message.style["display"] = "block";
}


links[0].addEventListener("click", (event) => {
    event.preventDefault();
    show(elections);
});

links[2].addEventListener("click", (event) => {
    event.preventDefault();
    show(requests);
});

links[1].addEventListener("click", (event) => {
    event.preventDefault();
    show(create);
});


function show(element){
    if(shown != element){
        shown.style.display = "none";
        shown = element;
        element.style.display = "flex";
    }
}

function hideMessage(){
    message.style["display"] = "none";
}

function showDescr(t){
    descr.children[0].innerText = t;
}

document.querySelectorAll(".delete").forEach((btn) => {
    btn.addEventListener("click", (event) => {
        let id = event.target.parentElement.parentElement.getAttribute('data-electionid');
        let xhr = new XMLHttpRequest();
        xhr.onreadystatechange = function(){
            if(this.readyState == 4 && this.status == 200){
                window.location.href = window.location.pathname + "?message="+this.responseText;
            }
        }
        xhr.open("POST", "dashboardHandler.php", true);
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        xhr.send(`request=2&electionId=${id}`);
    });
});

document.querySelectorAll('#elections tr').forEach((line) => {
    line.addEventListener("click", (event) => {
        let id = line.getAttribute('data-electionid');
        let xhr = new XMLHttpRequest();
        xhr.onreadystatechange = function(){
            if(this.readyState == 4 && this.status == 200){
                console.log(this.responseText);
                descr.children[0].textContent = this.responseText;
                descr.style.display = "block";
            }
        }
        xhr.open("POST", "dashboardHandler.php", true);
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        xhr.send(`request=3&electionId=${id}`);
    });
});