
const alltags = document.querySelectorAll('.text-white')


const btn_menu = document.getElementById('btn-menu')
const menu_hamburger = document.getElementById('menu-hamburger')






btn_menu.addEventListener('click', function () {

    menu_hamburger.classList.toggle('hidden')

})


function changeColor(search, replace) {

    let search_classe = search
    let replace_classe = replace

    let elements = document.querySelectorAll('.' + search_classe)


    elements.forEach(function (element) {

        element.classList.remove(search_classe)
        element.classList.add(replace_classe)

    })



}


// changeColor('text-white','text-gray-800')
// changeColor('bg-teal-800','bg-gray-100')
// changeColor('bg-gray-800','bg-gray-100')

