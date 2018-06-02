function startTimer(duration, display) {
    setInterval(function () {

        display.textContent = duration;

        if (--duration < 0) {
            window.location.replace('home.php');
        }
    }, 1000);
}

window.onload = function () {
        display = document.querySelector('#time');
    startTimer(3, display);
};