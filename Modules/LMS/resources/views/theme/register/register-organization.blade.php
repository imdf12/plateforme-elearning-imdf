<x-auth-layout>
    <div class="min-w-full min-h-screen flex items-center">
        <div class="grow min-h-screen h-full w-full lg:w-1/2 p-3 bg-primary-50 hidden lg:flex-center">
            <img data-src="{{ asset('lms/frontend/assets/images/auth/auth-loti.svg') }}" alt="loti">
        </div>
        <div class="grow min-h-screen h-full w-full lg:w-1/2 pt-32 pb-12 px-3 lg:p-3 flex-center flex-col">
            <h2 class="area-title">{{ translate('Inscription Organisation') }}!</h2>
            <p class="area-description max-w-screen-sm mx-auto text-center mt-5">
                {{ translate('Inscrivez votre organisation pour accéder à nos services dédiés.') }}
            </p>
            <div class="w-full max-w-screen-sm mt-10">
                <form action="{{ route('auth.register') }}" method="POST" class="form">
                    @csrf
                    <input type="hidden" name="user_type" value="organization">
                    <div class="grid grid-cols-2 gap-x-3 gap-y-5">
                        <div class="col-span-full">
                            <div class="relative">
                                <input type="text" id="org_name" name="name"
                                    class="form-input rounded-full peer" placeholder="" />
                                <label for="org_name" class="form-label floating-form-label">{{ translate('Full Name') }} <span
                                        class="text-danger">*</span></label>
                            </div>
                            <span class="error-text name_err"></span>
                        </div>
                        <div class="col-span-full lg:col-auto">
                            <div class="relative">
                                <input type="email" id="org_email" name="email"
                                    class="form-input rounded-full peer" placeholder="" />
                                <label for="org_email" class="form-label floating-form-label">{{ translate('Email') }} <span
                                        class="text-danger">*</span></label>
                            </div>
                            <span class="error-text email_err"></span>
                        </div>
                        <div class="col-span-full lg:col-auto">
                            <div class="relative">
                                <input type="text" id="org_phone" name="phone"
                                    class="form-input rounded-full peer" placeholder="" />
                                <label for="org_phone" class="form-label floating-form-label">{{ translate('Phone') }} <span
                                        class="text-danger">*</span></label>
                            </div>
                            <span class="error-text phone_err"></span>
                        </div>
                        <div class="col-span-full lg:col-auto">
                            <div class="relative">
                                <input type="password" id="org_password" name="password"
                                    class="form-input rounded-full peer" placeholder="" />
                                <label for="org_password" class="form-label floating-form-label">{{ translate('Password') }} <span
                                        class="text-danger">*</span></label>
                                <!-- type toggler -->
                                <label for="org_first_pass"
                                    class="size-8 rounded-full cursor-pointer flex-center hover:bg-gray-200 focus:bg-gray-200 absolute top-1/2 -translate-y-1/2 right-2 rtl:right-auto rtl:left-2">
                                    <input type="checkbox" id="org_first_pass" class="inputTypeToggle peer/it"
                                        hidden>
                                    <i
                                        class="ri-eye-off-line text-gray-500 dark:text-dark-text peer-checked/it:before:content-['\ecb5']"></i>
                                </label>
                            </div>
                            <span class="error-text password_err"></span>
                        </div>
                        <div class="col-span-full lg:col-auto">
                            <div class="relative">
                                <input type="password" id="org_password_confirmation"
                                    name="password_confirmation" class="form-input rounded-full peer"
                                    placeholder="" />
                                <label for="org_password_confirmation"
                                    class="form-label floating-form-label">{{ translate('Confirm Password') }} <span
                                        class="text-danger">*</span></label>
                                <!-- type toggler -->
                                <label for="org_confirm_pass"
                                    class="size-8 rounded-full cursor-pointer flex-center hover:bg-gray-200 focus:bg-gray-200 absolute top-1/2 -translate-y-1/2 right-2 rtl:right-auto rtl:left-2">
                                    <input type="checkbox" id="org_confirm_pass" class="inputTypeToggle peer/it"
                                        hidden>
                                    <i
                                        class="ri-eye-off-line text-gray-500 dark:text-dark-text peer-checked/it:before:content-['\ecb5']"></i>
                                </label>
                            </div>
                        </div>
                        <div class="col-span-full">
                            <div class="relative">
                                <textarea id="org_address" name="address" rows="10" class="form-input rounded-2xl h-auto peer" placeholder=""></textarea>
                                <label for="org_address" class="form-label floating-form-label">{{ translate('Address') }}</label>
                            </div>
                        </div>
                        <div class="col-span-full">
                            <button type="submit" aria-label="Sign up"
                                class="btn b-solid btn-secondary-solid !text-heading dark:text-white btn-xl !rounded-full font-bold w-full h-12">
                                {{ translate('Sign Up') }}
                            </button>
                        </div>
                    </div>
                </form>
            </div>
            <div
                class="flex-center w-full max-w-screen-sm py-6 h-max relative text-heading dark:text-white font-normal before:absolute inset-0 before:w-full before:h-px before:bg-border">
                <span class="relative z-10 px-5 bg-white text-sm">{{ translate('OU') }}</span>
            </div>
            <div class="text-heading">
                {{ translate('Vous avez déjà un compte organisation') }}?
                <a href="{{ route('login.organization') }}" class="text-primary hover:underline" aria-label="Page de connexion organisation">{{ translate('Connectez-vous') }}</a>
            </div>
        </div>
    </div>
</x-auth-layout> 