<?php
    session_start();
    if(!isset($_SESSION['userId'])){header("location: ./login.php");}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- <script
      src="https://kit.fontawesome.com/2e09e16fdb.js"
      crossorigin="anonymous"
    ></script> -->
    <link rel="stylesheet" href="../style/dashboard.css">
    <title>🚀👩‍🚀 Explore Aayush</title>
  </head>
  <body>
    <header class="head">
      <div class="head__logo">
        <p class="midTxt"><?php echo $_SESSION['userRow']['fname']. " ".$_SESSION['userRow']['lname'] ?></p>
      </div>
      <nav class="navBar">
        <ul class="navLinks midTxt">
          <li class="navLink">Home</li>
          <li class="navLink">Tasks</li>
          <li class="navLink" id="logout">Logout</li>
        </ul>
      </nav>
    </header>

    <main>
      <!--
        -------------------------------Section 1-----------------------------
      -->
      <section class="topSection">
        <div class="profile">
          <div class="imageFrame">
            <img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($_SESSION['userRow']['image']); ?>" /> 
          </div>
          <div class="codeBlock">
            <p class="codeTxt name">~/> Mr. <?php echo $_SESSION['userRow']['fname']?></p>
          </div>
          <div class="scrollAnimation">
            <span class="scrollIcon"> </span>
          </div>
        </div>
        <div class="infoCard card">
          <div class="topCard">
            <p class="highlightTxt">#Learning to code</p>
          </div>
          <form method="POST" action="../model/edit.php">
          <div class="bodyCard">
            <h1 class="titleTxt">Hey I'm <?php echo $_SESSION['userRow']['fname'] ?></h1>
            <p class="contentTxt" id="bio" >
              <?php echo $_SESSION['userRow']['bio']; ?> <br />
            </p>
            <input type="hidden" name="editedBio" id="editedBio">

            <p class="contentTxt" style="visibility: hidden;">
              For further inquiry You can contact me
            </p>
          </div>
          <div class="ctaCard">
            <button class="btn ctaBtn--primary" id="changeBio" type="button">
              <span class="btnText">Change Bio</span>
              <span class="btnIcon">
                <svg
                  xmlns="http://www.w3.org/2000/svg"
                  viewBox="0 0 90.94 147.14"
                  class="rightIcon"
                >
                  <defs>
                    <style>
                      .cls-1,
                      .cls-2 {
                        fill: none;
                        stroke-miterlimit: 10;
                      }

                      .cls-1 {
                        stroke: #1d1d1b;
                      }

                      .cls-2 {
                        stroke: #001d39;
                        stroke-width: 14px;
                      }
                    </style>
                  </defs>
                  <g id="Layer_2" data-name="Layer 2">
                    <g id="Layer_1-2" data-name="Layer 1">
                      <line
                        class="cls-1"
                        x1="90.44"
                        y1="105.61"
                        x2="90.44"
                        y2="104.53"
                      />
                      <polyline
                        class="cls-2"
                        points="5.68 143.05 55.68 73.57 5.68 4.09"
                      />
                    </g>
                  </g>
                </svg>
              </span>
            </button>
            <button class="btn ctaBtn--primary hidden" id="confirmChange">
              <span class="btnText" >Confirm Change</span>
            </button>
            <button class="btn ctaBtn--secondary" type="button">
              <span class="btnText highlightTxt" id="deleteAc">Delete Account</span>
            </button>
          </div>
          </form>
        </div>
      </section>

      <div class="overlay hidden">
        
      </div>

      <div class="modal hidden">
        <div class="box">
          <h1 class="modalHeading">Are your Sure</h1>
          <div class="modalContent">Do you want to delete this Account</div>
          <div class="modalEnd">
            <button class="btn ctaBtn--primary" id="confirmDelete">Yes</button>
            <button class="btn" id="noDelete">NO</button>
          </div>
        </div>
      </div>
    </main>
  </body>
  <script>
    const logout = document.querySelector("#logout");
    const logoutModal = document.querySelector(".modal");
    const overlay = document.querySelector(".overlay");
    const editBioBtn = document.querySelector("#changeBio");
    const confirmChange = document.querySelector("#confirmChange")
    const bioBox = document.querySelector("#bio");
    const bioInput = document.querySelector("#editedBio")
    const deleteAc = document.querySelector("#deleteAc");
    const container = document.querySelector("main");

    function showModal(){
      logoutModal.classList.remove("hidden");
      overlay.classList.remove("hidden");
    }

    function hideModal(){
      ogoutModal.classList.remove("hidden");
      overlay.classList.remove("hidden");
    }

    logout.addEventListener("click" ,function(){
      location.href = "../model/logout.php";
    })

    editBioBtn.addEventListener("click",()=>{
      bioBox.setAttribute("contenteditable","true");
      editBioBtn.classList.toggle("hidden");
      confirmChange.classList.toggle("hidden");
      bioBox.focus();
      bioInput.value = bioBox.textContent;
    });

    bioBox.addEventListener("input",()=>{
      bioInput.value = bioBox.textContent;
    })

    document.querySelector("#confirmDelete").addEventListener("click",function(){
      <?php $_SESSION['confirmDelete'] = 1; ?>
      location.href = "../model/delete.php"
    })
    document.querySelector("#noDelete").addEventListener("click",function(){
      hideModal();
    })


    deleteAc.addEventListener("click",function(){
      showModal();
    })




  </script>
</html>
