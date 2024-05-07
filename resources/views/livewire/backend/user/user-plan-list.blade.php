<div>
    <section class="section-py first-section-pt">
        <div class="container ">

            {{--        <div class="d-flex align-items-center justify-content-center flex-wrap gap-2 pb-5 pt-3 mb-0 mb-md-4">--}}
            {{--          <label class="switch switch-primary ms-3 ms-sm-0 mt-2">--}}
            {{--            <span class="switch-label">Monthly</span>--}}
            {{--            <input type="checkbox" class="switch-input price-duration-toggler" checked="">--}}
            {{--            <span class="switch-toggle-slider">--}}
            {{--              <span class="switch-on"></span>--}}
            {{--              <span class="switch-off"></span>--}}
            {{--            </span>--}}
            {{--            <span class="switch-label">Annual</span>--}}
            {{--          </label>--}}
            {{--          <div class="mt-n5 ms-n5 d-none d-sm-block">--}}
            {{--            <i class="ti ti-corner-left-down ti-sm text-muted me-1 scaleX-n1-rtl"></i>--}}
            {{--            <span class="badge badge-sm bg-label-primary">Save up to 10%</span>--}}
            {{--          </div>--}}
            {{--        </div>--}}

            <div class="row mx-0 gy-3 px-lg-5 mt-5">
                @foreach($plans as $item)
                    <!-- Basic -->
                    @if($item->serial == 1)
                        <div class="col-lg mb-md-0 mb-4">
                            <div class="card border rounded shadow-none">
                                <div class="card-body">
                                    <div class="my-3 pt-2 text-center">
                                        <img src="../../assets/img/illustrations/page-pricing-basic.png" alt="Basic Image" height="140">
                                    </div>
                                    <h3 class="card-title text-center text-capitalize mb-1">{{ $item->name ?? '' }}</h3>
                                    <p class="text-center">A simple start for everyone</p>
                                    <div class="text-center">
                                        <div class="d-flex justify-content-center">
                                            <sup class="h6 pricing-currency mt-3 mb-0 me-1 text-primary">$</sup>
                                            <h1 class="display-4 mb-0 text-primary">{{ $item->price ?? '' }}</h1>
                                            <sub class="h6 pricing-duration mt-auto mb-2 text-muted fw-normal">/{{ $item->type ?? '' }}</sub>
                                        </div>
{{--                                        <small class="price-yearly price-yearly-toggle text-muted">$ {{ $item->price ?? '' }} / year</small>--}}
                                    </div>

                                    {{--                <ul class="ps-0 my-4 pt-2 circle-bullets">--}}
                                    {{--                  <li class="mb-2 d-flex align-items-center"><i class="ti ti-point ti-lg"></i>100 responses a month</li>--}}
                                    {{--                  <li class="mb-2 d-flex align-items-center">--}}
                                    {{--                    <i class="ti ti-point ti-lg"></i>Unlimited forms and surveys--}}
                                    {{--                  </li>--}}
                                    {{--                  <li class="mb-2 d-flex align-items-center"><i class="ti ti-point ti-lg"></i>Unlimited fields</li>--}}
                                    {{--                  <li class="mb-2 d-flex align-items-center">--}}
                                    {{--                    <i class="ti ti-point ti-lg"></i>Basic form creation tools--}}
                                    {{--                  </li>--}}
                                    {{--                  <li class="mb-0 d-flex align-items-center"><i class="ti ti-point ti-lg"></i>Up to 2 subdomains</li>--}}
                                    {{--                </ul>--}}
                                    <a href="" class="btn btn-label-success d-grid w-100 waves-effect">Your Current Plan</a>
                                </div>
                            </div>
                        </div>
                    @endif
                    <!-- Pro -->
                    @if($item->serial == 2)
                        <div class="col-lg mb-md-0 mb-4">
                            <div class="card border-primary border shadow-none">
                                <div class="card-body position-relative">
                                    <div class="position-absolute end-0 me-4 top-0 mt-4">
                                        <span class="badge bg-label-primary">Popular</span>
                                    </div>
                                    <div class="my-3 pt-2 text-center">
                                        <img src="../../assets/img/illustrations/page-pricing-standard.png" alt="Standard Image" height="140">
                                    </div>
                                    <h3 class="card-title text-center text-capitalize mb-1">{{ $item->name ?? '' }}</h3>
                                    <p class="text-center">For small to medium businesses</p>
                                    <div class="text-center">
                                        <div class="d-flex justify-content-center">
                                            <sup class="h6 pricing-currency mt-3 mb-0 me-1 text-primary">$</sup>
                                            <h1 class="price-toggle price-yearly display-4 text-primary mb-0">{{ $item->price ?? '' }}</h1>
                                            <h1 class="price-toggle price-monthly display-4 text-primary mb-0 d-none">9</h1>
                                            <sub class="h6 text-muted pricing-duration mt-auto mb-2 fw-normal">/
                                                @if($item->type == 'six_month')
                                                    6 month
                                                @elseif($item->type == 'one_month')
                                                    1 month
                                                @elseif($item->type == 'four_month')
                                                    4 month
                                                @elseif($item->type == 'one_year')
                                                    1 year
                                                @endif

                                              </sub>
                                        </div>
{{--                                        <small class="price-yearly price-yearly-toggle text-muted">$ 90 / year</small>--}}
                                    </div>

                                    {{--                <ul class="ps-0 my-4 pt-2 circle-bullets">--}}
                                    {{--                  <li class="mb-2 d-flex align-items-center"><i class="ti ti-point ti-lg"></i>Up to 5 users</li>--}}
                                    {{--                  <li class="mb-2 d-flex align-items-center"><i class="ti ti-point ti-lg"></i>120+ components</li>--}}
                                    {{--                  <li class="mb-2 d-flex align-items-center">--}}
                                    {{--                    <i class="ti ti-point ti-lg"></i>Basic support on Github--}}
                                    {{--                  </li>--}}
                                    {{--                  <li class="mb-2 d-flex align-items-center"><i class="ti ti-point ti-lg"></i>Monthly updates</li>--}}
                                    {{--                  <li class="mb-0 d-flex align-items-center"><i class="ti ti-point ti-lg"></i>Integrations</li>--}}
                                    {{--                </ul>--}}

                                    <a href="/user/payment/{{ $item->id }}" class="btn btn-primary d-grid w-100 waves-effect waves-light">Upgrade</a>
                                </div>
                            </div>
                        </div>
                    @endif
                    <!-- Enterprise -->
                    @if($item->serial == 3)
                        <div class="col-lg">
                            <div class="card border rounded shadow-none">
                                <div class="card-body">
                                    <div class="my-3 pt-2 text-center">
                                        <img src="../../assets/img/illustrations/page-pricing-enterprise.png" alt="Enterprise Image" height="140">
                                    </div>
                                    <h3 class="card-title text-center text-capitalize mb-1">Enterprise</h3>
                                    <p class="text-center">Solution for big organizations</p>

                                    <div class="text-center">
                                        <div class="d-flex justify-content-center">
                                            <sup class="h6 text-primary pricing-currency mt-3 mb-0 me-1">$</sup>
                                            <h1 class="price-toggle price-yearly display-4 text-primary mb-0">16</h1>
                                            <h1 class="price-toggle price-monthly display-4 text-primary mb-0 d-none">19</h1>
                                            <sub class="h6 pricing-duration mt-auto mb-2 fw-normal text-muted">/month</sub>
                                        </div>
                                        <small class="price-yearly price-yearly-toggle text-muted">$ 190 / year</small>
                                    </div>

                                    {{--                <ul class="ps-0 my-4 pt-2 circle-bullets">--}}
                                    {{--                  <li class="mb-2 d-flex align-items-center"><i class="ti ti-point ti-lg"></i>Up to 10 users</li>--}}
                                    {{--                  <li class="mb-2 d-flex align-items-center"><i class="ti ti-point ti-lg"></i>150+ components</li>--}}
                                    {{--                  <li class="mb-2 d-flex align-items-center">--}}
                                    {{--                    <i class="ti ti-point ti-lg"></i>Basic support on Github--}}
                                    {{--                  </li>--}}
                                    {{--                  <li class="mb-2 d-flex align-items-center"><i class="ti ti-point ti-lg"></i>Monthly updates</li>--}}
                                    {{--                  <li class="mb-0 d-flex align-items-center"><i class="ti ti-point ti-lg"></i>Speedy build tooling</li>--}}
                                    {{--                </ul>--}}

                                    <a href="payment-page.html" class="btn btn-label-primary d-grid w-100 waves-effect">Upgrade</a>
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
    </section>
</div>
