<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>404 - Lost Page of Wisdom</title>
    <link href="https://fonts.googleapis.com/css2?family=Cinzel+Decorative:wght@700&family=Cormorant+Garamond:wght@400;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --ravenclaw-blue: #0e1a40;
            --ravenclaw-bronze: #946b2d;
            --ravenclaw-light: #5d5d8d;
            --ravenclaw-accent: #bebebe;
        }

        body {
            margin: 0;
            padding: 0;
            height: 100vh;
            background:
                linear-gradient(rgba(14, 26, 64, 0.8), rgba(9, 14, 35, 0.9)),
                url('../Styles/error.png') no-repeat center center fixed;
            background-size: cover;
            color: #e0e5eb;
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
            color: var(--ravenclaw-bronze);
            text-shadow:
                0 0 5px var(--ravenclaw-bronze),
                0 0 15px var(--ravenclaw-bronze);
            margin: 0;
            font-family: 'Cinzel Decorative', cursive;
            letter-spacing: 5px;
            animation: ravenGlow 3s infinite alternate;
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
            background: var(--ravenclaw-bronze);
            box-shadow: 0 0 10px var(--ravenclaw-bronze);
        }

        .error-message {
            font-size: 3rem;
            color: var(--ravenclaw-accent);
            margin: 20px 0;
            text-shadow:
                0 0 5px var(--ravenclaw-accent),
                0 0 15px rgba(190, 190, 190, 0.5);
            font-family: 'Cinzel Decorative', cursive;
            letter-spacing: 2px;
            animation: floatUp 3s infinite ease-in-out;
        }

        .error-description {
            color: #c0c8d8;
            margin: 30px 0;
            font-size: 1.5rem;
            max-width: 600px;
            line-height: 1.6;
            position: relative;
            padding: 20px;
            border-left: 2px solid var(--ravenclaw-bronze);
            border-right: 2px solid var(--ravenclaw-bronze);
            background: rgba(14, 26, 64, 0.5);
        }

        .team-mention {
            color: var(--ravenclaw-bronze);
            font-style: italic;
            margin-top: 15px;
        }

        .back-button {
            padding: 15px 30px;
            background: linear-gradient(135deg, var(--ravenclaw-blue), var(--ravenclaw-light));
            color: var(--ravenclaw-accent);
            text-decoration: none;
            border-radius: 5px;
            font-weight: bold;
            font-family: 'Cinzel Decorative', cursive;
            transition: all 0.3s ease;
            border: 1px solid var(--ravenclaw-bronze);
            box-shadow:
                0 0 10px rgba(148, 107, 45, 0.5),
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
            background: linear-gradient(90deg, transparent, rgba(148, 107, 45, 0.3), transparent);
            transition: 0.5s;
            z-index: -1;
        }

        .back-button:hover {
            transform: translateY(-3px);
            box-shadow:
                0 5px 20px rgba(148, 107, 45, 0.7),
                inset 0 0 10px rgba(255, 255, 255, 0.2);
            background: linear-gradient(135deg, var(--ravenclaw-light), var(--ravenclaw-blue));
        }

        .back-button:hover::before {
            left: 100%;
        }

        .floating-feathers {
            position: absolute;
            width: 100%;
            height: 100%;
            pointer-events: none;
            z-index: 1;
        }

        .feather {
            position: absolute;
            color: var(--ravenclaw-accent);
            font-size: 1.5rem;
            animation: float 15s infinite linear;
            opacity: 0;
        }

        .raven {
            position: absolute;
            width: 50px;
            height: 50px;
            background-image: url('data:image/svg+xml;utf8,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path fill="%230e1a40" d="M12,2C13.1,2 14,2.9 14,4C14,5.1 13.1,6 12,6C10.9,6 10,5.1 10,4C10,2.9 10.9,2 12,2M15.5,8C16.3,8 17,8.7 17,9.5C17,10.3 16.3,11 15.5,11C14.7,11 14,10.3 14,9.5C14,8.7 14.7,8 15.5,8M8.5,8C9.3,8 10,8.7 10,9.5C10,10.3 9.3,11 8.5,11C7.7,11 7,10.3 7,9.5C7,8.7 7.7,8 8.5,8M12,11C13.1,11 14,11.9 14,13C14,14.1 13.1,15 12,15C10.9,15 10,14.1 10,13C10,11.9 10.9,11 12,11M19,17V19H5V17C5,14.8 8.1,13 12,13C15.9,13 19,14.8 19,17Z"/></svg>');
            background-size: contain;
            animation: ravenFly 20s infinite linear;
            opacity: 0;
        }

        @keyframes ravenGlow {
            0% {
                text-shadow:
                    0 0 5px var(--ravenclaw-bronze),
                    0 0 15px var(--ravenclaw-bronze);
                transform: scale(1);
            }

            100% {
                text-shadow:
                    0 0 10px var(--ravenclaw-bronze),
                    0 0 30px var(--ravenclaw-bronze);
                transform: scale(1.05);
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
                transform: translateY(-100px) translateX(100px) rotate(360deg);
                opacity: 0;
            }
        }

        @keyframes ravenFly {
            0% {
                transform: translateX(-100px) translateY(100vh) scale(0.5);
                opacity: 0;
            }

            10% {
                opacity: 0.8;
            }

            90% {
                opacity: 0.8;
            }

            100% {
                transform: translateX(calc(100vw + 100px)) translateY(-100px) scale(1);
                opacity: 0;
            }
        }

        .diadem {
            position: absolute;
            width: 100px;
            height: 50px;
            background-image: url('data:image/svg+xml;utf8,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path fill="%23946b2d" d="M12,3L5,9L7,21H17L19,9L12,3M12,7.5C13.38,7.5 14.5,8.62 14.5,10C14.5,11.38 13.38,12.5 12,12.5C10.62,12.5 9.5,11.38 9.5,10C9.5,8.62 10.62,7.5 12,7.5Z"/></svg>');
            background-repeat: no-repeat;
            animation: diademFloat 30s infinite linear;
            opacity: 0.1;
            z-index: 0;
        }

        @keyframes diademFloat {
            0% {
                transform: translateX(0) translateY(0) rotate(0deg);
                opacity: 0.1;
            }

            50% {
                transform: translateX(50vw) translateY(50vh) rotate(180deg);
                opacity: 0.3;
            }

            100% {
                transform: translateX(100vw) translateY(0) rotate(360deg);
                opacity: 0.1;
            }
        }
    </style>
</head>

<body>
    <div class="floating-feathers" id="feathers"></div>
    <div class="diadem"></div>

    <div class="error-container">
        <h1 class="error-code">404</h1>
        <h2 class="error-message">LOST PAGE OF WISDOM</h2>
        <div class="error-description">
            "Wit beyond measure is man's greatest treasure... but even Ravenclaw's wisdom cannot find this page.
            Perhaps Rowena's Diadem could help locate it, or maybe the eagles know where it's flown.
            Until then, let your intellect guide you back to known pages."
            <div class="team-mention">- Zeyad, Tahany & Shams of Ravenclaw</div>
        </div>
        <a href="/" class="back-button">Return to the Ravenclaw Common Room</a>
    </div>

    <script>
        function createFeathers() {
            const container = document.getElementById('feathers');
            for (let i = 0; i < 15; i++) {
                const feather = document.createElement('div');
                feather.className = 'feather';
                feather.innerHTML = '✒';
                feather.style.left = `${Math.random() * 100}%`;
                feather.style.top = `${Math.random() * 100 + 100}%`;
                feather.style.fontSize = `${Math.random() * 1 + 1.5}rem`;
                feather.style.animationDuration = `${Math.random() * 10 + 10}s`;
                feather.style.animationDelay = `${Math.random() * 5}s`;
                container.appendChild(feather);
            }
        }

        function createRavens() {
            const container = document.getElementById('feathers');
            setInterval(() => {
                const raven = document.createElement('div');
                raven.className = 'raven';
                raven.style.left = `-100px`;
                raven.style.top = `${Math.random() * 100 + 100}%`;
                raven.style.animationDuration = `${Math.random() * 15 + 15}s`;
                container.appendChild(raven);

                setTimeout(() => {
                    raven.remove();
                }, 20000);
            }, 3000);
        }

        window.onload = function() {
            createFeathers();
            createRavens();
        };
    </script>
</body>

</html>