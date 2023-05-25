elections = document.querySelectorAll('.election').forEach((election) => {
    election.querySelector(".vote").addEventListener("click", (event) => {
        window.location.href = `vote.php?electionId=${election.getAttribute('data-id')}`;
    });
    election.querySelector(".apply").addEventListener("click", (event) => {
        window.location.href = `apply.php?electionId=${election.getAttribute('data-id')}`;
    });
});