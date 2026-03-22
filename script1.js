//Pjesa e validimit te footerit-ROZAFA

const footerButton=document.querySelector('.footer-djathtas .submit');
const footerEmail=document.querySelector('.emaili');
const footerMessage=document.getElementById('footer-message');

if(footerButton){
    footerButton.addEventListener('click',function(){
        const emailVlera=footerEmail.value.trim();
        const emailRegex=/^[^\s@]+@[^\s@]+\.[^\s@]+$/;

        function showMessage(text, type){
            footerMessage.textContent=text;
            footerMessage.className="status-message "+ type;
            footerMessage.style.display="block";
        }

        if(emailVlera===""){
            showMessage("Please fill in the email field before submitting.","error");
            footerEmail.focus();
            return;
        }

        if(emailRegex.test(emailVlera)){
            showMessage("Thank you for registering for our Newsletter!","success");
            footerEmail.value="";
        }else{
            showMessage("Please write a valid email address (e.g., name@example.com).","error");
        }
    });
}

//Validimi i login formes-ROZAFA

const loginForm=document.getElementById('loginForm');

if(loginForm){
    loginForm.addEventListener('submit', function(e){
        e.preventDefault();

        const user=document.getElementById('username');
        const pass=document.getElementById('password');
        const uError=document.getElementById('usernameError');
        const pError=document.getElementById('passwordError');

        const userRegex=/^[a-zA-Z0-9]{3,15}$/;

        const passRegex=/^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{6,}$/;

        let valid=true;

        if(!userRegex.test(user.value.trim())){
            uError.textContent="Username should be 3-15 characters, no symbols.";
            user.style.borderBottom="2px solid red";
            valid=false;
        }else{
            uError.textContent="";
            user.style.borderBottom="1px solid #ccc"
        }

        if(!passRegex.test(pass.value.trim())){
            pError.textContent="Password should be min 6 characters, at least 1 letter and 1 number.";
            pass.style.borderBottom="2px solid red";
            valid=false;
        }else{
            pError.textContent="";
            pass.style.borderBottom="1px solid #ccc";
        }

        if(valid){
            const successMsg=document.getElementById('loginSuccess');

            successMsg.textContent="Login Successful! Redirecting...";
            successMsg.style.display="block";

            setTimeout(()=>{
                window.location.href="booking.html";
            },1000);
        }
    });
}