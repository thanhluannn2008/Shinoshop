// ------------------------------------------CARTERGORY NAV BAR---------------------------------------
const itemsliderbar = document.querySelectorAll(".cartergory-left-li")
itemsliderbar.forEach(function(menu,index){
    menu.addEventListener("click",function(){
        menu.classList.toggle("block")
    })
})
