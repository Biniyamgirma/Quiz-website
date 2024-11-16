
const hide=document.getElementById('hello')
const Button=document.getElementById('addNewUser')
const ButtonX=document.getElementById('click-hide')

Button.addEventListener('click',function(e){ 
    e.preventDefault();
    hide.style.display="block";   
} )
ButtonX.addEventListener('click',hideTheContent(e) )

function hideTheContent(e){
    e.preventDefault();
    hide.style.display="none"; 
}
