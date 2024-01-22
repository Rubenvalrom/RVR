let password = document.getElementById('password');
let viewPassword = document.getElementById('ver-contraseña');
let click = false;

viewPassword.addEventListener('click', (e)=>{
if(!click){
    password.type = 'text'
    click = true
}else if(click){
    password.type = 'password'
    click = false
}
});
