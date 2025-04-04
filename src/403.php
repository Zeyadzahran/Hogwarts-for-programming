<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>403 - Forbidden Corridor</title>
    <link href="https://fonts.googleapis.com/css2?family=Cinzel+Decorative:wght@700&family=Cormorant+Garamond:wght@400;700&display=swap" rel="stylesheet">
    <style>
        body {
            margin: 0;
            padding: 0;
            height: 100vh;
            background:
                linear-gradient(rgba(10, 5, 20, 0.85), rgba(5, 2, 15, 0.9)),
                url('../Styles/error.png') no-repeat center center fixed;
            background-size: cover;
            color: #f8f1e0;
            font-family: 'Cormorant Garamond', serif;
            overflow: hidden;
            position: relative;
        }

        .error-container {
            position: relative;
            z-index: 2;
            height: 100%;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            text-align: center;
            padding: 2rem;
        }

        .error-code {
            font-size: 10rem;
            color: #e63946;
            text-shadow:
                0 0 5px #e63946,
                0 0 15px #e63946,
                0 0 30px #e63946;
            margin: 0;
            font-family: 'Cinzel Decorative', cursive;
            letter-spacing: 5px;
            animation: pulse 2s infinite alternate;
            position: relative;
        }

        .error-code::after {
            content: '';
            position: absolute;
            bottom: -10px;
            left: 50%;
            transform: translateX(-50%);
            width: 50%;
            height: 3px;
            background: #e63946;
            box-shadow: 0 0 10px #e63946;
        }

        .error-message {
            font-size: 3rem;
            color: #f1c453;
            margin: 20px 0;
            text-shadow:
                0 0 5px #f1c453,
                0 0 15px rgba(241, 196, 83, 0.5);
            font-family: 'Cinzel Decorative', cursive;
            letter-spacing: 2px;
            animation: floatUp 3s infinite ease-in-out;
        }

        .error-description {
            color: #d8c99b;
            margin: 30px 0;
            font-size: 1.5rem;
            max-width: 600px;
            line-height: 1.6;
            text-shadow: 0 0 5px rgba(216, 201, 155, 0.3);
            position: relative;
            padding: 20px;
            border-left: 2px solid #e63946;
            border-right: 2px solid #e63946;
            background: rgba(20, 10, 30, 0.5);
        }

        .error-description::before,
        .error-description::after {
            content: '"';
            position: absolute;
            color: #e63946;
            font-size: 3rem;
            font-family: serif;
        }

        .error-description::before {
            top: 0;
            left: 10px;
        }

        .error-description::after {
            bottom: -20px;
            right: 10px;
        }

        .back-button {
            padding: 15px 30px;
            background: linear-gradient(135deg, #3a1c1c, #5e2b2b);
            color: #f8f1e0;
            text-decoration: none;
            border-radius: 5px;
            font-weight: bold;
            font-family: 'Cinzel Decorative', cursive;
            transition: all 0.3s ease;
            border: 1px solid #e63946;
            box-shadow:
                0 0 10px rgba(230, 57, 70, 0.5),
                inset 0 0 5px rgba(255, 255, 255, 0.1);
            text-transform: uppercase;
            letter-spacing: 1px;
            position: relative;
            overflow: hidden;
            z-index: 1;
        }

        .back-button::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(230, 57, 70, 0.2), transparent);
            transition: 0.5s;
            z-index: -1;
        }

        .back-button:hover {
            transform: translateY(-3px);
            box-shadow:
                0 5px 20px rgba(230, 57, 70, 0.7),
                inset 0 0 10px rgba(255, 255, 255, 0.2);
            background: linear-gradient(135deg, #4a2323, #6e3b3b);
        }

        .back-button:hover::before {
            left: 100%;
        }

        .floating-dust {
            position: absolute;
            width: 100%;
            height: 100%;
            pointer-events: none;
            z-index: 1;
        }

        .dust-particle {
            position: absolute;
            width: 2px;
            height: 2px;
            background: rgba(241, 196, 83, 0.7);
            border-radius: 50%;
            animation: float 15s infinite linear;
        }

        .spell-effect {
            position: absolute;
            width: 100%;
            height: 100%;
            pointer-events: none;
            z-index: 1;
        }

        .spell {
            position: absolute;
            color: rgba(230, 57, 70, 0.5);
            font-family: 'Cinzel Decorative', cursive;
            font-size: 1.5rem;
            animation: spellFloat 15s infinite linear;
            text-shadow: 0 0 5px rgba(230, 57, 70, 0.3);
            opacity: 0;
        }

        @keyframes pulse {
            0% {
                transform: scale(1);
                opacity: 0.9;
            }

            100% {
                transform: scale(1.05);
                opacity: 1;
            }
        }

        @keyframes floatUp {

            0%,
            100% {
                transform: translateY(0);
            }

            50% {
                transform: translateY(-10px);
            }
        }

        @keyframes float {
            0% {
                transform: translateY(100vh) translateX(0) rotate(0deg);
                opacity: 0;
            }

            10% {
                opacity: 0.7;
            }

            90% {
                opacity: 0.7;
            }

            100% {
                transform: translateY(-100px) translateX(100px) rotate(180deg);
                opacity: 0;
            }
        }

        @keyframes spellFloat {
            0% {
                transform: translateY(100vh) translateX(0);
                opacity: 0;
            }

            20% {
                opacity: 0.5;
            }

            80% {
                opacity: 0.5;
            }

            100% {
                transform: translateY(-100px) translateX(calc(100vw - 100px));
                opacity: 0;
            }
        }

        .flickering-torch {
            position: absolute;
            width: 80px;
            height: 150px;
            background: linear-gradient(to bottom, #3a1c1c, #1a0a0a);
            border-radius: 5px;
            bottom: 0;
            left: 50%;
            transform: translateX(-50%);
            z-index: 1;
        }

        .flickering-torch::before {
            content: '';
            position: absolute;
            width: 30px;
            height: 80px;
            background: linear-gradient(to bottom, #f1c453, #e63946);
            border-radius: 50% 50% 20% 20%;
            top: -70px;
            left: 25px;
            filter: blur(5px);
            animation: torchFlicker 0.5s infinite alternate;
        }

        @keyframes torchFlicker {

            0%,
            100% {
                height: 80px;
                opacity: 1;
                box-shadow:
                    0 0 20px #f1c453,
                    0 0 40px #e63946;
            }

            50% {
                height: 70px;
                opacity: 0.8;
                box-shadow:
                    0 0 15px #f1c453,
                    0 0 30px #e63946;
            }
        }
    </style>
</head>

<body>
    <div class="floating-dust" id="dust"></div>
    <div class="spell-effect" id="spells"></div>

    <div class="error-container">
        <h1 class="error-code">403</h1>
        <h2 class="error-message">FORBIDDEN CORRIDOR</h2>
        <?php
        if (isset($_SESSION['role'])) {
            if ($_SESSION['role'] === 'Admin') {
                echo '<div class="error-description">';
                echo 'Turn back, Professor! The student corridors are forbidden to the likes of you. These halls are reserved for young wizards and witches in training.';
                echo '</div>';
                echo '<a href="/professor/dashboard" class="back-button">Return to the Staff Wing</a>';
            } else {
                echo '<div class="error-description">';
                echo 'Halt, young wizard! The professor\'s quarters are strictly off-limits to students like you . These corridors are enchanted with ancient magic beyond your current abilities.';
                echo '</div>';
                echo '<a href="/student/dashboard" class="back-button">Return to the Common Room</a>';
            }
        } else {
            echo '<div class="error-description">';
            echo 'Beware, mysterious stranger! This area of Hogwarts is protected by powerful enchantments. Only those with proper magical credentials may enter.';
            echo '</div>';
            echo '<a href="/" class="back-button">Return to the Great Hall</a>';
        }
        ?>
    </div>

    <div class="flickering-torch"></div>

    <script>
        // Create floating dust particles
        function createDust() {
            const container = document.getElementById('dust');
            for (let i = 0; i < 100; i++) {
                const dust = document.createElement('div');
                dust.className = 'dust-particle';
                dust.style.left = `${Math.random() * 100}%`;
                dust.style.top = `${Math.random() * 100}%`;
                dust.style.width = `${Math.random() * 3 + 1}px`;
                dust.style.height = dust.style.width;
                dust.style.animationDuration = `${Math.random() * 10 + 10}s`;
                dust.style.animationDelay = `${Math.random() * 5}s`;
                container.appendChild(dust);
            }
        }

        // Create floating spell text
        function createSpells() {
            const spells = [
                "AVADA KEDAVRA",
                "CRUCIO",
                "IMPERIO",
                "SECTUMSEMPRA",
                "MORSMORDRE",
                "FLAMOS",
                "OBSCURO",
                "LUMOS NOX",
                "CONFRINGO",
                "DIABOLICA"
            ];

            const container = document.getElementById('spells');

            setInterval(() => {
                const spell = document.createElement('div');
                spell.className = 'spell';
                spell.textContent = spells[Math.floor(Math.random() * spells.length)];
                spell.style.left = `${Math.random() * 20}%`;
                spell.style.top = `${Math.random() * 20 + 80}%`;
                spell.style.fontSize = `${Math.random() * 1 + 1.5}rem`;
                spell.style.animationDuration = `${Math.random() * 10 + 10}s`;
                container.appendChild(spell);

                // Remove after animation
                setTimeout(() => {
                    spell.remove();
                }, 15000);
            }, 2000);
        }

        // Add text distortion effect
        function addTextEffects() {
            const messages = document.querySelectorAll('.error-message, .error-description');

            messages.forEach(message => {
                message.addEventListener('mouseenter', () => {
                    message.style.textShadow = '0 0 10px #e63946, 0 0 20px #e63946';
                });

                message.addEventListener('mouseleave', () => {
                    if (message.classList.contains('error-message')) {
                        message.style.textShadow = '0 0 5px #f1c453, 0 0 15px rgba(241, 196, 83, 0.5)';
                    } else {
                        message.style.textShadow = '0 0 5px rgba(216, 201, 155, 0.3)';
                    }
                });
            });
        }

        // Initialize effects
        window.onload = function() {
            createDust();
            createSpells();
            addTextEffects();
        };
    </script>
</body>

</html>