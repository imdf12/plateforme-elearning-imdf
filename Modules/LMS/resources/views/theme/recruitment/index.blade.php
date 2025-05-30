<x-frontend-layout class="blog-page" :data="$page_data">
    <x-theme::breadcrumbs.breadcrumb-one
        pageTitle="Recrutement" 
        pageRoute="{{ route('recruitment.page') }}" 
        pageName="Recrutement" 
    />
    <div class="relative py-16 sm:py-24 lg:py-32 bg-gray-50 dark:bg-dark-card overflow-hidden">
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
                            <div class="flex-center relative video-wrapper w-full h-[300px] sm:h-[400px] md:h-[480px] rounded-2xl overflow-hidden bg-gray-900">
                                <video class="size-full object-cover rounded-2xl cursor-pointer" poster="{{ asset('lms/frontend/assets/images/450x300.svg') }}">
                                    <source src="{{ asset('lms/frontend/assets/video/video.mp4') }}" type="video/mp4">
                                    {{ translate('Votre navigateur ne supporte pas la lecture de vidéos.') }}
                                </video>
                                <!-- CONTROLLER -->
                                <div class="controll-wrapper flex-center size-full bg-black/50 rounded-2xl absolute inset-0 backdrop-blur-sm [&.hide]:invisible">
                                    <button type="button" aria-label="Video popup button"
                                        class="controller btn-icon size-20 bg-white/90 hover:bg-white text-primary-600 hover:text-primary-700 rounded-full shadow-xl pulse-animation active:scale-105 transition-all duration-300">
                                        <i class="ri-play-fill text-4xl"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Fin Section Vidéo -->

            <div class="mt-12 lg:mt-16 text-center">
                <p class="text-gray-700 dark:text-dark-text-two mb-8 text-lg max-w-2xl mx-auto">
                    {{ translate('Prêt à relever de nouveaux défis et à façonner l\'avenir de l\'apprentissage en ligne avec nous ?') }}
                </p>
                <div class="bg-white dark:bg-dark-card rounded-2xl p-8 shadow-lg max-w-md mx-auto border border-gray-200 dark:border-gray-700">
                    <a href="#" target="_blank" rel="noopener noreferrer"
                        class="recruitment-btn inline-flex items-center justify-center group w-full">
                        <span class="mr-3">{{ translate('Je m\'inscris') }}</span>
                        <i class="ri-arrow-right-line text-xl group-hover:translate-x-1 transition-transform duration-300"></i>
                    </a>
                    <p class="mt-4 text-sm text-gray-500 dark:text-dark-text-two">
                        {{ translate('Vous serez redirigé vers notre formulaire de candidature.') }}
                    </p>
                </div>
            </div>
        </div>
        <!-- Éléments décoratifs optionnels -->
        <div class="absolute top-0 left-0 -translate-x-1/3 -translate-y-1/3">
            <div class="size-96 bg-primary-500/10 rounded-full blur-3xl"></div>
        </div>
        <div class="absolute bottom-0 right-0 translate-x-1/3 translate-y-1/3">
            <div class="size-96 bg-secondary-500/10 rounded-full blur-3xl"></div>
        </div>
    </div>
</x-frontend-layout>

@push('js')
<script>
    // S'assurer que le bouton de recrutement est bien stylé
    document.addEventListener('DOMContentLoaded', function() {
        const recruitmentBtn = document.querySelector('.recruitment-btn');
        if (recruitmentBtn) {
            // Forcer les styles au cas où ils ne seraient pas appliqués
            recruitmentBtn.style.cssText = `
                background: linear-gradient(135deg, #3b82f6 0%, #1d4ed8 100%) !important;
                color: white !important;
                padding: 16px 32px !important;
                border-radius: 50px !important;
                font-weight: bold !important;
                font-size: 18px !important;
                text-decoration: none !important;
                border: none !important;
                box-shadow: 0 10px 25px rgba(59, 130, 246, 0.3) !important;
                transition: all 0.3s ease !important;
                display: inline-flex !important;
                align-items: center !important;
                justify-content: center !important;
                min-height: 64px !important;
                width: 100% !important;
            `;
            
            // Ajouter les événements hover
            recruitmentBtn.addEventListener('mouseenter', function() {
                this.style.background = 'linear-gradient(135deg, #1d4ed8 0%, #1e40af 100%)';
                this.style.transform = 'translateY(-2px) scale(1.05)';
                this.style.boxShadow = '0 15px 35px rgba(59, 130, 246, 0.4)';
            });
            
            recruitmentBtn.addEventListener('mouseleave', function() {
                this.style.background = 'linear-gradient(135deg, #3b82f6 0%, #1d4ed8 100%)';
                this.style.transform = 'translateY(0) scale(1)';
                this.style.boxShadow = '0 10px 25px rgba(59, 130, 246, 0.3)';
            });
        }
    });

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
                controllerButton.innerHTML = '<i class="ri-pause-fill text-4xl"></i>';
                controllerButton.classList.remove('pulse-animation');
            });

            video.addEventListener('pause', () => {
                controllWrapper.classList.remove('hide');
                controllerButton.innerHTML = '<i class="ri-play-fill text-4xl"></i>';
                controllerButton.classList.add('pulse-animation');
            });

            video.addEventListener('ended', () => {
                controllWrapper.classList.remove('hide');
                controllerButton.innerHTML = '<i class="ri-play-fill text-4xl"></i>';
                controllerButton.classList.add('pulse-animation');
            });

            // Optionnel: cliquer sur la vidéo pour play/pause
            video.addEventListener('click', togglePlay);
            
            // Gestion de l'erreur de chargement vidéo
            video.addEventListener('error', (e) => {
                console.warn('Erreur de chargement vidéo:', e);
                controllerButton.innerHTML = '<i class="ri-refresh-line text-4xl"></i>';
                controllerButton.setAttribute('title', 'Erreur de chargement vidéo');
            });
        }
    });
</script>
@endpush

@push('css')
<style>
    /* Bouton de recrutement avec styles explicites */
    .recruitment-btn {
        background: linear-gradient(135deg, #3b82f6 0%, #1d4ed8 100%) !important;
        color: white !important;
        padding: 16px 32px !important;
        border-radius: 50px !important;
        font-weight: bold !important;
        font-size: 18px !important;
        text-decoration: none !important;
        border: none !important;
        box-shadow: 0 10px 25px rgba(59, 130, 246, 0.3) !important;
        transition: all 0.3s ease !important;
        display: inline-flex !important;
        align-items: center !important;
        justify-content: center !important;
        min-height: 64px !important;
    }
    
    .recruitment-btn:hover {
        background: linear-gradient(135deg, #1d4ed8 0%, #1e40af 100%) !important;
        transform: translateY(-2px) scale(1.05) !important;
        box-shadow: 0 15px 35px rgba(59, 130, 246, 0.4) !important;
        color: white !important;
        text-decoration: none !important;
    }
    
    .recruitment-btn:focus,
    .recruitment-btn:active {
        background: linear-gradient(135deg, #1e40af 0%, #1e3a8a 100%) !important;
        color: white !important;
        text-decoration: none !important;
        outline: none !important;
    }

    .video-wrapper .controll-wrapper {
        transition: opacity 0.3s ease-in-out, backdrop-filter 0.3s ease-in-out;
    }
    .video-wrapper .controll-wrapper.hide {
        opacity: 0;
        pointer-events: none;
    }
    
    /* Animation du bouton play */
    .pulse-animation {
        animation: pulse 2s infinite;
    }
    
    @keyframes pulse {
        0% { 
            transform: scale(1); 
            box-shadow: 0 0 0 0 rgba(255, 255, 255, 0.4); 
        }
        70% { 
            transform: scale(1.05); 
            box-shadow: 0 0 0 15px rgba(255, 255, 255, 0); 
        }
        100% { 
            transform: scale(1); 
            box-shadow: 0 0 0 0 rgba(255, 255, 255, 0); 
        }
    }
    
    /* Amélioration de la visibilité du bouton principal */
    .btn-gradient-primary {
        background: linear-gradient(135deg, #3b82f6 0%, #1d4ed8 100%);
        transition: all 0.3s ease;
    }
    
    .btn-gradient-primary:hover {
        background: linear-gradient(135deg, #1d4ed8 0%, #1e40af 100%);
        transform: translateY(-2px);
        box-shadow: 0 10px 25px rgba(59, 130, 246, 0.4);
    }
    
    /* Effet de hover sur le wrapper vidéo */
    .video-wrapper:hover .controll-wrapper {
        background-color: rgba(0, 0, 0, 0.6);
    }
    
    .video-wrapper:hover .controller {
        transform: scale(1.1);
    }
    
    /* Responsive amélioré */
    @media (max-width: 640px) {
        .controller {
            width: 4rem !important;
            height: 4rem !important;
        }
        .controller i {
            font-size: 1.5rem !important;
        }
        
        .recruitment-btn {
            padding: 14px 24px !important;
            font-size: 16px !important;
            min-height: 56px !important;
        }
    }
</style>
@endpush 