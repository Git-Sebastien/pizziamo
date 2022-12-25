// let url = 'http://localhost:8000/pizzas';
// let token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
// let pizzaList = document.querySelectorAll('.pizza-tomate ul li')
// let ingredientSearch = document.querySelector('#ingredient-search')
// let ingredientSelect = document.querySelector('#ingredient-select')
// let ingredientValue = document.querySelectorAll('#ingredient-select > option')
// let choosen = document.querySelector('#choosen')
// let btnIngredient = document.querySelector('#btn-ingredient')
// let array = []

// ingredientSearch.addEventListener('keyup', () => {



//     fetch(url, {
//             headers: {
//                 "Content-Type": "application/json",
//                 "Accept": "application/json, text-plain, */*",
//                 "X-Requested-With": "XMLHttpRequest",
//                 "X-CSRF-TOKEN": token
//             },
//             method: 'post',
//             body: JSON.stringify({
//                 ingredient: ingredientSearch.value
//             })
//         }).then(response => response.json())
//         .then(data => {
//             data.forEach(element => {
//                 if (element.ingredient_name)
//                     ingredientSelect.innerHTML += `
//                     <option data-id="${element.id}" id="option">${element.ingredient_name}</option>`
//                 console.log(ingredientValue)
//             });
//             let option = document.querySelectorAll('#option')
//             console.log(option)

//             ingredientSelect.addEventListener('change', (event) => {
//                 console.log(ingredientValue)
//                 if (!ingredientSelect.value == '' && !array.includes(ingredientSelect.value)) {
//                     array.push(event.target.value)

//                 }
//                 // console.log(array.length - 1)
//                 array.forEach(elementValue => {
//                     option.forEach(elementText => {
//                         console.log(elementText.value)
//                         if (event.target.value == elementText.value) {
//                             choosen.innerHTML += event.target.value
//                             array.pop()
//                         }
//                     });
//                 })
//             })
//         })
// })