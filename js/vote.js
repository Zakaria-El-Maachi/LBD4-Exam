const info =  document.getElementById("info");
const button = document.getElementById("vote");

document.querySelectorAll("#cards > div").forEach((card) => card.addEventListener("click", function() {
    let data = `set=0&candidateId=${card.getAttribute("data-id")}`;
    let xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            response = this.responseText.split('---');
            info.style.display = "flex";
            info.innerHTML = response[0];
            button.style.display ="block";
            button.setAttribute("data-candidateId", Number(response[1]));
        }
    };
    xhr.open("POST", "getCandidateInfo.php", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.send(data);
}));


button.addEventListener("click", (event) => {
    let currentDate = new Date();
    let formattedDate = currentDate.toISOString().slice(0, 19).replace('T', ' ');
    let data = `set=1&${window.location.search.substring(1)}&vote=${button.getAttribute("data-candidateId")}&SDate=${formattedDate}`;
    let xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            window.location.href = `elections.php?message=${this.responseText}`;
        }
    };
    xhr.open("POST", "getCandidateInfo.php", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.send(data);
});