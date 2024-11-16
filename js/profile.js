const profilPic=document.getElementById('profilePicture')
const profilPicMenu=document.getElementById('profilePictureMenu')
const hide=document.getElementById('hideButton')
profilPic.addEventListener('click',function(){
    profilPicMenu.style.display="block";
})
hide.addEventListener('click',function(){
    profilPicMenu.style.display="none";
})