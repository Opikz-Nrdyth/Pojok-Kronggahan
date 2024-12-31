<style>
    body {
        margin: 0;
        overflow: hidden;
        background-color: #fff;
        min-height: 100vh;
    }

    .heart {
        position: absolute;
        width: 54px;
        /* Ukuran dinaikkan 1.8x dari 30px */
        height: 54px;
        /* Ukuran dinaikkan 1.8x dari 30px */
        opacity: 0;
        animation: floatUp 1.33s ease-in-out infinite;
        /* Kecepatan dinaikkan 3x (4s/3) */
    }

    @keyframes floatUp {
        0% {
            transform: translateY(100vh) scale(0.3);
            opacity: 0;
        }

        20% {
            opacity: 0.8;
        }

        80% {
            opacity: 0.8;
        }

        100% {
            transform: translateY(-20vh) scale(1);
            opacity: 0;
        }
    }
</style>
<script>
    function createHeart() {
        const heart = document.createElement('div');
        heart.className = 'heart';

        const svg = document.createElementNS("http://www.w3.org/2000/svg", "svg");
        svg.setAttribute('viewBox', '0 0 100 100');
        svg.style.width = '100%';
        svg.style.height = '100%';

        const polygon = document.createElementNS("http://www.w3.org/2000/svg", "path");
        polygon.setAttribute('d', 'M50 80 L18 40 A20 20 0 0 1 50 15 A20 20 0 0 1 82 40 Z');
        polygon.style.fill = '#f80c0c';

        svg.appendChild(polygon);
        heart.appendChild(svg);

        heart.style.left = Math.random() * 100 + 'vw';

        document.body.appendChild(heart);

        heart.addEventListener('animationend', () => {
            heart.remove();
        });
    }
</script>
