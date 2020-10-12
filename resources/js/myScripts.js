const { default: Axios } = require("axios");

function openClose(type, id) {
    // console.log("show Hide");
    const $container = document.getElementById(`${type}-${id}`);
    $container.classList.toggle("hidden");
}

function test() {
    console.log("test");
}

async function sendDelete(resource, id) {
    const response = fetch(`${resource}/${id}`)
        .then(doc => console.log(doc))
        .catch(err => console.error(err));
}
