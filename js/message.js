const show1=document.getElementById('hidden-1')
const show2=document.getElementById('hidden-2')
const show3=document.getElementById('hidden-3')
const show4=document.getElementById('hidden-4')


function displayInfo1(){ 
    show1.style.display="block";  
    show2.style.display="none";
    show3.style.display="none";
    show4.style.display="none";
} 

function displayInfo2(){ 
    show1.style.display="none";  
    show2.style.display="block";
    show3.style.display="none";
    show4.style.display="none";
} 
function displayInfo3(){ 
    show1.style.display="none";  
    show2.style.display="none";
    show3.style.display="block";
    show4.style.display="none";
} 
function displayInfo4(){ 
    show1.style.display="none";  
    show2.style.display="none";
    show3.style.display="none";
    show4.style.display="block";
} 
function hideAllInfo(){ 
    show1.style.display="none";  
    show2.style.display="none";
    show3.style.display="none";
    show4.style.display="none";
} 