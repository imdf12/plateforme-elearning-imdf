@php
    $settings = [
        'components' => [
            'inner-header-top' => '',
        ],
    ];
@endphp

<x-auth-layout class="home-online-education" :data="$settings">
    <div class="min-w-full min-h-screen flex items-center">
        <div class="grow min-h-screen h-full w-full lg:w-1/2 p-3 bg-primary-50 hidden lg:flex-center">
            <img data-src="{{ asset('lms/frontend/assets/images/auth/auth-loti.svg') }}" alt="loti">
        </div>
        <div class="grow min-h-screen h-full w-full lg:w-1/2 pt-32 pb-12 px-3 lg:p-3 flex-center flex-col">
            <h2 class="area-title">Merci d'avoir choisir imdf!</h2>
            <p class="area-description max-w-screen-sm mx-auto text-center mt-5">
                Vous pouvez vous connecter en cliquant sur le bouton ci-dessus!
            </p>

            
    </div>
    @push('js')
        <script>
            var loginPortals = $('.login-credentials');

            loginPortals.each(function() {
                let loginPortal = $(this);

                if (loginPortal.hasClass('active')) {
                    let email = loginPortal.data('email');
                    let password = loginPortal.data('password');
                    $("#email").val(email);
                    $("#password").val(password);
                }
            });

            $(document).on('click', '.login-credentials', function() {
                let email = $(this).data('email');
                let password = $(this).data('password');
                $('.dashkit-tab-btn').removeClass('active');
                $(this).addClass('active');

                $("#email").val(email)


                ;
                $("#password").val(password);
            })
        </script>
    @endpush
</x-auth-layout>
