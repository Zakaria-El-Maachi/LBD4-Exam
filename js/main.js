document.querySelector('[type="submit"]').addEventListener("click", (event) => {
    event.preventDefault();
    email = document.querySelector('[name="email"]').value.toLowerCase();
    if (validate(email)){
        let data = `email=${email}&passwrd=${document.querySelector('[name="passwrd"]').value}`;
        let xhr = new XMLHttpRequest();
        xhr.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                if(this.responseText){
                    window.location.href = "elections.php";
                }
                else{
                    console.log("false");
                }
            }
        };
        xhr.open("POST", "loginHandler.php", true);
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        xhr.send(data);
    }
    else{
        console.log("como");
    }
});

function validate(input){
    if(/^\w+([\.-]?\w+)*@um6p.ma/.test(input)){
        return true;
    }
    return false;
}