document.querySelectorAll('tr').forEach((line) => {
    line.addEventListener("click", (event) => {
        window.location.href = `election.php?election=${line.children[0].innerText}`;
    });
});