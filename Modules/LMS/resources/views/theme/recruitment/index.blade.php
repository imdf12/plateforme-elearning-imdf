<x-frontend-layout class="recruitment-page" :data="$page_data">

    <div class="relative py-16 sm:py-24 lg:py-32 bg-gray-50 dark:bg-dark-card overflow-hidden before:absolute before:size-full before:inset-0 before:bg-video before:blur-[120px] before:opacity-10">
        <div class="container relative z-10">
            <div class="max-w-3xl mx-auto text-center">
                <div class="area-subtitle text-primary-500">{{ translate('Opportunités') }}</div>
                <h1 class="area-title mt-2 text-3xl sm:text-4xl lg:text-5xl font-bold">
                    {{ translate('Rejoignez Notre Équipe Innovante') }}
                </h1>
                <p class="area-description mt-6 text-lg text-gray-600 dark:text-dark-text">
                    {{ translate('Nous sommes à la recherche de talents passionnés pour contribuer à notre mission et grandir avec nous. Découvrez nos opportunités et comment vous pouvez faire la différence.') }}
                </p>
            </div>

            <!-- Section Vidéo Inspirée de join-us -->
            <div class="mt-12 lg:mt-16 rounded-2xl overflow-hidden max-w-4xl mx-auto shadow-xl">
                <div class="swiper online-video-slider">
                    <div class="swiper-wrapper">
                        <!-- SINGLE ITEM -->
                        <div class="swiper-slide">
                            <div class="flex-center relative video-wrapper w-full h-[300px] sm:h-[400px] md:h-[480px] rounded-2xl overflow-hidden">
                                <video class="size-full object-cover rounded-2xl cursor-pointer" poster="{{ asset('lms/frontend/assets/images/recruitment/video_poster.jpg') }}">
                                    <source src="{{ asset('lms/frontend/assets/video/video.mp4') }}" type="video/mp4">
                                    {{ translate('Votre navigateur ne supporte pas la lecture de vidéos.') }}
                                </video>
                                <!-- CONTROLLER -->
                                <div class="controll-wrapper flex-center size-full bg-black/30 rounded-2xl absolute inset-0 [&.hide]:invisible">
                                    <button type="button" aria-label="Video popup button"
                                        class="controller btn-icon size-16 b-solid btn-primary-icon-solid !text-white pulse-animation active:scale-105">
                                        <i class="ri-play-fill text-3xl"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Fin Section Vidéo -->

            <div class="mt-12 lg:mt-16 text-center">
                <p class="text-gray-700 dark:text-dark-text-two mb-6 text-lg">
                    {{ translate('Prêt à relever de nouveaux défis et à façonner l\'avenir de l\'apprentissage en ligne avec nous ?') }}
                </p>
                <a href="#" target="_blank" rel="noopener noreferrer"
                    class="btn b-solid btn-primary-solid btn-xl !rounded-full font-bold h-14 px-8 text-lg inline-flex items-center group">
                    {{ translate('Je m\'inscris') }}
                    <i class="ri-arrow-right-line ml-2 group-hover:translate-x-1 transition-transform duration-300"></i>
                </a>
                <p class="mt-4 text-sm text-gray-500 dark:text-dark-text-two">
                    {{ translate('Vous serez redirigé vers notre formulaire de candidature.') }}
                </p>
            </div>
        </div>
        <!-- Éléments décoratifs optionnels -->
        <div class="absolute top-0 left-0 -translate-x-1/3 -translate-y-1/3 pointer-events-none select-none">
            <div class="size-96 bg-primary-500/10 rounded-full blur-3xl"></div>
        </div>
        <div class="absolute bottom-0 right-0 translate-x-1/3 translate-y-1/3 pointer-events-none select-none">
            <div class="size-96 bg-secondary-500/10 rounded-full blur-3xl"></div>
        </div>
    </div>
</x-frontend-layout>

@push('js')
<script>
    // Initialisation du Swiper pour la vidéo (si plusieurs vidéos sont prévues)
    // S'assurer que la librairie Swiper est chargée sur la page
    if (typeof Swiper !== 'undefined') {
        new Swiper(".online-video-slider", {
            slidesPerView: 1,
            spaceBetween: 20,
            loop: true,
            pagination: {
                el: ".online-video-slider-pagination",
                clickable: true,
            },
            navigation: {
                nextEl: ".swiper-button-next", // S'assurer que ces éléments existent si la navigation est active
                prevEl: ".swiper-button-prev",
            },
            autoplay: {
                delay: 5000,
                disableOnInteraction: false,
            },
        });
    }

    // Logique pour le lecteur vidéo (play/pause)
    document.querySelectorAll('.video-wrapper').forEach(wrapper => {
        const video = wrapper.querySelector('video');
        const controllerButton = wrapper.querySelector('.controller');
        const controllWrapper = wrapper.querySelector('.controll-wrapper');

        if (video && controllerButton && controllWrapper) {
            const togglePlay = () => {
                if (video.paused || video.ended) {
                    video.play();
                } else {
                    video.pause();
                }
            };

            controllerButton.addEventListener('click', (e) => {
                e.stopPropagation(); // Empêche la propagation si le wrapper a aussi un événement
                togglePlay();
            });

            video.addEventListener('play', () => {
                controllWrapper.classList.add('hide');
                controllerButton.innerHTML = '<i class="ri-pause-fill text-3xl"></i>';
            });

            video.addEventListener('pause', () => {
                controllWrapper.classList.remove('hide');
                controllerButton.innerHTML = '<i class="ri-play-fill text-3xl"></i>';
            });

            video.addEventListener('ended', () => {
                controllWrapper.classList.remove('hide');
                controllerButton.innerHTML = '<i class="ri-play-fill text-3xl"></i>';
            });

            // Optionnel: cliquer sur la vidéo pour play/pause
            // video.addEventListener('click', togglePlay);
        }
    });
</script>
@endpush

@push('css')
<style>
    .video-wrapper .controll-wrapper {
        transition: opacity 0.3s ease-in-out;
    }
    .video-wrapper .controll-wrapper.hide {
        opacity: 0;
        pointer-events: none;
    }
    .pulse-animation {
        animation: pulse 2s infinite;
    }
    @keyframes pulse {
        0% { transform: scale(0.95); box-shadow: 0 0 0 0 rgba(var(--primary-color-rgb), 0.7); }
        70% { transform: scale(1); box-shadow: 0 0 0 10px rgba(var(--primary-color-rgb), 0); }
        100% { transform: scale(0.95); box-shadow: 0 0 0 0 rgba(var(--primary-color-rgb), 0); }
    }
</style>
@endpush
