let i = window.location.search;

document.querySelector('#candidate').addEventListener("click", (event) => {
    window.location.href = `candidate.php${i}`;
});

document.querySelector('#vote').addEventListener("click", (event) => {
    console.log("lol");
    window.location.href = `vote.php${i}`;
});