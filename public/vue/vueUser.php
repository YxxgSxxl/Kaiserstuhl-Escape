<?php
$title = "Kaiserstuhl - " . strtoupper($_SESSION['username']);

extract($users);
if (isset($reservations)) {
    // var_dump($reservations);
}
?>

<section
    class="flex flex-col min-h-screen pt-8 bg-ks-black bg-[url('img/ks-bg5-sm.png')] lg:bg-[url('img/ks-bg5-lg.png')] xl:bg-[url('img/ks-bg5-xl.png')] bg-contain ">

    <main class="relative bg-ks-black">
        <div class="absolute inset-0 pointer-events-none " aria-hidden="true">
            <canvas data-particle-animation></canvas>
        </div>

        <div class="flex-1 flex flex-col gap-8 text-ks-white">
            <h1 class="text-center text-2xl">
                <?php
                if ($_SESSION['lang'] === 'ENG')
                    echo '<span class="text-ks-orange">' . strtoupper($username) . '\'s</span> PROFILE';
                else
                    echo 'LE PROFIL DE <span class="text-ks-orange">' . strtoupper($username) . '</span>';
                ?>
            </h1>

            <div class="flex flex-col justify-center md:flex-row md:gap-4">
                <div class="items-center flex flex-col gap-4 justify-center mb-4">
                    <img id="profilePic"
                        class="rounded-[50%] w-[200px] md:w-[300px} h-[200px] md:h-[300px} text-center items-center bg-cover border-solid border-4 hover:border-dashed active:animate-ping border-ks-orange cursor-pointer"
                        src="<?= $Conf->MEMBERSFOLDER . $_SESSION['username'] ?>/<?= $avatar ?>"
                        alt="Image de profil de <?= $_SESSION['username'] ?>" onclick="openFileExplorer()">


                    <form id="imageUploadForm" style="display:none;" action="index.php?action=user" method="post"
                        enctype="multipart/form-data">
                        <!-- Ajout d'un input file caché -->
                        <input id="fileInput" type="file" name="newImage" style="display:none;"
                            accept=".png,.jpg,.jpeg">
                        <input class="hidden" id="fileSubmit" type="submit" value="Uploader" style="dislay:none;">
                    </form>

                    <!-- Script du formulaire d'upload d'image -->
                    <script>
                        document.querySelector("#fileInput").addEventListener("change", uploadImage)

                        function openFileExplorer() {
                            // Simuler un clic sur le bouton de sélection de fichier
                            document.getElementById('fileInput').click();
                        }

                        function uploadImage(event) {
                            const input = event.target;
                            // Vérifier si un fichier a été sélectionné
                            if (input.files && input.files[0]) {
                                var reader = new FileReader();

                                reader.onload = function (e) {
                                    // Soumettre le formulaire d'upload d'image
                                    // setInterval(() => {
                                    document.getElementById('fileSubmit').click();
                                    // }, 1000);
                                };

                                // Lire le fichier en tant que Data URL
                                reader.readAsDataURL(input.files[0]);
                                console.log(reader.readAsDataURL(input.files[0]));
                            }
                        }
                    </script>

                    <?php
                    if ($_SESSION['lang'] === 'ENG') {
                        if ($member_role == 'Admin') {
                            echo "<p class='text-ks-orange text-center animate-pulse'>You are an <span class='text-red-500'>Administrator</span></p>";
                        } elseif ($member_role == 'Candidate') {
                            echo "<p class='text-ks-orange text-center animate-pulse'>You are a <span class='text-ks-white'>Candidate</span></p>";
                        } else {
                            echo "<p class='text-ks-orange text-center animate-pulse'>You are a Member</p>";
                        }
                    } else {
                        if ($member_role == 'Admin') {
                            echo "<p class='text-ks-orange text-center animate-pulse'>Vous êtes un <span class='text-red-500'>Administrateur</span></p>";
                        } elseif ($member_role == 'Candidate') {
                            echo "<p class='text-ks-orange text-center animate-pulse'>Vous êtes un <span class='text-ks-white'>Candidat</span></p>";
                        } else {
                            echo "<p class='text-ks-orange text-center animate-pulse'>Vous êtes un Membre</p>";
                        }
                    }
                    ?>

                    <?php
                    if (isset($message)) {
                        echo $message;
                    } else {
                        echo "";

                    }
                    ?>
                </div>

                <div
                    class="bg-ks-white/0 md:bg-transparent text-ks-white flex flex-col gap-4 items-start mx-auto md:mx-0 justify-between rounded-lg p-4 w-[80%] md:w-[30%] md:items-center">
                    <p class='text-lg underline underline-offset-2'>Email:</p><?= $email ?></p>

                    <?php
                    if ($_SESSION['lang'] === 'ENG') {
                        if ($lastname && $firstname) {
                            echo "<p class='text-lg text-center underline underline-offset-2'>lastname/firstname:</p>
                    <p>$lastname $firstname</p>";
                        } elseif ($lastname) {
                            echo "<p class='text-lg text-center underline underline-offset-2'>lastname/firstname:</p>
                    <p>$lastname</p>";
                        } elseif ($firstname) {
                            echo "<p class='text-lg text-center underline underline-offset-2'>lastname/firstname:</p>
                    <p>$firstname</p>";
                        } else {
                            echo "<p class='text-lg text-center underline underline-offset-2'>lastname/firstname:</p>
                    <p>/</p>";
                        }
                    } else {

                        if ($lastname && $firstname) {
                            echo "<p class='text-lg text-center underline underline-offset-2'>nom/prénom:</p>
                    <p>$lastname $firstname</p>";
                        } elseif ($lastname) {
                            echo "<p class='text-lg text-center underline underline-offset-2'>nom/prénom:</p>
                    <p>$lastname</p>";
                        } elseif ($firstname) {
                            echo "<p class='text-lg text-center underline underline-offset-2'>nom/prénom:</p>
                    <p>$firstname</p>";
                        } else {
                            echo "<p class='text-lg text-center underline underline-offset-2'>nom/prénom:</p>
                    <p>/</p>";
                        }
                    }

                    ?>

                    <p class='text-lg underline underline-offset-2'>Age:</p>
                    <?php
                    if ($age) {
                        echo "<p class='text-center'>$age ans</p>";
                    } else {
                        echo "/";
                    }
                    ?>
                    </p>

                    <form class="w-fit items-center mx-auto mb-0" action="index.php?action=userModify" method="post">
                        <button type="submit"
                            class="bg-orange-500 rounded-lg p-2 px-6 font-bold text-sm lg:text-lg h-10 w-full whitespace-nowrap">
                            <?php
                            if ($_SESSION['lang'] === 'ENG')
                                echo "Modify
                            my informations";
                            else
                                echo "Modifier
                            mes informations";
                            ?>
                        </button>
                    </form>

                    <form class="w-fit items-center mx-auto mb-0" action="index.php?action=logout" method="post">
                        <button type="submit" class="bg-ks-orange rounded-lg p-2 px-6 font-bold lg:text-lg h-10 w-full">
                            <?php
                            if ($_SESSION['lang'] === 'ENG')
                                echo "Logout";
                            else
                                echo "Se déconnecter";
                            ?>
                        </button>
                    </form>
                </div>

            </div>

            <hr class="w-[80%] mx-auto">

            <div class="text-center">
                <h2 class="text-lg">
                    <?php
                    if ($_SESSION['lang'] === 'ENG')
                        echo 'Current reservations:';
                    else
                        echo 'Réservations en cours:';
                    ?>
                </h2>
            </div>

            <div class="">
                <?php
                if (!empty($reservations)) {
                    echo "<div class='flex flex-col gap-4 items-center mx-auto'>";
                    foreach ($reservations as $reservation) {
                        extract($reservation);

                        echo "

                    <div class='bg-ks-white/0 md:bg-transparent text-ks-white flex flex-col md:flex-row gap-4 items-start mx-auto md:mx-0 justify-between rounded-lg p-4 w-[80%] md:w-[80%] md:items-center'>
                    <div class='flex flex-col'>
                        <p class='text-lg underline underline-offset-2'>Game:</p>
                        <p>$title</p>
                    </div>
                    <div class='flex flex-col'>
                        <p class='text-lg underline underline-offset-2'>Start:</p>
                        <p>" . format_date($dateStart) . "</p>
                    </div>
                    <div class='flex flex-col'>
                        <p class='text-lg underline underline-offset-2'>Hour:</p>
                        <p>$time</p>
                    </div>
                    <div class='flex flex-col'>
                        <p class='text-lg underline underline-offset-2'>Price:</p>
                        <p>$price €</p>
                    </div>
                    <form class='w-fit items-center mb-0' action='index.php?action=reservationDelete&idRes=$id_reservation' method='post'>
                        <button type='submit' class='bg-red-500 rounded-lg p-2 px-6 font-bold text-sm lg:text-lg h-10 w-full'>";
                        if ($_SESSION['lang'] === 'ENG')
                            echo "Cancel";
                        else
                            echo "Annuler";
                        echo "</button>
                    </form>
                </div>";
                    }
                    echo "</div>";

                } else {
                    echo "<p class='text-center'>Vous n'avez pas de réservations en cours...</p>";
                }
                ?>
            </div>

            <hr class="w-[80%] mx-auto">

            <?php
            if ($_SESSION['lang'] === 'ENG') {
                echo "<a id='confirm' class='cursor-pointer w-fit items-center mx-auto'>
            <form class='w-full mb-8' action='index.php?action=userDelete' method='post'>
                <button type='submit' class='bg-red-500 rounded-lg p-2 px-6 font-bold text-sm lg:text-lg h-10 w-full'>I want to delete my account</button>
            </form>
        </a>

        <!-- Script de confirmation de suppression de compte -->
        <script>
            document.getElementById('confirm').addEventListener('click', function () {
                if (confirm('Do you really want to delete your user?')) {
                    document.getElementById('confirm').submit();
                } else {
                    event.preventDefault();
                }
            });
        </script>";
            } else {
                echo "<a id='confirm' class='cursor-pointer w-fit items-center mx-auto'>
            <form class='w-full mb-8' action='index.php?action=userDelete' method='post'>
                <button type='submit' class='bg-red-500 rounded-lg p-2 px-6 font-bold text-sm lg:text-lg h-10 w-full'>Je
                    souhaite
                    supprimer mon compte</button>
            </form>
        </a>

        <!-- Script de confirmation de suppression de compte -->
        <script>
            document.getElementById('confirm').addEventListener('click', function () {
                if (confirm('Voulez-vous vraiment supprimer votre compte ?')) {
                    document.getElementById('confirm').submit();
                } else {
                    event.preventDefault();
                }
            });
        </script>";
            }
            ?>
        </div>
    </main>
</section>

<script>
    // Particle animation
    class ParticleAnimation {
        constructor(el, { quantity = 30, staticity = 40, ease = 50 } = {}) {
            this.canvas = el;
            if (!this.canvas) return;
            this.canvasContainer = this.canvas.parentElement;
            this.context = this.canvas.getContext('2d');
            this.dpr = window.devicePixelRatio || 1;
            this.settings = {
                quantity: quantity,
                staticity: staticity,
                ease: ease,
            };
            this.circles = [];
            this.mouse = {
                x: 0,
                y: 0,
            };
            this.canvasSize = {
                w: 0,
                h: 0,
            };
            this.onMouseMove = this.onMouseMove.bind(this);
            this.initCanvas = this.initCanvas.bind(this);
            this.resizeCanvas = this.resizeCanvas.bind(this);
            this.drawCircle = this.drawCircle.bind(this);
            this.drawParticles = this.drawParticles.bind(this);
            this.remapValue = this.remapValue.bind(this);
            this.animate = this.animate.bind(this);
            this.init();
        }

        init() {
            this.initCanvas();
            this.animate();
            window.addEventListener('resize', this.initCanvas);
            window.addEventListener('mousemove', this.onMouseMove);
        }

        initCanvas() {
            this.resizeCanvas();
            this.drawParticles();
        }

        onMouseMove(event) {
            const { clientX, clientY } = event;
            const rect = this.canvas.getBoundingClientRect();
            const { w, h } = this.canvasSize;
            const x = clientX - rect.left - (w / 2);
            const y = clientY - rect.top - (h / 2);
            const inside = x < (w / 2) && x > -(w / 2) && y < (h / 2) && y > -(h / 2);
            if (inside) {
                this.mouse.x = x;
                this.mouse.y = y;
            }
        }

        resizeCanvas() {
            this.circles.length = 0;
            this.canvasSize.w = this.canvasContainer.offsetWidth;
            this.canvasSize.h = this.canvasContainer.offsetHeight;
            this.canvas.width = this.canvasSize.w * this.dpr;
            this.canvas.height = this.canvasSize.h * this.dpr;
            this.canvas.style.width = this.canvasSize.w + 'px';
            this.canvas.style.height = this.canvasSize.h + 'px';
            this.context.scale(this.dpr, this.dpr);
        }

        circleParams() {
            const x = Math.floor(Math.random() * this.canvasSize.w);
            const y = Math.floor(Math.random() * this.canvasSize.h);
            const translateX = 0;
            const translateY = 0;
            const size = Math.floor(Math.random() * 2) + 1;
            const alpha = 0;
            const targetAlpha = parseFloat((Math.random() * 0.6 + 0.1).toFixed(1));
            const dx = (Math.random() - 0.5) * 0.2;
            const dy = (Math.random() - 0.5) * 0.2;
            const magnetism = 0.1 + Math.random() * 4;
            return { x, y, translateX, translateY, size, alpha, targetAlpha, dx, dy, magnetism };
        }

        drawCircle(circle, update = false) {
            const { x, y, translateX, translateY, size, alpha } = circle;
            this.context.translate(translateX, translateY);
            this.context.beginPath();
            this.context.arc(x, y, size, 0, 2 * Math.PI);
            this.context.fillStyle = `rgba(255, 255, 255, ${alpha})`;
            this.context.fill();
            this.context.setTransform(this.dpr, 0, 0, this.dpr, 0, 0);
            if (!update) {
                this.circles.push(circle);
            }
        }

        clearContext() {
            this.context.clearRect(0, 0, this.canvasSize.w, this.canvasSize.h);
        }

        drawParticles() {
            this.clearContext();
            const particleCount = this.settings.quantity;
            for (let i = 0; i < particleCount; i++) {
                const circle = this.circleParams();
                this.drawCircle(circle);
            }
        }

        // This function remaps a value from one range to another range
        remapValue(value, start1, end1, start2, end2) {
            const remapped = (value - start1) * (end2 - start2) / (end1 - start1) + start2;
            return remapped > 0 ? remapped : 0;
        }

        animate() {
            this.clearContext();
            this.circles.forEach((circle, i) => {
                // Handle the alpha value
                const edge = [
                    circle.x + circle.translateX - circle.size, // distance from left edge
                    this.canvasSize.w - circle.x - circle.translateX - circle.size, // distance from right edge
                    circle.y + circle.translateY - circle.size, // distance from top edge
                    this.canvasSize.h - circle.y - circle.translateY - circle.size, // distance from bottom edge
                ];
                const closestEdge = edge.reduce((a, b) => Math.min(a, b));
                const remapClosestEdge = this.remapValue(closestEdge, 0, 20, 0, 1).toFixed(2);
                if (remapClosestEdge > 1) {
                    circle.alpha += 0.02;
                    if (circle.alpha > circle.targetAlpha) circle.alpha = circle.targetAlpha;
                } else {
                    circle.alpha = circle.targetAlpha * remapClosestEdge;
                }
                circle.x += circle.dx;
                circle.y += circle.dy;
                circle.translateX += ((this.mouse.x / (this.settings.staticity / circle.magnetism)) - circle.translateX) / this.settings.ease;
                circle.translateY += ((this.mouse.y / (this.settings.staticity / circle.magnetism)) - circle.translateY) / this.settings.ease;
                // circle gets out of the canvas
                if (circle.x < -circle.size || circle.x > this.canvasSize.w + circle.size || circle.y < -circle.size || circle.y > this.canvasSize.h + circle.size) {
                    // remove the circle from the array
                    this.circles.splice(i, 1);
                    // create a new circle
                    const circle = this.circleParams();
                    this.drawCircle(circle);
                    // update the circle position
                } else {
                    this.drawCircle({ ...circle, x: circle.x, y: circle.y, translateX: circle.translateX, translateY: circle.translateY, alpha: circle.alpha }, true);
                }
            });
            window.requestAnimationFrame(this.animate);
        }
    }

    // Init ParticleAnimation
    const canvasElements = document.querySelectorAll('[data-particle-animation]');
    canvasElements.forEach(canvas => {
        const options = {
            quantity: canvas.dataset.particleQuantity,
            staticity: canvas.dataset.particleStaticity,
            ease: canvas.dataset.particleEase,
        };
        new ParticleAnimation(canvas, options);
    });
</script>