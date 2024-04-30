<?php
$title = "Kaiserstuhl - Connection";
?>

<section id="login-form" class="h-[100vh] bg-cover bg-no-repeat flex flex-col justify-center items-center p-4"
    style="background-image: url('img/ks-bg2.jpg');">

    <a href="index.php" class="absolute left-5 lg:left-10 top-24 z-10"><svg xmlns="http://www.w3.org/2000/svg"
            width="46" height="46" viewBox="0 0 24 24" fill="none" stroke="#FFFF" stroke-width="1"
            stroke-linecap="round" stroke-linejoin="round">
            <path d="M19 12H6M12 5l-7 7 7 7" />
        </svg></a>

    <form action="index.php?action=logMember" method="post"
        class="flex flex-col gap-form-gap bg-black/30 text-ks-white p-6 rounded-lg w-full backdrop-blur-xl sm:w-[28rem]">
        <h1 class="text-ks-white text-4xl text-center mb-4">
            <?php if ($_SESSION['lang'] === 'ENG')
                echo 'Log in';
            else
                echo 'Connexion';
            ?>
        </h1>
        <div class="ks-label">
            <label class="lg:text-lg font-normal" for="username">
                <?php if ($_SESSION['lang'] === 'ENG')
                    echo "username<span class='text-ks-orange'>*</span> :</label>
                    <input type='text' name='username' placeholder='Enter your username here...'
                        class='h-10 px-4 py-1 rounded-lg md:w-[400px] font-light'>";
                else
                    echo "Nom d'<span class='text-ks-orange'>utilisateur</span>* :</label>
                    <input type='text' name='username' placeholder='Entrez vos infortmations ici...'
                        class='h-10 px-4 py-1 rounded-lg md:w-[400px] font-light'>";
                ?>
        </div>
        <div class="ks-label">
            <label class="lg:text-lg font-normal" for="mdp">
                <?php if ($_SESSION['lang'] === 'ENG')
                    echo 'password<span class="text-ks-orange">*</span> :</label>
                    <input type="password" name="mdp" placeholder="Enter your password here..."
                        class="h-10 px-4 py-1 rounded-lg md:w-[400px] font-light">';
                else
                    echo 'Mot de <span class="text-ks-orange">passe</span>* :</label>
                    <input type="password" name="mdp" placeholder="Entrez votre mot de passe ici..."
                        class="h-10 px-4 py-1 rounded-lg md:w-[400px] font-light">';
                ?>
        </div>
        <a href=""><small class="text-ks-orange font-thin underline lg:text-sm">
                <?php if ($_SESSION['lang'] === 'ENG')
                    echo 'Forgot password?';
                else
                    echo 'Mot de passe oublié ?';
                ?>
            </small></a>
        <button type="submit" class="bg-ks-orange rounded-lg p-2 font-bold lg:text-lg h-10">
            <?php if ($_SESSION['lang'] === 'ENG')
                echo 'Sign in';
            else
                echo 'Se Connecter';
            ?>
        </button>
        <?php if ($_SESSION['lang'] === 'ENG')
            echo '<hr class="hr-text" data-content="or">';
        else
            echo '<hr class="hr-text" data-content="ou bien">';
        ?>

        <!-- Bouton de connexion avec les RS -->
        <?php require 'components/socials.php'; ?>

        <p class="text-white/60 text-center text-sm"><?php if ($_SESSION['lang'] === 'ENG')
            echo 'Not a client yet? <a href="index.php?action=register#register-form" class="underline hover:text-white/80">Sign In</a>
            </p>';
        else
            echo 'Pas encore client ? <a href="index.php?action=register#register-form" class="underline hover:text-white/80">S\'inscrire</a>
            </p>';
        ?>
            <?php
            if (isset($message)) {
                echo $message;
            } else {
                echo "";
            }
            ?>
</section>