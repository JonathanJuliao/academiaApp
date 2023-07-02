@extends('layouts.layout')

@section('content')
<div class="home-container">
    <h1>Bem-vindo ao Academia App</h1>
    <p>Gerencie seus treinos e acompanhe seu progresso de forma fácil e eficiente.</p>

    <div class="carousel-container">
        <div class="carousel">
            <div class="item">
                <div class="card">
                    <i class="fas fa-dumbbell"></i>
                    <h2>Planos de Treino Personalizados</h2>
                    <p>Crie e acompanhe seus planos de treino personalizados, com exercícios específicos para alcançar seus objetivos.</p>
                    <a href="#" class="btn btn-primary">Ver Planos de Treino</a>
                </div>
            </div>

            <div class="item">
                <div class="card">
                    <i class="fas fa-chart-line"></i>
                    <h2>Relatórios de Progresso</h2>
                    <p>Acompanhe seu progresso através de relatórios detalhados e gráficos de desempenho, mantendo-se motivado e alcançando resultados.</p>
                    <a href="#" class="btn btn-primary">Ver Relatórios</a>
                </div>
            </div>

            <div class="item">
                <div class="card">
                    <i class="fas fa-map-marked-alt"></i>
                    <h2>Explorar Locais</h2>
                    <p>Descubra novos locais e rotas para treinos ao ar livre, com informações sobre distância, elevação e muito mais.</p>
                    <a href="#" class="btn btn-primary">Explorar Locais</a>
                </div>
            </div>

            <div class="item">
                <div class="card">
                    <i class="fas fa-question-circle"></i>
                    <h2>Ajuda para Execução de Exercícios</h2>
                    <p>Acesse dicas e instruções para a execução correta de exercícios, maximizando os resultados e evitando lesões.</p>
                    <a href="#" class="btn btn-primary">Ver Ajuda</a>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    /* Estilos personalizados para o dashboard */

    .home-container {
        padding: 20px;
        text-align: center;
        background-color: #11162D;
        color: #FFFFFF;
    }

    .carousel-container {
        overflow: hidden;
        margin-bottom: 20px;
    }

    .carousel {
        display: flex;
        cursor: grab;
        width: fit-content;
        scroll-snap-type: x mandatory;
    }

    .item {
        flex: 0 0 auto;
        margin-right: 10px;
        width: 300px;
        scroll-snap-align: start;
    }

    .card {
        background-color: #0B132B;
        color: #FFFFFF;
        padding: 20px;
        margin-bottom: 20px;
        border-radius: 10px;
    }

    .card i {
        font-size: 48px;
        margin-bottom: 20px;
    }

    h2 {
        font-size: 24px;
        margin-bottom: 10px;
    }

    p {
        line-height: 1.4;
    }

    .btn {
        margin-top: 20px;
    }
</style>
@endsection

@section('scripts')
<script>
    // Carrossel
    const carousel = document.querySelector('.carousel');
    let isDragging = false;
    let startPosition = 0;
    let currentTranslate = 0;
    let prevTranslate = 0;
    let animationID = 0;

    carousel.addEventListener('mousedown', dragStart);
    carousel.addEventListener('touchstart', dragStart);
    carousel.addEventListener('mouseup', dragEnd);
    carousel.addEventListener('mouseleave', dragEnd);
    carousel.addEventListener('touchend', dragEnd);
    carousel.addEventListener('mousemove', drag);
    carousel.addEventListener('touchmove', drag);

    function dragStart(event) {
        if (event.type === 'touchstart') {
            startPosition = event.touches[0].clientX;
        } else {
            startPosition = event.clientX;
        }
        isDragging = true;
        animationID = requestAnimationFrame(animation);
        carousel.classList.add('grabbing');
    }

    function drag(event) {
        if (isDragging) {
            let currentPosition = 0;
            if (event.type === 'touchmove') {
                currentPosition = event.touches[0].clientX;
            } else {
                currentPosition = event.clientX;
            }
            currentTranslate = currentPosition - startPosition;
        }
    }

    function dragEnd() {
        cancelAnimationFrame(animationID);
        isDragging = false;
        const movedBy = currentTranslate - prevTranslate;
        if (movedBy < -100) {
            currentTranslate = prevTranslate - carousel.offsetWidth;
        } else if (movedBy > 100) {
            currentTranslate = prevTranslate + carousel.offsetWidth;
        }
        prevTranslate = currentTranslate;
        carousel.style.transform = `translateX(${currentTranslate}px)`;
        carousel.classList.remove('grabbing');
        snapToItem();
    }

    function animation() {
        currentTranslate = prevTranslate + (currentTranslate - prevTranslate) * 0.9;
        carousel.style.transform = `translateX(${currentTranslate}px)`;
        if (isDragging) {
            animationID = requestAnimationFrame(animation);
        }
    }

    function snapToItem() {
        const items = carousel.getElementsByClassName('item');
        const itemWidth = items[0].offsetWidth;
        const translateValue = Math.round(currentTranslate / itemWidth) * itemWidth;
        currentTranslate = Math.max(Math.min(0, translateValue), -(items.length - 1) * itemWidth);
        carousel.style.transform = `translateX(${currentTranslate}px)`;
    }
</script>
@endsection
