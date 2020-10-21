

function setCareerDescription(n) {
    var i;
    var jobs = document.getElementsByClassName("job");
    var btns = document.getElementsByClassName("jobbtn");

    for (i = 0; i < jobs.length; i++) {
        jobs[i].style.display = "none";
        btns[i].style.backgroundColor = "rgb(255 255 255)";
    }
    jobs[n].style.display = "block";
    btns[n].style.backgroundColor = "rgb(7 194 230)";
}