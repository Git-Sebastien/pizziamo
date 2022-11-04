let url = 'http://localhost:8000/pizzas';
let token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
let pizzaList = document.querySelectorAll('.pizza-tomate ul li')

window.addEventListener('load', (event) => {
    fetch(url, {
            headers: {
                "Content-Type": "application/json",
                "Accept": "application/json, text-plain, */*",
                "X-Requested-With": "XMLHttpRequest",
                "X-CSRF-TOKEN": token
            },
        }).then(response => response.json())
        .then(data => {
            let array = [];
            console.log(data)
                // for (let [index, value] of data.entries()) {
                //     console.log(value)
                // }
        })
})