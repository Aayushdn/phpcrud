<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style/signup.css">
    <title>Signup</title>
</head>
<body>
    
    <div class="container">
        <div class="right">
            <h1 class="largeTxt">
                Its Free Join Us <br> Today
            </h1>
        </div>
        <div class="left">

        
       <div class="signup--form">
        <h1 class="medTxt">Sign Up</h1>
        <pre class="msg"></pre>
            <form action="../model/signup-help.php" method="POST" id="signupform" enctype="multipart/form-data">
                <div class="form--group">
                    
                    <input type="email" placeholder="email@domain.com" name="email" id="email">
                </div>
                <div class="form--group">
                    <input type="text" placeholder="First name" name="fname" id="fname">
                    <input type="text" placeholder="Last Name" name="lname" id="lname">
                </div>
                <div class="form--group">
                    
                    <input type="text" placeholder="@username" name="username" id="uname">
                </div>
                <div class="form--group">
                    
                    <input type="password" placeholder="password" name="password" id="password">
                </div>
                <div class="form--group">
                    <label for="image">
                        + Image</label>
                    <input type="file" name="pp" id="image" placeholder="Your image">
                    
                </div>
                
                <div class="form--group flex--column">
                    <textarea name="bio" id="bio" placeholder="Describe yourself in 200 characters"></textarea>
                    <p class="counter"></p>
                </div>
                <div class="form--group">
                    <button class="btn" name="send" onclick ="validateForm()" type="button">Sign In</button>
                    <a href="./login.php">Already have an acount. Sign in</a>
                </div>
                <input type="submit" name="signup" style="visibility:hidden;">
                
            </form>
       </div>
        </div>
    </div>

    
</body>
    <script>
        const signupForm = document.querySelector("#signupform");
        const msgBox = document.querySelector(".msg");
        const bio = document.querySelector("#bio")
        const counter = document.querySelector(".counter");
        function displayMessage(msg,color){
            msgBox.textContent = "";
            msgBox.textContent = msg;
            msgBox.style.color = color;
        }

        function countCharacter(){
            let num = bio.value.length;
            counter.textContent = `${num} / 200`;
            if (num > 200) {
                counter.color = "red";
            }
            
        }

        function validateForm(e){
            // get form data 
            const formData = new FormData(signupForm);
            let email = formData.get("email");
            let uname = formData.get("username");
            let fname = formData.get("fname");
            let lname = formData.get("lname");
            let paswd = formData.get("password");
            let bio = formData.get("bio")

            // check form data 
            if (!email || !uname || !fname || !lname || !paswd ){
               displayMessage("Fill up the form properly","red");
               return;
            }

            if (password.length < 9) {
                displayMessage("Match the Password length Minimum 9 letter","red");
                return;
            }

            

            if (bio.length > 50){
                displayMessage("Too long bio edit it to continue","red");
                return;
            }

            signupForm.submit();

        }

        bio.addEventListener("input",countCharacter)


    </script>
</html>