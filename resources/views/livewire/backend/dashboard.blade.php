<div>

    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row">


            <!-- Sales Overview -->
            <div class="col-lg-3 col-sm-6 mb-4">
                <a href="/local-order-list">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between w-100 gap-2 align-items-center">
                                <div class="me-2">
                                    <h6 class="mb-0">Suscrptions</h6>
                                    <small class="text-muted">Total</small>
                                </div>
                                <p style="font-size:24px">2</p>

                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-lg-3 col-sm-6 mb-4">
                <a href="/car-order-list">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between w-100 gap-2 align-items-center">
                                <div class="me-2">
                                    <h6 class="mb-0">Customer</h6>
                                    <small class="text-muted">Total</small>
                                </div>
                                <p style="font-size:24px">2</p>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-lg-3 col-sm-6 mb-4">
                <a href="tour-order-list">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between w-100 gap-2 align-items-center">
                                <div class="me-2">
                                    <h6 class="mb-0">Plan</h6>
                                    <small class="text-muted">Total</small>
                                </div>
                                <p style="font-size:24px">2</p>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-lg-3 col-sm-6 mb-4">
                <a href="/others">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between w-100 gap-2 align-items-center">
                                <div class="me-2">
                                    <h6 class="mb-0">Other</h6>
                                    <small class="text-muted">Total</small>
                                </div>
                                <p style="font-size:24px">2</p>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <!--/ Sales Overview -->




            <div class="col-12">
                <!-- Bootstrap Table with Caption -->
                <div class="card card-body">
                    <h5 class="pt-2">All Orders</h5>
                    <p> Filters</p>
                    <div class="row pb-2">

                        <div class="col-md-3 mb-2">
                            <select class="form-select" wire:model.change="service_filter" id="basic-default-country"
                                required="">
                                <option value=""> / Service</option>
                                <option value="local">Local</option>
                                <option value="car">Car</option>
                                <option value="tour">Tour</option>
                                <option value="other">Other</option>
                            </select>
                        </div>
                        <div class="col-md-3">
                            <button class="btn btn-primary" wire:click="resetFilter">Reset</button>
                        </div>

                    </div>

                    <div class="row py-4">
                        <div class="col-md-2 mb-2">
                            <div>
                                <select class="form-select" id="basic-default-country" required="">
                                    <option value="">10</option>
                                    <option value="">25</option>
                                    <option value="">36</option>
                                    <option value="">50</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3"></div>
                        <div class="col-md-7 mb-2">

                            <div class="d-flex">
                                <input type="text" class="form-control" wire:model.live="query"
                                    id="basic-default-name " placeholder="搜索" required="">

                                <button type="button" class="btn btn-sm btn-label-github waves-effect me-2">

                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1"
                                        stroke-linecap="round" stroke-linejoin="round"
                                        class="icon icon-tabler icons-tabler-outline icon-tabler-screen-share">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                        <path d="M21 12v3a1 1 0 0 1 -1 1h-16a1 1 0 0 1 -1 -1v-10a1 1 0 0 1 1 -1h9" />
                                        <path d="M7 20l10 0" />
                                        <path d="M9 16l0 4" />
                                        <path d="M15 16l0 4" />
                                        <path d="M17 4h4v4" />
                                        <path d="M16 9l5 -5" />
                                    </svg>
                                    Export
                                </button>

                                <div class="btn-group">
                                    <button type="button"
                                        class="btn btn-sm btn-primary dropdown-toggle waves-effect waves-light"
                                        data-bs-toggle="dropdown" aria-expanded="false">
                                        Create Order
                                    </button>
                                    <ul class="dropdown-menu" style="">
                                        <li><a class="dropdown-item" href="/local-order-list"> / Local</a></li>
                                        <li><a class="dropdown-item" href="/car-order-list"> / Car</a></li>
                                        <li><a class="dropdown-item " href="/tour-order-list"> / Tour</a></li>
                                        <li><a class="dropdown-item " href="/others-order-list"> / Rest</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>


                    </div>




                    <div class="table-responsive text-nowrap">
                        <table class="table table-border-bottom-0">
                            <caption class="ms-4">
                                {{--                                List of Projects --}}
                            </caption>
                            <thead style="background: #f2f2f2;text-align: center;">
                                <tr>
                                    <th> <input type="checkbox" class="customCheckBox"> </th>
                                    <th>ID</th>
                                    <th>Date</th>
                                    <th>customer</th>
                                    <th>Service</th>
                                    <th>Pax</th>
                                    <th>Supplier</th>
                                    <th>status</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody style="text-align: center;">

                            </tbody>
                        </table>

                    </div>
                </div>
                <!-- Bootstrap Table with Caption -->
            </div>
        </div>
    </div>
    <!-- / Content -->
    @push('css')
        <style>
            input#basic-default-name\  {
                width: 60%;
                margin-right: 11px;
            }
        </style>
    @endpush
</div>
