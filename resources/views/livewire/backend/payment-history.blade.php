<div>
    <div class="container-xxl flex-grow-1 container-p-y">


        <div class="card">
            <div class="card-body">
                <div class="row py-4">
                    <x-datatable-filter
                        isExport="true"
                    ></x-datatable-filter>
                </div>

                <x-alert></x-alert>

                <div class="table-responsive text-nowrap">
                    <table class="table table-border-bottom-0">
                        <caption class="ms-4">
                            {{--                            <x-pagination :paginator="$destination" />--}}
                        </caption>
                        <thead style="background: #f2f2f2;text-align: center;">
                        <tr>
                            <th> <input type="checkbox" class="customCheckBox"> </th>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Plan</th>
                            <th>Payment ID</th>
                            <th>Amount</th>
                            <th>Plan</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody style="text-align: center;">
                        @foreach($payments as $key => $item)
                            <tr>
                                <td> <input type="checkbox" class="customCheckBox"> </td>
                                <td> {{$key + 1}}</td>

                                <td>{{ $item->user->name ?? '' }}</td>
                                <td>{{ $item->plan->name ?? '' }}</td>
                                <td>{{ $item->payment_id ?? '' }}</td>
                                <td>$ {{ $item->amount / 100 ?? '' }}</td>
                                <td><span class="badge bg-primary">{{ $item->status ?? '' }}</span></td>
                                <td>
                                    <div class="dropdown">
                                        <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                            <i class="ti ti-dots-vertical"></i>
                                        </button>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item" wire:click="edit({{ $item->id }})" data-bs-toggle="modal"
                                               data-bs-target="#basicModal" href="javascript:void(0);"
                                            ><i class="ti ti-eye me-1"></i> view</a
                                            >
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <x-delete-action item="{{$item->id}}" ></x-delete-action>
                        @endforeach

                        </tbody>
                    </table>

                    {{ $payments->links() }}
                    <div>
                        <!-- Bootstrap modals -->
                        <div class="card mb-4">

                            <div class="card-body">
                                <div class="row gy-3">
                                    <!-- Default Modal -->
                                    <div class="col-lg-6 col-md-6">

                                        <div class="modal fade" id="basicModal" tabindex="-1" aria-hidden="true" wire:ignore.self>
                                            <div class="modal-dialog modal-lg" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel1">Payment Details</h5>
                                                        <button
                                                            type="button"
                                                            class="btn-close"
                                                            data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>

                                                    <div class="modal-body">
                                                        <div class="row">
                                                            <div class="col-12">
                                                                @if (session('status'))
                                                                    <div class="alert alert-success">
                                                                        {{ session('status') }}
                                                                    </div>
                                                                @endif
                                                            </div>
                                                            <div class="row">
                                                                <div class="form-group col-md-6">
                                                                    <label for="">Customer Name</label>
                                                                    <input type="text" class="form-control" value="" wire:model="user_name" >
                                                                </div>


                                                                <div class="form-group col-md-6">
                                                                    <label for="">Plan Name</label>
                                                                    <input type="text" class="form-control" value="" wire:model="plan_name" >
                                                                </div>


                                                                <div class="form-group col-md-6">
                                                                    <label for="">Payment ID</label>
                                                                    <input type="text" class="form-control" value="" wire:model="payment_id" >
                                                                </div>


                                                                <div class="form-group col-md-6">
                                                                    <label for="">Amount</label>
                                                                    <input type="text" class="form-control" value="" wire:model="amount" >
                                                                </div>


                                                                <div class="form-group col-md-6">
                                                                    <label for="">Currency</label>
                                                                    <input type="text" class="form-control" value="" wire:model="currency" >
                                                                </div>


                                                                <div class="form-group col-md-6">
                                                                    <label for="">Status</label>
                                                                    <input type="text" class="form-control" value="" wire:model="status" >
                                                                </div>


                                                                <div class="form-group col-md-6">
                                                                    <label for="">Confirmation Method</label>
                                                                    <input type="text" class="form-control" value="" wire:model="confirmation_method" >
                                                                </div>
                                                            </div>

                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-label-secondary" data-bs-dismiss="modal">
                                                                Close
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>

                        </div>
                        <!--/ Bootstrap modals -->
                    </div>

                </div>
            </div>
        </div>
    </div>
    <!-- / Content -->


</div>
