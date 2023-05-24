let i = window.location.search;

document.querySelector('#apply').addEventListener("click", (event) => {
    window.location.href = `apply.php${i}`;
});

document.querySelector('#vote').addEventListener("click", (event) => {
    console.log("lol");
    window.location.href = `vote.php${i}`;
});