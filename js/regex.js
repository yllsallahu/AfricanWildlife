function validimiLogIn(){
    let idLF= document.LoginForm.id
    let passwordLF = document.LoginForm.passwordLF
   

    if(idLF.value == ""){
        alert("ID nuk mund te jete e zbrazet!");
        idLF.focus();
        return false;
      }
      if(passLF.value == ""){
        alert("Fjalekalimi nuk mund te jete i zbrazet!");
        passLF.focus();
        return false;
      }
      alert('Mire se vini!')
      return true;
    }

    function validimiSignUp(){

    


    const FirstnameRegex=/^[A-Z]+[a-zA-Z]{3,15}$/
    let FirstnameSF= document.SignUpForm.emri;
    const LastNameRegex=/^[A-Za-z0-9]{3,20}$/
    let LastNameSF = document.SignUpForm.mbiemri;
    const emailRegex= /^[\w.+-]+@[\w.-]+\.[a-zA-Z]{2,}$/
    let emailSF=document.SignUpForm.adress;
    const IDRegex=/^[0-9]{10,10} $/
    let idSF= document.SignUpForm.nrleternjofitimit;
    const passwordRegex= /^[A-Z][A-Za-z0-9@$!%*?&]*[a-z][A-Za-z0-9@$!%*?&]*[0-9][A-Za-z0-9@$!%*?&]*$/
    let passwordSF =document.SignUpForm.passwordi;

   function validimiSignUp(){
      FirstnameSF.focus();
      return false;
    }
    if(!FirstnameRegex.test(FirstnameSF)){
      alert("Emri duhet te permbaje vetem shkronja!");
      FirstnameSF.focus();
      return false;
    } 
    if(!LastNameRegex.test(LastNameSF)){
        alert("Mbiemri duhet te permbaje vetem shkronja!");
        LastNameSF.focus();
        return false;
      }
  
    if(idSF.value.length != 10){
      alert("ID duhet te permbaje 10 karaktere!");
      idSF.focus();
      return false;
    }
    if(emailSF.value == ""){
      alert("Email nuk mund te jete i zbrazet!");
      emailSF.focus();
      return false;
    }
    if(!emailRegex.test(emailSF.value)){
      alert("Ju lutem shtypni nje email adrese valide!");
      emailSF.focus();
      return false;
    }
    if(passwordSF.value == ""){
      alert("Fjalekalimi nuk mund te jete i zbrazet!");
      passwordSF.focus();
   function validimiSignUp(){
    passwordSF.focus();
      return false;
    }
    if(!passwordRegex.test(passwordSF.value)){
      alert("Fjalekalimi duhet te permbaje nje shkronje te vogel, nje numer, dhe shkronja e pare duhet te jete e madhe!");
      passwordSF.focus();
      return false;
    }
    alert("Validimi perfundoi me sukses!");
    return true;
  }
}
  