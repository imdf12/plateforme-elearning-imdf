@php
    if (!($subscription && is_object($subscription))) {
        return;
    }

    $translations = parse_translation($subscription);
    $title = $translations['title'] ?? ($subscription->title ?? '');
    $description = $translations['description'] ?? ($subscription->description ?? '');
    $iconImg =
        $subscription->icon_img && fileExists('lms/subscribes', $subscription->icon_img)
            ? asset("storage/lms/subscribes/{$subscription->icon_img}")
            : asset('lms/frontend/assets/images/450x300.svg');
@endphp
<div class="swiper-slide">
    <div class="flex flex-col bg-white h-full custom-transition p-4 xl:p-6 rounded-2xl group/blog">
        <!-- BLOG THUMBNAIL -->
        <div class="relative aspect-[1.6] rounded-lg overflow-hidden shrink-0">
            <div class="blog-thumb">
                @if ($subscription->is_popular)
                    <span>{{ translate('Popular') }}</span>
                @endif
                <img data-src="{{ $iconImg }}" alt="Icon Image"
                    class="size-full object-cover group-hover/blog:scale-110 custom-transition">
            </div>
        </div>
        <!-- BLOG CONTENT -->
        <div class="pt-6 pb-2 grow">
            <h6 class="area-title font-bold !text-xl group-hover/blog:text-secondary mt-6 custom-transition">
                {{ $title }}
            </h6>
            <div class="card-description mt-3 text-heading/70 line-clamp-2">
                {!! clean($description) !!}
            </div>
            <h5 class="area-title font-bold !text-xl group-hover/blog:text-secondary mt-6 custom-transition">
                ${{ dotZeroRemove($subscription->price) }}
            </h5>
            <div class="card-description mt-3 text-heading/70 line-clamp-2">
                <p> {{ $subscription->usable_count }} subscribes </p>
                <p> {{ $subscription->days }} days of subscriptions</p>
            </div>
            @if (!authCheck())
                <a title="purchase" href="{{ route('login') }}"
                    class="btn b-solid btn-primary-solid btn-xl !rounded-full font-medium text-[16px] md:text-[18px] mt-2">
                    Purchase
                </a>
            @else
                <form action="{{ route('subscription.payment') }}" method="post">
                    @csrf
                    <input type="hidden" name="id" value="{{ $subscription->id }}">
                    <button type="submit"
                        class="btn b-solid btn-primary-solid btn-xl !rounded-full font-medium text-[16px] md:text-[18px] mt-2">
                        Purchase
                    </button>
                </form>
            @endif
        </div>
    </div>
</div>
{{-- <div class="col-span-full md:col-span-6 lg:col-span-4">
    <div class="flex flex-col bg-section px-4 sm:px-6 md:px-8 xl:px-10 py-8 md:py-10 xl:py-12 rounded-[10px] h-full relative transition-transform hover:scale-105 duration-300">
        <div class="flex">
            <img data-src="assets/images/pricing/online-education/basic-plan.png" alt="Pricing plan image">
        </div>
        <h5 class="area-title text-[20px] sm:text-[22px] md:text-[24px] font-bold mt-4">Basic Plan</h5>
        <p class="area-description text-sm sm:text-base mt-1.5">Ideal for personal learning</p>
        <div class="area-title font-bold xl:text-[40px] border-y border-heading/10 py-2 mt-7">$24.00</div>
        <ul class="text-sm sm:text-base font-medium ps-[22px] mt-8 mb-10 list-image-[url(../../assets/images/icons/pricing-list-1.svg)]">
            <li class="[&:not(:first-child)]:mt-3.5">Access to core courses</li>
            <li class="[&:not(:first-child)]:mt-3.5">Standard support</li>
            <li class="[&:not(:first-child)]:mt-3.5">Progress tracking</li>
        </ul>
        <div class="mt-auto">
            <a href="#" class="btn b-solid btn-primary-solid btn-xl text-sm sm:text-base !rounded-full w-full">Buy Now</a>
        </div>
    </div>
</div> --}}
