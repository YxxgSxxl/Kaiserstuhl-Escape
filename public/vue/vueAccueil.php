<?php
$title = "Kaiserstuhl Outdoor";
$message = "";

if (!empty($succes)) {
    echo $succes;
}
?>

<body class="overflow-x-hidden bg-ks-black">
    <section class="h-[60vh] md:h-[100vh] bg-cover bg-no-repeat" style="background-image: url('img/ks-bg1.png');">
        <?= require_once "components/animatedTitle.php" ?>

        <div class="absolute top-3/4 md:top-[100%]] left-1/2 transform -translate-x-1/2 ">
            <div
                class="mouse w-[30px] h-[50px] md:w-[65px] md:h-[100px] border-4 border-solid border-white rounded-full">
            </div>
        </div>
    </section>

    <main class="relative bg-ks-black">
        <div class="absolute inset-0 pointer-events-none " aria-hidden="true">
            <canvas data-particle-animation></canvas>
        </div>

        <section class="h-[60vh] md:h-[80vh] md:flex justify-between items-center bg-ks-black px-[15%] pb-10">

            <div class="flex flex-col md:w-[40vw] text-ks-white">
                <p data-aos="fade-up">Mulhouse</p>
                <h2 data-aos="fade-up" class="text-4xl md:text-4xl lg:text-6xl text-ks-orange">We-Escape</h2>
                <p data-aos="fade-up" class="md:text-base lg:text-2xl mb-4">Lorem ipsum dolor sit amet consectetur,
                    adipisicing
                    elit.
                    Corporis quod
                    molestias magnam nemo,
                    hic
                    ratione fugit veritatis ea possimus nihil ut repellendus consequuntur veniam deserunt? Consequuntur
                    tempora sed quaerat error.
                </p>

                <div data-aos="fade-up" class="buttons flex gap-4 mt-2">
                    <a style="--clr: #000000" class="button text-base md:text-lg" href="index.php?action=games">
                        <span class="button__icon-wrapper">
                            <svg width="10" class="button__icon-svg" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 14 15">
                                <path fill="currentColor"
                                    d="M13.376 11.552l-.264-10.44-10.44-.24.024 2.28 6.96-.048L.2 12.56l1.488 1.488 9.432-9.432-.048 6.912 2.304.024z">
                                </path>
                            </svg>
                            <svg class="button__icon-svg  button__icon-svg--copy" xmlns="http://www.w3.org/2000/svg"
                                width="10" fill="none" viewBox="0 0 14 15">
                                <path fill="currentColor"
                                    d="M13.376 11.552l-.264-10.44-10.44-.24.024 2.28 6.96-.048L.2 12.56l1.488 1.488 9.432-9.432-.048 6.912 2.304.024z">
                                </path>
                            </svg>
                        </span>
                        <?php if ($_SESSION['lang'] === 'ENG')
                            echo 'discover our game';
                        else
                            echo "découvrir nos jeux";
                        ?>
                    </a>
                </div>
            </div>

            <img data-aos="fade-left" class="max-w-[100%] w-[30%] hidden md:inline" src="img/icons/Loupe.svg"
                alt="Loupe">
        </section>


        <section
            class="h-[140vh] md:w-[120vh] mx-auto bg-ks-black flex flex-col items-center justify-center gap-[4rem]">
            <p fade-up class="text-center text-3xl md:text-4xl w-[80%] text-ks-white">
                <?php if ($_SESSION['lang'] === 'ENG')
                    echo "THE PERFECT <strong>TEAM </strong><span class='text-ks-orange'>EVENT </span> WITH
                    <strong>100% </strong><span class='text-ks-orange'>PLEASURE</span> FOR THE
                    <strong>ENTREPRISES</strong>, THE <strong>ASSOCIATIONS</strong>, THE <strong>FAMILY</strong> AND
                    <strong>FRIENDS.</strong>";
                else
                    echo "L'<strong>ÉVÉNEMENT </strong>D'<span class='text-ks-orange'>ÉQUIPE </span><strong>PARFAIT</strong> AVEC
                    <strong>100% </strong>DE <span class='text-ks-orange'>PLAISIR</span> <strong>GARANTI</strong> POUR LES
                    <strong>ENTREPRISES</strong>, LES <strong>ASSOCIATIONS</strong>, LA <strong>FAMILLE</strong> ET LES
                    <strong>AMIS.</strong>";
                ?>

            </p>
            <div data-aos="fade-up" class="leaderboard">
                <div class=" flex justify-center item-center">
                    <h4 class="text-base md:text-4xl font-light md:font-semibold">
                        <?php if ($_SESSION['lang'] === 'ENG')
                            echo 'Most Active Players';
                        else
                            echo "Les Joueurs les Plus Actifs";
                        ?>
                    </h4>
                </div>
                <ol class="w-[80%] md:w-[100%] mx-auto">
                    <li><mark>Jerry Wood</mark><small>315</small></li>
                    <li><mark>Brandon Barnes</mark><small>301</small></li>
                    <li><mark>Raymond Knight</mark><small>292</small></li>
                    <li><mark>Trevor McCormick</mark><small>245</small></li>
                    <li><mark>Andrew Fox</mark><small>203</small></li>
                </ol>
            </div>
        </section>

        <section id="about"
            class="h-[80vh] bg-ks-black bg-cover bg-no-repeat flex flex-col gap-10 items-center justify-center"
            style="background-image: url('img/teamevent-2.jpg');">
            <h2 class="text-center text-ks-white text-2xl md:text-4xl"><?php if ($_SESSION['lang'] === 'ENG')
                echo 'Wo are we?';
            else
                echo "Qui sommes-nous ?";
            ?></h2>
            <div
                class="h-[60vh] p-4 flex flex-col w-[80%] gap-form-gap backdrop-blur-xl bg-black/30 text-ks-white rounded-xl max-w-md mx-auto justify-center items-center px-[10%] md:px-[30%]">
                <div class="flex gap-8 ">
                    <a href="https://www.facebook.com/kaiserstuhlescape/" target="_blank">
                        <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" viewBox="0 0 24 24"
                            fill="#ffffff">
                            <path
                                d="M22.5 0c.83 0 1.5.67 1.5 1.5v21c0 .83-.67 1.5-1.5 1.5h-6v-9h3l.75-3.75H16.5v-1.5c0-1.5.75-2.25 2.25-2.25h1.5V3.75h-3c-2.76 0-4.5 2.16-4.5 5.25v2.25h-3V15h3v9H1.5A1.5 1.5 0 0 1 0 22.5v-21C0 .67.67 0 1.5 0h21z" />
                        </svg>
                    </a>
                    <a href="https://www.instagram.com/we_escape_abenteuer/" target="_blank">
                        <svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" viewBox="0 0 24 24"
                            fill="#ffffff">
                            <path
                                d="M16.98 0a6.9 6.9 0 0 1 5.08 1.98A6.94 6.94 0 0 1 24 7.02v9.96c0 2.08-.68 3.87-1.98 5.13A7.14 7.14 0 0 1 16.94 24H7.06a7.06 7.06 0 0 1-5.03-1.89A6.96 6.96 0 0 1 0 16.94V7.02C0 2.8 2.8 0 7.02 0h9.96zm.05 2.23H7.06c-1.45 0-2.7.43-3.53 1.25a4.82 4.82 0 0 0-1.3 3.54v9.92c0 1.5.43 2.7 1.3 3.58a5 5 0 0 0 3.53 1.25h9.88a5 5 0 0 0 3.53-1.25 4.73 4.73 0 0 0 1.4-3.54V7.02a5 5 0 0 0-1.3-3.49 4.82 4.82 0 0 0-3.54-1.3zM12 5.76c3.39 0 6.2 2.8 6.2 6.2a6.2 6.2 0 0 1-12.4 0 6.2 6.2 0 0 1 6.2-6.2zm0 2.22a3.99 3.99 0 0 0-3.97 3.97A3.99 3.99 0 0 0 12 15.92a3.99 3.99 0 0 0 3.97-3.97A3.99 3.99 0 0 0 12 7.98zm6.44-3.77a1.4 1.4 0 1 1 0 2.8 1.4 1.4 0 0 1 0-2.8z" />
                        </svg>
                    </a>
                    <a href="https://www.youtube.com/channel/UCAYvHk0MQBI-_SQ1j8nXIYw" target="_blank">
                        <svg xmlns=" http://www.w3.org/2000/svg" width="45" height="45" viewBox="0 0 24 24"
                            fill="#ffffff" style="transform: translateY(-5px)">
                            <path
                                d="M12.04 3.5c.59 0 7.54.02 9.34.5a3.02 3.02 0 0 1 2.12 2.15C24 8.05 24 12 24 12v.04c0 .43-.03 4.03-.5 5.8A3.02 3.02 0 0 1 21.38 20c-1.76.48-8.45.5-9.3.51h-.17c-.85 0-7.54-.03-9.29-.5A3.02 3.02 0 0 1 .5 17.84c-.42-1.61-.49-4.7-.5-5.6v-.5c.01-.9.08-3.99.5-5.6a3.02 3.02 0 0 1 2.12-2.14c1.8-.49 8.75-.51 9.34-.51zM9.54 8.4v7.18L15.82 12 9.54 8.41z" />
                        </svg>
                    </a>
                </div>
                <div class="flex flex-col md:w-[40vw] justify-center">
                    <p class="text-ks-white md:text-lg lg:text-xl text-start">Lorem ipsum dolor sit
                        amet consectetur
                        adipisicing
                        elit. Sint
                        dolorem consequuntur id, dignissimos quisquam maxime veritatis a magni. Autem nobis eaque
                        tempore consequatur cum assumenda quia blanditiis a excepturi repellat!</p>
                    <div data-aos="fade-up" class="buttons flex gap-4 mt-4 ">
                        <a style="--clr: #000000" class="button" href="index.php?action=about">
                            <span class="button__icon-wrapper">
                                <svg width="10" class="button__icon-svg" xmlns="http://www.w3.org/2000/svg" fill="none"
                                    viewBox="0 0 14 15">
                                    <path fill="currentColor"
                                        d="M13.376 11.552l-.264-10.44-10.44-.24.024 2.28 6.96-.048L.2 12.56l1.488 1.488 9.432-9.432-.048 6.912 2.304.024z" />
                                </svg>
                                <svg class="button__icon-svg  button__icon-svg--copy" xmlns="http://www.w3.org/2000/svg"
                                    width="10" fill="none" viewBox="0 0 14 15">
                                    <path fill="currentColor"
                                        d="M13.376 11.552l-.264-10.44-10.44-.24.024 2.28 6.96-.048L.2 12.56l1.488 1.488 9.432-9.432-.048 6.912 2.304.024z" />
                                </svg>
                            </span>
                            <?php if ($_SESSION['lang'] === 'ENG')
                                echo 'learn more';
                            else
                                echo "en savoir plus";
                            ?>
                        </a>
                    </div>
                </div>
        </section>

        <section
            class="h-[20vh] bg-ks-grey text-xs px-12 md:px-32 lg:px-64 md:py-6 md:text-lg text-ks-white flex justify-between align-middle items-center">
            <div class="flex flex-col align-middle items-center text-center gap-2">
                <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" viewBox="0 0 24 24" fill="none"
                    stroke="#f2f2f2" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                    <circle cx="12" cy="12" r="10" />
                    <path d="M16.2 7.8l-2 6.3-6.4 2.1 2-6.3z" />
                </svg>
                <p> <?php if ($_SESSION['lang'] === 'ENG')
                    echo 'ADVENTURE';
                else
                    echo "L'AVENTURE";
                ?></p>
            </div>
            <div class="flex flex-col align-middle items-center text-center gap-2">
                <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" viewBox="0 0 24 24" fill="none"
                    stroke="#f2f2f2" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                    <circle cx="9" cy="7" r="4"></circle>
                    <path d="M23 21v-2a4 4 0 0 0-3-3.87"></path>
                    <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                </svg>
                <p>TEAM BUILDING</p>
            </div>
            <div class="flex flex-col align-middle items-center text-center gap-2">
                <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" viewBox="0 0 24 24" fill="none"
                    stroke="#f2f2f2" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                    <rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect>
                    <path d="M7 11V7a5 5 0 0 1 9.9-1"></path>
                </svg>
                <p> <?php if ($_SESSION['lang'] === 'ENG')
                    echo 'MYSTERIES';
                else
                    echo "MYSTERES";
                ?></p>
            </div>
        </section>

        <section class="h-[100vh] bg-ks-black">
            <div></div>
        </section>

        <section
            class="flex flex-col gap-18 md:gap-12 items-center h-[240vh] md:h-[100vh] mb-0 md:mb-[360px] bg-ks-black">
            <h2 class="text-4xl lg:text-6xl text-ks-white text-center py-20"><?php if ($_SESSION['lang'] === 'ENG')
                echo 'HAVE FUN!';
            else
                echo "FAITES-VOUS PLAISIR !";
            ?></h2>

            <div class="flex flex-col md:flex-row gap-6 md:gap-12 px-12 mb-28">
                <div class="mx-auto">
                    <img class="h-auto max-w-[300px]" src="img/bonTemplate.jpeg" alt="Template de bon">
                </div>

                <div class="flex flex-col gap-4">
                    <?php if ($_SESSION['lang'] === 'ENG')
                        echo "<h3 class='text-xl md:text-2xl text-ks-white text-center md:text-start'>
                        <strong>Discover</strong> our goods for adventure <br><span
                            class='text-ks-orange'>awesome</span> and <span class='text-ks-orange'>mysterious</span>!
                    </h3>";
                    else
                        echo "<h3 class='text-xl md:text-2xl text-ks-white text-center md:text-start'>
                        <strong>Découvrez</strong> nos bons pour des aventures <br><span
                            class='text-ks-orange'>incroyables</span> et <span class='text-ks-orange'>mystérieuse</span>
                        !
                    </h3>";
                    ?>

                    <div data-aos="fade-up" class="buttons flex gap-4 mt-4 justify-center md:justify-start">
                        <a style="--clr: #000000" class="button" href="index.php?action=goods">
                            <span class="button__icon-wrapper">
                                <svg width="10" class="button__icon-svg" xmlns="http://www.w3.org/2000/svg" fill="none"
                                    viewBox="0 0 14 15">
                                    <path fill="currentColor"
                                        d="M13.376 11.552l-.264-10.44-10.44-.24.024 2.28 6.96-.048L.2 12.56l1.488 1.488 9.432-9.432-.048 6.912 2.304.024z" />
                                </svg>
                                <svg class="button__icon-svg  button__icon-svg--copy" xmlns="http://www.w3.org/2000/svg"
                                    width="10" fill="none" viewBox="0 0 14 15">
                                    <path fill="currentColor"
                                        d="M13.376 11.552l-.264-10.44-10.44-.24.024 2.28 6.96-.048L.2 12.56l1.488 1.488 9.432-9.432-.048 6.912 2.304.024z" />
                                </svg>
                            </span>
                            <?php if ($_SESSION['lang'] === 'ENG')
                                echo 'discover our goods';
                            else
                                echo "découvrez nos bons";
                            ?>
                        </a>
                    </div>
                </div>
            </div>

            <div class="px-12">
                <h3 class="text-ks-white text-xl md:text-2xl text-center mb-6">
                    <?php if ($_SESSION['lang'] === 'ENG')
                        echo "<strong><span class='text-ks-orange'>Use</span> your</strong> goods in a <strong>puzzle</strong>!";
                    else
                        echo "<strong><span class='text-ks-orange'>Utilisez</span> votre</strong> bon d'achat dans une
                        <strong>énigme</strong> !";
                    ?>
                </h3>

                <div class="flex flex-col md:flex-row gap-6 items-center">
                    <img class="h-auto max-w-[280px] md:w-[200px] lg:max-w-[340px] lg:w-[340px]" src="img/Faecher_2.jpg"
                        alt="Template de bon">
                    <img class="h-auto max-w-[280px] md:w-[200px] lg:max-w-[340px] lg:w-[340px]" src="img/Puzzel_2.jpg"
                        alt="Template de bon">
                    <img class="h-auto max-w-[280px] md:w-[200px] lg:max-w-[340px] lg:w-[340px]" src="img/Hertz_4.jpg"
                        alt="Template de bon">
                </div>

                <div data-aos="fade-up" class="buttons flex gap-4 mt-6 justify-center">
                    <a style="--clr: #000000" class="button" href="index.php?action=games">
                        <span class="button__icon-wrapper">
                            <svg width="10" class="button__icon-svg" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 14 15">
                                <path fill="currentColor"
                                    d="M13.376 11.552l-.264-10.44-10.44-.24.024 2.28 6.96-.048L.2 12.56l1.488 1.488 9.432-9.432-.048 6.912 2.304.024z" />
                            </svg>
                            <svg class="button__icon-svg  button__icon-svg--copy" xmlns="http://www.w3.org/2000/svg"
                                width="10" fill="none" viewBox="0 0 14 15">
                                <path fill="currentColor"
                                    d="M13.376 11.552l-.264-10.44-10.44-.24.024 2.28 6.96-.048L.2 12.56l1.488 1.488 9.432-9.432-.048 6.912 2.304.024z" />
                            </svg>
                        </span>
                        <?php if ($_SESSION['lang'] === 'ENG')
                            echo "discover our puzzles";
                        else
                            echo "découvrez nos enigmes";
                        ?>
                    </a>
                </div>
            </div>
        </section>

        <?= require_once "components/sponso.html" ?>

        <section class="h-[100vh] bg-ks-black">
            <div></div>
        </section>
    </main>

    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>

    <script>
        // Particle animation
        class ParticleAnimation {
            constructor(el, { quantity = 150, staticity = 40, ease = 50 } = {}) {
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


        document.addEventListener("alpine:init", () => {
            Alpine.data("list", () => ({
                users: [],
                search: "",
                isLoading: true,

                get filteredUsers() {
                    if (this.search === "") {
                        return this.users;
                    }

                    return this.users.filter((item) => {
                        return item.name.toLowerCase().includes(this.search.toLowerCase());
                    });
                },

                getUsers() {
                    fetch("js/data/users.json")
                        .then((res) => res.json())
                        .then((data) => {
                            this.isLoading = false;
                            this.users = data.sort((a, b) => a.ranking - b.ranking);
                        })
                        .catch((error) => {
                            console.error("Error fetching data:", error);
                            this.isLoading = false;
                        });
                },

                getMedal(ranking) {
                    if (ranking == 1) return "#FED931";
                    if (ranking == 2) return "#CFCFD0";
                    if (ranking == 3) return "#BD7B65";
                    return "transparent";
                },

                init() {
                    this.getUsers();
                }
            }));
        });
    </script>
</body>