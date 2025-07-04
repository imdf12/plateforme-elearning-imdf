@php
    $categories = $categories ?? [];
    $totalCategories = count($categories);

    $categoryRoute = '';
    $categoryBtnText = '';

    if ($totalCategories > 0) {
        $categoryRoute = 'category.list';
        $categoryBtnText = 'Voir toutes les catégories';
    }

    if (isAdmin() && $totalCategories < 1) {
        $categoryRoute = 'category.create';
        $categoryBtnText = 'Ajouter une catégorie';
    }
@endphp
<div class="bg-white pt-10 xl:pt-0 pb-16 sm:pb-24 lg:pb-[120px]">
    <div class="container">
        <!-- EN-TÊTE -->
        <div class="grid grid-cols-12 gap-4 items-center">
            <div class="col-span-full md:col-span-7 xl:col-span-6 md:pr-20">
                <div class="area-subtitle">
                    {{ translate('Catégories populaires') }}
                </div>
                <h2 class="area-title mt-2">
                    {{ translate('Optimisez votre cerveau pour des') }}
                    <span class="title-highlight-one">
                        {{ translate('performances maximales') }}
                    </span>
                </h2>
            </div>
            
            @if($categoryRoute && $categoryBtnText)
            <div class="col-span-full md:col-span-5 xl:col-span-6 md:justify-self-end">
                <a href="{{ route($categoryRoute) }}"
                    title="{{ $categoryBtnText }}"
                    aria-label="{{ $categoryBtnText }}"
                    class="btn b-solid btn-primary-solid btn-xl !rounded-full font-medium text-[16px] md:text-[18px]">
                    {{ translate($categoryBtnText) }}
                    <span class="hidden md:block">
                        <i class="ri-arrow-right-up-line text-[20px] rtl:before:content-['\ea66']"></i>
                    </span>
                </a>
            </div>
            @endif

        </div>
        <!-- CORPS -->
        @if (!empty($categories) && is_iterable($categories))
            <div class="grid grid-cols-12 gap-4 xl:gap-7 mt-10 lg:mt-[60px]">
                @foreach ($categories as $category)
                    <x-theme::cards.category.card-one :category="$category" />
                @endforeach
            </div>
        @endif
    </div>
</div>
