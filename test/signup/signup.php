<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="stylesign.css">
   
</head>
<body>
    <p class="pheader">Signup Now</p>
    <br>
<main>
        <div class="signup">
              <form id="myForm" action="<?php echo $_SERVER['PHP_SELF']?>" method="POST">
                <br><br><br>
                <label for="">Name :</label><br>
                <input type="text" name="name" id="name">
                <div class="error-message" id="nameError"></div>
<br>
                <label for="">Surname :</label><br>
                <input type="text" name="surname" id="surname">
                <div class="error-message" id="surnameError"></div>
<br>
                <label for="">Email :</label><br>
                <input type="text" name="email" id="email">
                <div class="error-message" id="emailError"></div>
<br>
                <label for="">Password :</label><br>
                <input type="password" name="pass" id="password" required>
                <div class="error-message" id="passwordError"></div>
<br>                
                <button id="idsu" name="submit" type="button" onclick="validateFunction()">Submit</button>
                <p style="margin-left: 30px;">Already have an account <a href="../Login/login.php">Log in</a></p>
            </form>
        </div>
        <div class="contetmain">
            <br>
            <br>
            <br>
            <br>
            <p class="conteti1">“</p>
            <p class="conteti">By using African Wildlife, your team saves a lot of time by working on the right content and in a more data-driven way. <br> <span class="autori">Yll Sallahu</span></p>
        </div>
    </main>

    <script>
         let nameRegex = /^[A-Z][a-z]{2,8}$/;
         let surnameRegex = /^[A-Z][a-z]{3,10}$/;
         let emailRegex = /[a-zA-Z.-_]+@+[a-z]+\.+[a-z]{2,3}$/;
         let passwordRegex = /^[A-Z][a-z]{4,8}$/;
    
    function validateFunction(){

        let nameInput = document.getElementById('name');
        let nameError = document.getElementById('nameError');

        let emailInput = document.getElementById('email');
        let emailError = document.getElementById('emailError');
 
        let surnameInput = document.getElementById('surname');
        let surnameError = document.getElementById('surnameError');

        let passwordInput = document.getElementById('password');
        let passwordError = document.getElementById('passwordError');

        nameError.innerText= '';
        surnameError.innerText='';
        emailError.innerText='';
        passwordError.innerText='';
       
        if(!(nameRegex.test(nameInput.value))){
            nameError.innerText='Invalid Name';
            return;
        }

        if(!(surnameRegex.test(surnameInput.value))){
            surnameError.innerText='Invalid Surname';
            return;
        }

        if(!(emailRegex.test(emailInput.value))){
            emailError.innerText='Invalid Email';
             return;
        }
        if(!(passwordRegex.test(passwordInput.value))){
            passwordError.innerText='Invalid Password';
            return;
        }
        alert('Success')
    }
    </script>
  
    
</body>
</html>