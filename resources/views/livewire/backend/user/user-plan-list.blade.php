<div>
    @php use App\Models\UserPlan; @endphp

    {{--    <section class="section-py first-section-pt">--}}
    {{--        <div class="container ">--}}


    {{--            <div class="row mx-0 gy-3 px-lg-5 mt-5">--}}
    {{--                @foreach($plans as $item)--}}
    {{--                    <!-- Basic -->--}}
    {{--                    @if($item->serial == 1)--}}
    {{--                        <div class="col-lg mb-md-0 mb-4">--}}
    {{--                            <div class="card border rounded shadow-none">--}}
    {{--                                <div class="card-body">--}}
    {{--                                    <div class="my-3 pt-2 text-center">--}}
    {{--                                        <img src="../../assets/img/illustrations/page-pricing-basic.png" alt="Basic Image" height="140">--}}
    {{--                                    </div>--}}
    {{--                                    <h3 class="card-title text-center text-capitalize mb-1">{{ $item->name ?? '' }}</h3>--}}
    {{--                                    <p class="text-center">A simple start for everyone</p>--}}
    {{--                                    <div class="text-center">--}}
    {{--                                        <div class="d-flex justify-content-center">--}}
    {{--                                            <sup class="h6 pricing-currency mt-3 mb-0 me-1 text-primary">$</sup>--}}
    {{--                                            <h1 class="display-4 mb-0 text-primary">{{ $item->price ?? '' }}</h1>--}}
    {{--                                            <sub class="h6 pricing-duration mt-auto mb-2 text-muted fw-normal">/{{ $item->type ?? '' }}</sub>--}}
    {{--                                        </div>--}}
    {{--                                        <small class="price-yearly price-yearly-toggle text-muted">$ {{ $item->price ?? '' }} / year</small>--}}
    {{--                                    </div>--}}

    {{--                                    --}}{{--                <ul class="ps-0 my-4 pt-2 circle-bullets">--}}
    {{--                                    --}}{{--                  <li class="mb-2 d-flex align-items-center"><i class="ti ti-point ti-lg"></i>100 responses a month</li>--}}
    {{--                                    --}}{{--                  <li class="mb-2 d-flex align-items-center">--}}
    {{--                                    --}}{{--                    <i class="ti ti-point ti-lg"></i>Unlimited forms and surveys--}}
    {{--                                    --}}{{--                  </li>--}}
    {{--                                    --}}{{--                  <li class="mb-2 d-flex align-items-center"><i class="ti ti-point ti-lg"></i>Unlimited fields</li>--}}
    {{--                                    --}}{{--                  <li class="mb-2 d-flex align-items-center">--}}
    {{--                                    --}}{{--                    <i class="ti ti-point ti-lg"></i>Basic form creation tools--}}
    {{--                                    --}}{{--                  </li>--}}
    {{--                                    --}}{{--                  <li class="mb-0 d-flex align-items-center"><i class="ti ti-point ti-lg"></i>Up to 2 subdomains</li>--}}
    {{--                                    --}}{{--                </ul>--}}
    {{--                                    <a href="" class="btn btn-label-success d-grid w-100 waves-effect">Your Current Plan</a>--}}
    {{--                                </div>--}}
    {{--                            </div>--}}
    {{--                        </div>--}}
    {{--                    @endif--}}
    {{--                    <!-- Pro -->--}}
    {{--                    @if($item->serial == 2)--}}
    {{--                        <div class="col-lg mb-md-0 mb-4">--}}
    {{--                            <div class="card border-primary border shadow-none">--}}
    {{--                                <div class="card-body position-relative">--}}
    {{--                                    <div class="position-absolute end-0 me-4 top-0 mt-4">--}}
    {{--                                        <span class="badge bg-label-primary">Popular</span>--}}
    {{--                                    </div>--}}
    {{--                                    <div class="my-3 pt-2 text-center">--}}
    {{--                                        <img src="../../assets/img/illustrations/page-pricing-standard.png" alt="Standard Image" height="140">--}}
    {{--                                    </div>--}}
    {{--                                    <h3 class="card-title text-center text-capitalize mb-1">{{ $item->name ?? '' }}</h3>--}}
    {{--                                    <p class="text-center">For small to medium businesses</p>--}}
    {{--                                    <div class="text-center">--}}
    {{--                                        <div class="d-flex justify-content-center">--}}
    {{--                                            <sup class="h6 pricing-currency mt-3 mb-0 me-1 text-primary">$</sup>--}}
    {{--                                            <h1 class="price-toggle price-yearly display-4 text-primary mb-0">{{ $item->price ?? '' }}</h1>--}}
    {{--                                            <h1 class="price-toggle price-monthly display-4 text-primary mb-0 d-none">9</h1>--}}
    {{--                                            <sub class="h6 text-muted pricing-duration mt-auto mb-2 fw-normal">/--}}
    {{--                                                @if($item->type == 'six_month')--}}
    {{--                                                    6 month--}}
    {{--                                                @elseif($item->type == 'one_month')--}}
    {{--                                                    1 month--}}
    {{--                                                @elseif($item->type == 'four_month')--}}
    {{--                                                    4 month--}}
    {{--                                                @elseif($item->type == 'one_year')--}}
    {{--                                                    1 year--}}
    {{--                                                @endif--}}

    {{--                                              </sub>--}}
    {{--                                        </div>--}}
    {{--                                        <small class="price-yearly price-yearly-toggle text-muted">$ 90 / year</small>--}}
    {{--                                    </div>--}}

    {{--                                    --}}{{--                <ul class="ps-0 my-4 pt-2 circle-bullets">--}}
    {{--                                    --}}{{--                  <li class="mb-2 d-flex align-items-center"><i class="ti ti-point ti-lg"></i>Up to 5 users</li>--}}
    {{--                                    --}}{{--                  <li class="mb-2 d-flex align-items-center"><i class="ti ti-point ti-lg"></i>120+ components</li>--}}
    {{--                                    --}}{{--                  <li class="mb-2 d-flex align-items-center">--}}
    {{--                                    --}}{{--                    <i class="ti ti-point ti-lg"></i>Basic support on Github--}}
    {{--                                    --}}{{--                  </li>--}}
    {{--                                    --}}{{--                  <li class="mb-2 d-flex align-items-center"><i class="ti ti-point ti-lg"></i>Monthly updates</li>--}}
    {{--                                    --}}{{--                  <li class="mb-0 d-flex align-items-center"><i class="ti ti-point ti-lg"></i>Integrations</li>--}}
    {{--                                    --}}{{--                </ul>--}}

    {{--                                    <a href="/user/payment/{{ $item->id }}" class="btn btn-primary d-grid w-100 waves-effect waves-light">Upgrade</a>--}}
    {{--                                </div>--}}
    {{--                            </div>--}}
    {{--                        </div>--}}
    {{--                    @endif--}}
    {{--                    <!-- Enterprise -->--}}
    {{--                    @if($item->serial == 3)--}}
    {{--                        <div class="col-lg">--}}
    {{--                            <div class="card border rounded shadow-none">--}}
    {{--                                <div class="card-body">--}}
    {{--                                    <div class="my-3 pt-2 text-center">--}}
    {{--                                        <img src="../../assets/img/illustrations/page-pricing-enterprise.png" alt="Enterprise Image" height="140">--}}
    {{--                                    </div>--}}
    {{--                                    <h3 class="card-title text-center text-capitalize mb-1">Enterprise</h3>--}}
    {{--                                    <p class="text-center">Solution for big organizations</p>--}}

    {{--                                    <div class="text-center">--}}
    {{--                                        <div class="d-flex justify-content-center">--}}
    {{--                                            <sup class="h6 text-primary pricing-currency mt-3 mb-0 me-1">$</sup>--}}
    {{--                                            <h1 class="price-toggle price-yearly display-4 text-primary mb-0">16</h1>--}}
    {{--                                            <h1 class="price-toggle price-monthly display-4 text-primary mb-0 d-none">19</h1>--}}
    {{--                                            <sub class="h6 pricing-duration mt-auto mb-2 fw-normal text-muted">/month</sub>--}}
    {{--                                        </div>--}}
    {{--                                        <small class="price-yearly price-yearly-toggle text-muted">$ 190 / year</small>--}}
    {{--                                    </div>--}}

    {{--                                    --}}{{--                <ul class="ps-0 my-4 pt-2 circle-bullets">--}}
    {{--                                    --}}{{--                  <li class="mb-2 d-flex align-items-center"><i class="ti ti-point ti-lg"></i>Up to 10 users</li>--}}
    {{--                                    --}}{{--                  <li class="mb-2 d-flex align-items-center"><i class="ti ti-point ti-lg"></i>150+ components</li>--}}
    {{--                                    --}}{{--                  <li class="mb-2 d-flex align-items-center">--}}
    {{--                                    --}}{{--                    <i class="ti ti-point ti-lg"></i>Basic support on Github--}}
    {{--                                    --}}{{--                  </li>--}}
    {{--                                    --}}{{--                  <li class="mb-2 d-flex align-items-center"><i class="ti ti-point ti-lg"></i>Monthly updates</li>--}}
    {{--                                    --}}{{--                  <li class="mb-0 d-flex align-items-center"><i class="ti ti-point ti-lg"></i>Speedy build tooling</li>--}}
    {{--                                    --}}{{--                </ul>--}}

    {{--                                    <a href="payment-page.html" class="btn btn-label-primary d-grid w-100 waves-effect">Upgrade</a>--}}
    {{--                                </div>--}}
    {{--                            </div>--}}
    {{--                        </div>--}}
    {{--                    @endif--}}
    {{--                @endforeach--}}
    {{--            </div>--}}
    {{--        </div>--}}
    {{--    </section>--}}
    <section class="w-full max-w-[1600px] mx-auto px-3 sm:px-5 py-12">
        <section class="">
            @if (session('status'))
                <div role="alert" class="alert alert-success">
                    <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current shrink-0 h-6 w-6" fill="none" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                    <span>{{ session('status') }}</span>
                </div>
            @endif
            <div class="py-8 px-4 mx-auto max-w-screen-xl lg:py-16 lg:px-6">
                <div class="mx-auto max-w-screen-md text-center mb-8 lg:mb-12">
                    <h2 class="mb-4 text-4xl tracking-tight font-extrabold text-gray-900 dark:text-white">Pricing Plans</h2>
                    <p class="mb-5 font-light text-white sm:text-xl ">
                        Time is the most valuable commodity. Save 100s of hours with Twixify for a fraction of what it's worth.

                    </p>
                    <div class="lg:grid lg:grid-cols-1 sm:gap-12 xl:gap-10 lg:justify-center lg:space-y-0 text-center flex ">
                        <label class="inline-flex items-center cursor-pointer">
                            <input type="checkbox" value="" class="sr-only peer" wire:model.change="planType">
                            <span class="ms-3 me-3 text-sm font-medium text-gray-900 dark:text-gray-300">Monthly</span>
                            <div class="relative w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 dark:peer-focus:ring-blue-800 rounded-full peer dark:bg-gray-700 peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:start-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-blue-600"></div>
                            <span class="ms-3 text-sm font-medium text-gray-900 dark:text-gray-300">Yearly</span>
                        </label>
                    </div>


                </div>
                <div class="space-y-8 lg:grid lg:grid-cols-3 sm:gap-6 xl:gap-10 lg:space-y-0">
                    @foreach($plans as $item)

                        @php
                            $data =  UserPlan::query()
                                     ->where('id', $item->id)
                                     ->first();

                            $id =  encrypt($item->id);
                        @endphp
                            <!-- Pricing Card -->
                        <div class="flex flex-col p-6 mx-auto max-w-lg text-center text-gray-900 rounded-lg border border-gray-100 shadow text-white">
                            <h3 class="mb-4 text-2xl font-semibold">{{ $item->name ?? '' }}</h3>
                            <p class="font-light text-white sm:text-lg ">{{ $item->description ?? '' }}</p>
                            <div class="flex justify-center items-baseline my-8">
                                <span class="mr-2 text-5xl font-extrabold">
                                    @if($planTypeMonth)
                                        ${{ $item->price ?? '' }}
                                    @else
                                        ${{ $item->y_price ?? '' }}
                                    @endif
                                </span>
                                <span class="text-gray-500 dark:text-gray-400">/

                                    @if($item->type == 'trial')
                                        Trial
                                    @elseif($planTypeMonth)
                                        Month
                                    @else
                                        Year
                                    @endif

                                    {{--                                    {{ $item->type == 'six_month' ? 'Six Months' : $item->type  }}--}}
                                </span>
                            </div>
                            <!-- List -->
                            <ul role="list" class="mb-8 space-y-4 text-left">
                                @php
                                    $features = explode(',', $item->features)
                                @endphp
                                @isset($features)
                                    @foreach($features as $row)

                                        <li class="flex items-center space-x-3">
                                            <!-- Icon -->
                                            <svg class="flex-shrink-0 w-5 h-5 text-green-500 dark:text-green-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path></svg>
                                            <span>{{ $row ?? '' }}</span>
                                        </li>
                                    @endforeach
                                @endisset
                            </ul>


                            @if(checkUserPlan($item->id))
                                <a href="#" wire:click="getAPlan({{ $item->id }})" class="text-white bg-primary-600 hover:bg-primary-700 focus:ring-4 focus:ring-primary-200 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:text-white  dark:focus:ring-primary-900">
                                    Your Current Plan
                                </a>
                            @else
                                <a wire:key="data-{{ $item->id }}"  wire:click="goTOCheckout({{ $item->id }})"  id="payment-form" style="cursor:pointer" class="text-white bg-primary-600 hover:bg-primary-700 focus:ring-4 focus:ring-primary-200 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:text-white  dark:focus:ring-primary-900">
                                    Upgrade

                                    <span wire:loading wire:target="goTOCheckout({{ $item->id }})"  class="loading loading-spinner loading-xs"></span>

                                </a>
                            @endif
                        </div>
                        <!-- Pricing Card -->
                    @endforeach
                </div>
            </div>
        </section>
    </section>

    @push('js')
        <script>

            function openSideBar(){
                alert();
            }
            // Sidebar toggle
            const dsbBtn = document.getElementById("dsb-btn");
            const dsbContainer = document.getElementById("dsb-container");

            dsbBtn.addEventListener("click", () => {
                dsbContainer.classList.toggle("dsb-open");
            });

        </script>
    @endpush
    @push('css')
        <style>
            input[type="radio"]:checked + label {
                background-color: red;
            }


            label.inline-flex.items-center.cursor-pointer.text-center {
                margin: auto;
            }

        </style>
    @endpush
</div>
