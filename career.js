

function setCareerDescription(n) {
    var i;
    var jobs = document.getElementsByClassName("job");
    for (i = 0; i < jobs.length; i++) {
        jobs[i].style.display = "none";
    }
    jobs[slideIndex-1].style.display = "block";
}