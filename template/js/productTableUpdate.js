function inchangeVes(id) {
    let ves = document.getElementById('ves' + id).childNodes[1];
    let kol = document.getElementById('kol' + id).childNodes[1];
    console.log(ves);
    if (ves.value > 0 && kol.value < 1) {
        kol.value = 1
    }
    if (ves.value == 0 && kol.value > 0) {
        kol.value = 0;
    }
    setResult(setPrice(id));
    setProduct(id, ves.value, kol.value);
}

function inchangeKol(id) {
    let ves = document.getElementById('ves' + id).childNodes[1];
    let kol = document.getElementById('kol' + id).childNodes[1];

    if (kol.value > 0 && ves.value <= 0) {
        ves.value = 1
    }
    if (kol.value == 0 && ves.value > 0) {
        ves.value = 0;
    }
    setResult(setPrice(id));
    setProduct(id, ves.value, kol.value);
}

function setPrice(id) {
    let ves = document.getElementById('ves' + id).childNodes[1].value;
    let kol = document.getElementById('kol' + id).childNodes[1].value;
    let prise = document.getElementById('prise' + id).innerText;
    let sum = document.getElementById('sum' + id);
    let result = ves * kol * prise;
    let delta = result - sum.innerHTML;
    sum.innerHTML = result;
    return delta;
}

function setProduct(id, ves, kol) {
    var xhr = new XMLHttpRequest();

    xhr.open("GET", '/cart/setAjax/' + id + '-' + ves + '-' + kol);

    xhr.onload = function () {
        document.getElementById('cart-count').innerHTML = xhr.responseText;
    };
    xhr.send();
}

function setResult(delta) {
    let res = document.getElementById('result');
    if (res)
        res.innerHTML = parseFloat(res.innerHTML) + parseFloat(delta);
}