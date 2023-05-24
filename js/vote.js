const info =  document.getElementById("info");

document.querySelectorAll("#cards > div").forEach((card) => card.addEventListener("click", function() {
    let data = `candidateId=${card.children[0].value}`;
    let xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            info.style.display = "flex";
            info.innerHTML = this.responseText;
        }
    };
    xhr.open("POST", "getCandidateInfo.php", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.send(data);
}));
