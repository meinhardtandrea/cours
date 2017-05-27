function VerifLogin(f){
var testUser_name=new RegExp("^[a-zA-Z0-9]{3,8}$","g");
var testUser_pwd=new RegExp("^[a-zA-Z0-9]{3,8}$","g");

if(!testUser_name.test(f.user_name.value)){
    alert("Erreur de login");
return false;
}
if(!testUser_pwd.test(f.user_pwd.value)){
    alert("Erreur de pwd");
return false;
}

return true;
}