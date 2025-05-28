<x-auth-layout>
    <div class="min-w-full min-h-screen flex items-center">
        <div class="grow min-h-screen h-full w-full lg:w-1/2 p-3 bg-primary-50 hidden lg:flex-center">
            <img data-src="{{ asset('lms/frontend/assets/images/auth/auth-loti.svg') }}" alt="loti">
        </div>
        <div class="grow min-h-screen h-full w-full lg:w-1/2 pt-32 pb-12 px-3 lg:p-3 flex-center flex-col">
            <h2 class="area-title">{{ translate('Inscription') }}!</h2>
            <p class="area-description max-w-screen-sm mx-auto text-center mt-5">
                {{ translate('Découvrez, apprenez et épanouissez-vous avec nous. Profitez d\'une aventure éducative enrichissante et agréable. Commençons dès maintenant') }}!
            </p>
            <div class="w-full max-w-screen-sm mt-10">
                <form action="{{ route('auth.register') }}" class="form" method="POST">
                    @csrf
                    <input type="hidden" name="user_type" value="student">
                    <div class="grid grid-cols-2 gap-x-3 gap-y-5">
                        <div class="col-span-full lg:col-auto">
                            <div class="relative">
                                <input type="text" id="std_first_name" name="first_name"
                                    class="form-input rounded-full peer" placeholder="" />
                                <label for="std_first_name" class="form-label floating-form-label">{{ translate('First Name') }} <span
                                        class="text-danger">*</span></label>
                            </div>
                            <span class="error-text first_name_err"></span>
                        </div>
                        <div class="col-span-full lg:col-auto">
                            <div class="relative">
                                <input type="text" id="std_last_name" name="last_name"
                                    class="form-input rounded-full peer" placeholder="" />
                                <label for="std_last_name" class="form-label floating-form-label">{{ translate('Last Name') }} <span
                                        class="text-danger">*</span></label>
                            </div>
                            <span class="error-text last_name_err"></span>
                        </div>
                        <div class="col-span-full lg:col-auto">
                            <div class="relative">
                                <input type="email" id="std_email" name="email"
                                    class="form-input rounded-full peer" placeholder="" />
                                <label for="std_email" class="form-label floating-form-label">{{ translate('Email') }} <span
                                        class="text-danger">*</span></label>
                            </div>
                            <span class="error-text email_err"></span>
                        </div>
                        <div class="col-span-full lg:col-auto">
                            <div class="relative">
                                <input type="text" id="std_phone" name="phone"
                                    class="form-input rounded-full peer" placeholder="" />
                                <label for="std_phone" class="form-label floating-form-label">{{ translate('Phone') }} <span
                                        class="text-danger">*</span></label>
                            </div>
                            <span class="error-text phone_err"></span>
                        </div>
                        <div class="col-span-full lg:col-auto">
                            <div class="relative">
                                <input type="password" id="std_password" name="password"
                                    class="form-input rounded-full peer" placeholder="" />
                                <label for="std_password" class="form-label floating-form-label">{{ translate('Password') }} <span
                                        class="text-danger">*</span></label>
                                <!-- type toggler -->
                                <label
                                    class="size-8 rounded-full cursor-pointer flex-center hover:bg-gray-200 focus:bg-gray-200 absolute top-1/2 -translate-y-1/2 right-2 rtl:right-auto rtl:left-2">
                                    <input type="checkbox" class="inputTypeToggle peer/it" hidden>
                                    <i
                                        class="ri-eye-off-line text-gray-500 dark:text-dark-text peer-checked/it:before:content-['\ecb5']"></i>
                                </label>
                            </div>
                            <span class="error-text password_err"></span>
                        </div>
                        <div class="col-span-full lg:col-auto">
                            <div class="relative">
                                <input type="password" id="std_password_confirmation" name="password_confirmation"
                                    class="form-input rounded-full peer" placeholder="" />
                                <label for="std_password_confirmation" class="form-label floating-form-label">{{ translate('Confirm Password') }} <span class="text-danger">*</span></label>
                                <!-- type toggler -->
                                <label for="std_confirm_pass"
                                    class="size-8 rounded-full cursor-pointer flex-center hover:bg-gray-200 focus:bg-gray-200 absolute top-1/2 -translate-y-1/2 right-2 rtl:right-auto rtl:left-2">
                                    <input type="checkbox" id="std_confirm_pass" class="inputTypeToggle peer/it"
                                        hidden>
                                    <i
                                        class="ri-eye-off-line text-gray-500 dark:text-dark-text peer-checked/it:before:content-['\ecb5']"></i>
                                </label>
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
                {{ translate('Vous avez déjà un compte étudiant') }}?
                <a href="{{ route('login.student') }}" class="text-primary hover:underline" aria-label="Page de connexion étudiant">{{ translate('Connectez-vous') }}</a>
            </div>
        </div>
    </div>
</x-auth-layout> 