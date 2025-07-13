const $ = selector => document.querySelector(selector);
const $$ = selector => document.querySelectorAll(selector); // Optional: for multiple elements

const countdown = function(_config) {
    const targetElem = $(_config.target);
    if (!targetElem) {
        console.error('Invalid countdown target:', _config.target);
        return;
    }

    const tarDateStr = targetElem.getAttribute('data-date');
    const tarTimeStr = targetElem.getAttribute('data-time') || "00:00";

    if (!tarDateStr || !/^\d{2}-\d{2}-\d{4}$/.test(tarDateStr)) {
        console.error('Invalid or missing data-date format. Expected: dd-mm-yyyy');
        return;
    }

    const [day, month, year] = tarDateStr.split('-').map(num => parseInt(num));
    const [tarhour, tarmin] = tarTimeStr.split(':').map(num => parseInt(num));

    const countDownDate = new Date(year, month - 1, day, tarhour, tarmin, 0, 0).getTime();

    $(`${_config.target} .day .word`).innerHTML = _config.dayWord;
    $(`${_config.target} .hour .word`).innerHTML = _config.hourWord;
    $(`${_config.target} .min .word`).innerHTML = _config.minWord;
    $(`${_config.target} .sec .word`).innerHTML = _config.secWord;

    const updateTime = () => {
        const now = new Date().getTime();
        const distance = countDownDate - now;

        if (distance < 0) {
            const expiredElem = $(_config.target);
            if (expiredElem) {
                expiredElem.innerHTML = "EXPIRED";
            }
            return;
        }

        const days = Math.floor(distance / (1000 * 60 * 60 * 24));
        const hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        const minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
        const seconds = Math.floor((distance % (1000 * 60)) / 1000);

        $(`${_config.target} .day .num`).innerHTML = addZero(days);
        $(`${_config.target} .hour .num`).innerHTML = addZero(hours);
        $(`${_config.target} .min .num`).innerHTML = addZero(minutes);
        $(`${_config.target} .sec .num`).innerHTML = addZero(seconds);

        requestAnimationFrame(updateTime);
    };

    updateTime();
};

const addZero = x => (x < 10 && x >= 0) ? "0" + x : x;
