const message = document.querySelector("#message");
if(window.location.search.match("Duplicate")){
    message.children[0].textContent = "You have already voted / applied";
    message.style.display = 'block';
    message.style["background-color"] = 'pink';
}
else if(window.location.search.match("success")) {
    message.children[0].textContent = "Your application / vote has been registered successfuly";
    message.style.display = 'block';
    message.style["background-color"] = 'green';
}

elections = document.querySelectorAll('.election').forEach((election) => {
    election.querySelector(".vote").addEventListener("click", (event) => {
        window.location.href = `vote.php?electionId=${election.getAttribute('data-id')}`;
    });
    election.querySelector(".apply").addEventListener("click", (event) => {
        window.location.href = `apply.php?electionId=${election.getAttribute('data-id')}`;
    });
});


function hideMessage(){
    message.style.display = "none";
}