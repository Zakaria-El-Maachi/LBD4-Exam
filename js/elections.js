elections = document.querySelectorAll('tr');

for(let i = 1; i < elections.length; i++) {
    elections[i].addEventListener("click", (event) => {
        window.location.href = `election.php?electionId=${i}`;
    });
}