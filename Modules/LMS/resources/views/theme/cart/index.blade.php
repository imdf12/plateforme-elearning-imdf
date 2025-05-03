<x-frontend-layout>
    <x-theme::breadcrumbs.breadcrumb-one 
        pageTitle="Panier d'Achat" 
        pageRoute="{{ route('cart.page') }}"
        pageName="Panier d'Achat" 
    />
    <div class="container">
        @if (isset($data['cartCourses']['courses']) && !empty($data['cartCourses']['courses']))
            <div class="grid grid-cols-12 gap-5">
                <div class="col-span-full lg:col-span-8">
                    <div class="overflow-x-auto">
                        <x-theme::carts.cart-list :cartCourses="$data['cartCourses']['courses']" />
                    </div>
                </div>
                <x-theme::carts.cart-sidebar :data="$data" />
            </div>
        @else
            <x-theme::cards.empty 
                title="Prêt à Apprendre ?"
                description="Votre panier attend d'être rempli de connaissances ! Découvrez de nouveaux cours et lancez votre parcours éducatif."
                btn="true" 
                btnAction="{{ route('course.list') }}" 
                btntext="Continuer l'Apprentissage" 
            />
        @endif
    </div>
</x-frontend-layout>
