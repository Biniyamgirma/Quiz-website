const signUpButton=document.getElementById('dontHaveAccount')
const signInButton=document.getElementById('haveAccount')
const forgetPassword=document.getElementById('forgetPassword')
const forgetPasswordButton = document.getElementById('forget_password')
const signInForm=document.getElementById('signIn')
const signUpForm=document.getElementById('Register')

forgetPasswordButton.addEventListener('click',function(){
    signInForm.style.display="none";
    signUpForm.style.display="none"; 
    forgetPassword.style.display="block";   
} )
signUpButton.addEventListener('click',function(){
    signInForm.style.display="none";
    forgetPassword.style.display="none"; 
    signUpForm.style.display="block";
})
signInButton.addEventListener('click',function(){
    signInForm.style.display="block";
    signUpForm.style.display="none"; 
    forgetPassword.style.display="none";   
})