let url = 'http://localhost:8000/fetch-data';
let token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
let input = document.querySelector('#pizza-ingredient');
let select = document.querySelector('#select');
let ingredient_select = document.querySelector('#ingredient-select')

window.addEventListener('load', (event) => {
    fetch(url, {
            headers: {
                "Content-Type": "application/json",
                "Accept": "application/json, text-plain, */*",
                "X-Requested-With": "XMLHttpRequest",
                "X-CSRF-TOKEN": token
            },
            method: 'post',
            body: JSON.stringify({
                ingredient_name: event.target.value
            })
        })
        .then(response => response.json())
        .then(data => {
            console.log(data)

            for (let datas of data) {
                if (!data.includes(datas.ingredient_name)) {
                    ingredient_select.innerHTML += `<option value="${datas.id}">${datas.ingredient_name}</option>`
                }
            }
        })
})