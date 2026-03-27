//Pjesa e validimit te footerit-ROZAFA

const footerForm=document.querySelector('.footer-djathtas form');
const footerEmail=document.querySelector('.emaili');
const footerMessage=document.getElementById('footer-message');

if(footerForm){
    footerForm.addEventListener('submit',function(event){
        const emailVlera=footerEmail.value.trim();
        const emailRegex=/^[^\s@]+@[^\s@]+\.[^\s@]+$/;

        function showMessage(text, type){
            footerMessage.textContent=text;
            footerMessage.className="status-message "+ type;
            footerMessage.style.display="block";

            footerMessage.style.color=(type === "error") ? "red":"green";
        }

        if(!emailRegex.test(emailVlera)){
            event.preventDefault();
            showMessage("Please write a valid email address (e.g., name@example.com).","error");
            footerEmail.focus();
            return;
        }
        if(emailVlera === ""){
            event.preventDefault();
            showMessage("Please fill in the email field before submitting." , "error");
            footerEmail.focus();
            return;
        }

        showMessage("Processing...","success");
    });
}

//Validimi i login formes-ROZAFA

/*const loginForm=document.getElementById('loginForm');

if(loginForm){
    loginForm.addEventListener('submit', function(e){

        const user=document.getElementById('username');
        const pass=document.getElementById('password');
        const uError=document.getElementById('usernameError');
        const pError=document.getElementById('passwordError');

        const userRegex=/^[^\s@]+@[^\s@]+\.[^\s@]+$/;

        const passRegex=/^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{6,}$/;

        let valid=true;

        if(!userRegex.test(user.value.trim())){
            showMessage("")
            user.style.borderBottom="2px solid red";
            valid=false;
        }else{
            user.style.borderBottom="1px solid #ccc"
        }

        if(!passRegex.test(pass.value.trim())){
            pError.textContent = "Password should be min 6 characters, at least 1 letter and 1 number.";
            pass.style.borderBottom="2px solid red";
            valid=false;
        }else{
            pass.style.borderBottom="1px solid #ccc";
        }

        if(!valid){
            e.preventDefault();
        }
        else{
            const userField=document.getElementById('username');
            localStorage.setItem('user_name',user.value.trim());

            const successMsg=document.getElementById('loginSuccess');
            successMsg.textContent="Login Successful! Redirecting...";
            successMsg.style.display="block";
        }
    });
}
*/

const loginForm = document.getElementById('loginForm');
const errorDisplay = document.getElementById('loginSuccess');

if (loginForm) {
    loginForm.addEventListener('submit', function(event) {
        const emailField = document.getElementById('username');
        const passwordField = document.getElementById('password');
        
        const emailValue = emailField.value.trim();
        const passwordValue = passwordField.value.trim();
        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

        errorDisplay.style.color = "red"; 

        if (emailValue === "" || passwordValue === "") {
            event.preventDefault();
            errorDisplay.textContent = "Please fill in all fields!";
            errorDisplay.style.display = "block";
            return;
        }

        if (!emailRegex.test(emailValue)) {
            event.preventDefault();
            errorDisplay.textContent = "Invalid email format!";
            errorDisplay.style.display = "block";
            return;
        }
    });
}

//Dinamizimi i services-ROZAFA

const sherbimet=[
    {
        titulli: "Classes",
        pershkrimi: "Take part in out Mat Pilates sessions to build core strength and boost mobility.",
        imazhi: "images/premium_photo-1661720873706-b5a2cfcae765.avif"
    },
    {
        titulli: "Reformer Pilates",
        pershkrimi: "Discover the advantages of Reformes Pilates in a group setting, where each workout helps sculpt your muscles and improve balance",
        imazhi: ""
    },
    {
        titulli: "Private Sessions",
        pershkrimi: "Enjoy a fully tailored Pilates experience with our one-on-one sessions.",
        imazhi: ""
    }
];
function shfaqSherbimet(){
    const container= document.querySelector('.cards');
    if(container){
        container.innerHTML="";
        sherbimet.forEach(s=>{
            container.innerHTML +=`
            <div class="card">
                <h3>${s.titulli}</h3>
                <p>${s.pershkrimi}</p>
            </div>`;
        });
    }
}
document.addEventListener('DOMContentLoaded',shfaqSherbimet);



// Validimi i Get In Toush With Us EDA  - 
const myContactForm = document.querySelector('.contact-section form');
const myMessage = document.getElementById('clientMessage');
const mySendBtn = document.querySelector('.btn-contact-form');
const contactStatus = document.getElementById('contact-status');

if (myContactForm) {
    myContactForm.addEventListener('submit', function(e) {
        e.preventDefault(); 

        const text = myMessage.value.trim();

       
        function showStatus(msg, type) {
            contactStatus.textContent = msg;
            contactStatus.className = "status-message " + type;
            contactStatus.style.display = "block";
        }

        if (text === "") {
            showStatus("Please write a message before sending!", "error");
            myMessage.style.borderBottom = "2px solid red";
            return;
        }

        
        mySendBtn.innerText = "Sending...";
        mySendBtn.disabled = true;

        setTimeout(() => {
            showStatus("Thank you! Your message has been sent successfully.", "success");
            myMessage.value = ""; 
            myMessage.style.borderBottom = "1px solid #555";
            mySendBtn.innerText = "Send";
            mySendBtn.disabled = false;
            
            // Mesazhi zhduket pas 4 sekondave
            setTimeout(() => {
                contactStatus.style.display = "none";
            }, 4000);
        }, 1200);
    });
}



// VALIDIMI I CONTACT FORM EDA
const mainContactForm = document.getElementById('contactForm');

if (mainContactForm) {
    mainContactForm.addEventListener('submit', function(e) {
        e.preventDefault(); // Ndalon rifreskimin e faqes

        // Selektimi i fushave
        const fName = document.getElementById('firstName');
        const lName = document.getElementById('lastName');
        const emailInput = document.getElementById('email');
        const messageInput = document.getElementById('message');
        
        // Selektimi i elementeve të gabimit dhe suksesit
        const fNameError = document.getElementById('firstNameError');
        const lNameError = document.getElementById('lastNameError');
        const emailError = document.getElementById('emailError');
        const messageError = document.getElementById('messageError');
        const successMsg = document.getElementById('successMessage');

        // Regex-at për validim profesional
        const nameRegex = /^[A-Z][a-zA-Z\s]{2,20}$/; // Shkronjë e madhe në fillim
        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/; // Format standard emaili

        let isFormValid = true;

        // Reseto mesazhet dhe stilet e vjetra
        [fNameError, lNameError, emailError, messageError].forEach(el => el.textContent = "");
        [fName, lName, emailInput, messageInput].forEach(el => el.style.border = "1px solid #ccc");
        successMsg.textContent = "";

        // 1. Validimi i Emrit
        if (!nameRegex.test(fName.value.trim())) {
            fNameError.textContent = "Start with a capital letter (min 3 chars).";
            fName.style.border = "2px solid red";
            isFormValid = false;
        }

        // 2. Validimi i Mbiemrit
        if (!nameRegex.test(lName.value.trim())) {
            lNameError.textContent = "Start with a capital letter (min 3 chars).";
            lName.style.border = "2px solid red";
            isFormValid = false;
        }

        // 3. Validimi i Email-it
        if (!emailRegex.test(emailInput.value.trim())) {
            emailError.textContent = "Please enter a valid email address.";
            emailInput.style.border = "2px solid red";
            isFormValid = false;
        }

        // 4. Validimi i Mesazhit
        if (messageInput.value.trim() === "") {
            messageError.textContent = "Message is required.";
            messageInput.style.border = "2px solid red";
            isFormValid = false;
        }

        // Shfaqja e suksesit brenda faqes (PA ALERT)
        if (isFormValid) {
            successMsg.textContent = "Thank you! Your message has been sent successfully.";
            successMsg.style.cssText = "color: green; font-weight: bold; margin-bottom: 15px; display: block;";
            
            mainContactForm.reset(); // Pastron të gjitha fushat

            // Mesazhi zhduket pas 5 sekondave për ta mbajtur faqen e pastër
            setTimeout(() => {
                successMsg.textContent = "";
            }, 5000);
        }
    });
}



// Menaxhimi i Rezervimeve EDA
const bookingButtons = document.querySelectorAll('.class button');

bookingButtons.forEach(button => {
    button.addEventListener('click', function() {
        const classCard = this.closest('.class');
        const spotsElement = classCard.querySelector('.class-spots');
        const className = classCard.querySelector('.class-name').textContent;
        
        let currentSpots = parseInt(spotsElement.textContent);

        if (currentSpots > 0) {
            // Zbritja e vendeve
            currentSpots--;
            spotsElement.textContent = `${currentSpots} spots left`;

            // Ndryshimi i gjendjes së butonit
            const originalText = this.textContent;
            this.textContent = "Booked! ✓";
            this.style.backgroundColor = "#244020"; 
            this.disabled = true;

            // Krijimi i mesazhit të suksesit pa ALERT
            const successNote = document.createElement('div');
            successNote.textContent = `Successfully joined ${className}!`;
            successNote.style.cssText = "color: #244020; font-size: 13px; font-weight: bold; margin-top: 10px; text-align: center;";
            classCard.appendChild(successNote);

            // Kthimi në gjendje normale pas 3 sekondave
            setTimeout(() => {
                successNote.remove();
                if (currentSpots > 0) {
                    this.textContent = originalText;
                    this.style.backgroundColor = ""; 
                    this.disabled = false;
                } else {
                    this.textContent = "Full";
                    this.style.backgroundColor = "#ccc";
                    spotsElement.style.color = "red";
                }
            }, 3000);
        }
    });
});

































































































