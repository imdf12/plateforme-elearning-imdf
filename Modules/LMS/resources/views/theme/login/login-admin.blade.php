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
            <h2 class="area-title">{{ translate('Connexion Administrateur') }}!</h2>
            <p class="area-description max-w-screen-sm mx-auto text-center mt-5">
                {{ translate('Connectez-vous en tant qu\'administrateur pour accéder au panneau d\'administration.') }}
            </p>
            <div class="w-full max-w-screen-sm mt-10">
                <form action="{{ route('admin.login') }}" class="w-full max-w-screen-sm mt-10 form" method="POST">
                    @csrf
                    <div class="grid grid-cols-2 gap-x-3 gap-y-5">
                        <div class="col-span-full">
                            <div class="relative">
                                <input type="email" name="email" id="admin_email"
                                    class="form-input rounded-full peer" placeholder="" />
                                <label for="admin_email"
                                    class="form-label floating-form-label">{{ translate('Email') }} <span
                                            class="text-danger">*</span></label>
                            </div>
                            <span class="error-text content_err"></span>
                        </div>
                        <div class="col-span-full">
                            <div class="relative">
                                <input type="password" name="password" id="admin_password"
                                    class="form-input rounded-full peer" placeholder="" />
                                <label for="admin_password"
                                    class="form-label floating-form-label">{{ translate('Password') }} <span
                                            class="text-danger">*</span></label>
                                <!-- type toggler -->
                                <label
                                    class="size-8 rounded-full cursor-pointer flex-center hover:bg-gray-200 focus:bg-gray-200 absolute top-1/2 -translate-y-1/2 right-2 rtl:right-auto rtl:left-2">
                                    <input type="checkbox" class="inputTypeToggle peer/it" hidden>
                                    <i
                                        class="ri-eye-off-line text-gray-500 dark:text-dark-text peer-checked/it:before:content-['\\ecb5']"></i>
                                </label>
                            </div>
                            <span class="error-text content_err"></span>
                        </div>
                        <div class="col-span-full">
                            <button type="submit" aria-label="Login"
                                class="btn b-solid btn-secondary-solid !text-heading dark:text-white btn-xl !rounded-full font-bold w-full h-12">
                                {{ translate('Log in') }}
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-auth-layout> 