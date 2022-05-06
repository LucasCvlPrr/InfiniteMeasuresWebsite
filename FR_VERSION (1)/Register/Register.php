<!-- Initialisation -->

<?php
    session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Infinite Measures</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='Register.css'>
    <link rel="icon" type="image/png" href="../img/factorypng.png">
    <script src='Register.js'></script>
</head>
<body>
    
    <!------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------>
    <!-- En-tête de page -->

    <header class="header">

        <nav class="menuNav">

            <img src="../img/logoIM.png" alt="logoIM" class="logoIM">

            <p class="slogan">
                LA NOUVELLE INDUSTRIE ♻️
            </p>

            <select name="language" id="pet-select">
                <option value="EN" selected>EN</option>
                <option value="FR">FR</option>
                <option value="PT">PT</option>
            </select>

            <!------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------>
            <!-- Menu de navigation -->

            <ul class="nav-links">
                <li class="button">
                    <a href="../index.php">
                        Accueil
                    </a>
                    
                </li>

                <li class="button">
                    <a href="../Solution/Solution.php">
                        Solution
                    </a>
                    
                </li>

                <li class="button">
                    <a href="../About/About.php">
                        A propos
                    </a>
                    
                </li>

                <li class="button">
                    <a href="../Contact/Contact.php">
                        Contact
                    </a>
                    
                </li>

                <?php
                
                    if(isset($_SESSION["email"])){
                        echo "<li class='button'><a href='../../Dashboard/Dashboard.php'>Dashboard</a></li>";
                        echo "<li class='button'><a href='../Home/php.scripts/logout.php'>Log out</a></li>";
                    }
                    else{
                        //<img src="../img/connexionLogo.png" alt="connexionLogo" height="50" width="50" class="connexionLogo">
                        echo "<li class='button'><a href='../index.php'>Log in</a></li>";
                    }
                ?>
            </ul>

            <div class="burger">
                <div class="line1"></div>
                <div class="line2"></div>
                <div class="line3"></div>
            </div>
            <script>
                //navbar burger script
                const navSlide = () => {
                    const burger = document.querySelector('.burger');
                    const nav = document.querySelector('.nav-links');
                    const navLinks = document.querySelectorAll('.nav-links li');

                    //Toggle Nav
                    burger.addEventListener('click', () => {
                        nav.classList.toggle('nav-active');
                    });

                    //Animation
                    navLinks.forEach((link, index) => {
                        link.style.animation = `navLinkFade 0.5s ease forwards ${index / 7 + 2}s`;
                    });
                    
                }
                navSlide();
            </script>
        </nav>
    </header>

    <!------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------>
    <!-- Contenu -->
        
    <div class="RegisterFormContainer">
        <div class="RegisterFormTitle">
            <h4>S'inscrire</h4>
        </div>
        

        <form action="php.scripts/register.include.php" method="post">
            <div class="pseudoInput">
                <div class="pseudoLabel">
                    <label for="pseudo">Pseudo</label>
                </div>
                
                <div class="pseudo">
                    <input type="text" name="pseudo" id="pseudo" required size="50px" placeholder="Your pseudo...">
                </div>
            </div>

            <div class="lastNameInput">
                <div class="lastNameLabel">
                    <label for="last_name">Nom</label>
                </div>

                <div class="last_name">
                    <input type="text" name="last_name" id="last_name" required size="50px" placeholder="Your last name...">
                </div>
            </div>
            
            <div class="firstNameInput">
                <div class="firstNameLabel">
                    <label for="first_name">Prénom</label>
                </div>
                
                <div class="first_name">
                    <input type="text" name="first_name" id="first_name" required size="50px" placeholder="Your first name...">
                </div>
            </div>

            <div class="emailInput">
                <div class="emailLabel">
                    <label for="email">Email</label>
                </div>
                
                <div class="email">
                    <input type="text" name="email" id="email" required size="50px" placeholder="Your email...">
                </div>
            </div>

            <div class="passwordInput">
                <div class="passwordLabel">
                    <label for="password">Mot de Passe</label>
                </div>
                
                <div class="password">
                    <input type="password" name="password" id="password" required size="50px" oninput="passwdStrength()" placeholder="Your password...">
                </div>
                
                <div id="strength-bar" style="width: 240px"></div>
            </div>

            <div class="repeatpasswordInput">
                <div class="repeatpasswordLabel">
                    <label for="repeatpassword">Vérification de mot de passe</label>
                </div>
                
                <div class="repeatpassword">
                    <input type="password" name="repeatpassword" id="repeatpassword" required size="50px" placeholder="Your password... Once again!">
                </div>
            </div>

            
            <div class="registerBtn">
                <button type="submit" name="formsend" id="formsend">S'inscrire</button>
            </div>

        </form>
    </div>

    <div class="errorMsg">
        <?php 
            if(isset($_GET["error"])){
                if($_GET["error"] == "emptyinput"){
                    echo "<h1>You missed a blank, fill the other !</h1>";
                }
                else if($_GET["error"] == "invalidpseudo"){
                    echo "<h1>Invalid Pseudo, choose another one!</h1>";
                }
                else if($_GET["error"] == "invalidemail"){
                    echo "<h1>Invalid Email, choose another one!</h1>";
                }
                else if($_GET["error"] == "invalidpasswd"){
                    echo "<h1>Password must be at least 8 characters long, 
                    contain 1 upper case, 1 lower case, 1 number and 1 special character";
                }
                else if($_GET["error"] == "invalidpasswdmatch"){
                    echo "<h1>Passwords don't match, try again!</h1>";
                }
                else if($_GET["error"] == "pseudooremailtaken"){
                    echo "<h1>Pseudo or Email already used...</h1>";
                }
                else if($_GET["error"] == "stmtfailed"){
                    echo "<h1>Something went wrong, try again!</h1>";
                }
                else if($_GET["error"] == "none"){
                    echo "<h1>You have signed up!</h1>";
                }
            }

        ?>
    </div>

    <!------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------>
    <!-- Pied de page -->
    <footer class="footer">
        <ul>
            <li class="link">
                <a href="">
                    Mentions légales
                </a>

            </li>

            <li class="link">
                <a href="../Contact/Contact.html">
                    Contact
                </a>

            </li>

            <li class="link">
                <a href="">
                    Plan du site
                </a>

            </li>
        </ul>

        <div class="poweredByOversight">
            <p class="poweredBy">Par <a href="../About/OversightTeam/OversightTeam.php" class="oversight">Oversight</a></p>
        </div>
    </footer>

    <!------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------>
    
</body>
</html>

<!------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------>
<!------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------>