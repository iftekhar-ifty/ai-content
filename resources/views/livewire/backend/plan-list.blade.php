<div>
    <div class="container-xxl flex-grow-1 container-p-y">


        <div class="card">
            <div class="card-body">
                <div class="row py-4">
                    <x-datatable-filter
                        tableTitle="All Plan"
                        actionBtn="Add"
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
                            <th>Price</th>
                            <th>Type</th>
                            <th>Status</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody style="text-align: center;">
                        @foreach($rows as $key => $item)
                            <tr>
                                <td> <input type="checkbox" class="customCheckBox"> </td>
                                <td> {{$key + 1}}</td>

                                <td>{{ $item->name ?? '' }}</td>
                                <td>{{ $item->price ?? '' }}</td>
                                <td>{{ $item->type ?? '' }}</td>
                                <td>
                                    @if($item->status == 0)
                                        <span class="badge bg-primary">Active</span>
                                    @else
                                        <span class="badge bg-danger">Inactive</span>
                                    @endif
                                </td>
                                <td>
                                    <div class="dropdown">
                                        <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                            <i class="ti ti-dots-vertical"></i>
                                        </button>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item" wire:click="edit({{ $item->id }})" data-bs-toggle="modal"
                                               data-bs-target="#basicModal" href="javascript:void(0);"
                                            ><i class="ti ti-pencil me-1"></i> Edit</a
                                            >
                                            <a class="dropdown-item" wire:click="delete({{ $item->id }})"   data-bs-toggle="modal"
                                               data-bs-target="#deletedModal" href="javascript:void(0);"
                                            ><i class="ti ti-trash me-1"></i> Delete</a
                                            >
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <x-delete-action item="{{$item->id}}" ></x-delete-action>
                        @endforeach

                        </tbody>
                    </table>

                    {{ $rows->links() }}
                    <div>
                        <!-- Bootstrap modals -->
                        <div class="card mb-4">

                            <div class="card-body">
                                <div class="row gy-3">
                                    <!-- Default Modal -->
                                    <div class="col-lg-4 col-md-6">

                                        <div class="modal fade" id="basicModal" tabindex="-1" aria-hidden="true" wire:ignore.self>
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel1">Plan Details</h5>
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
                                                            <div class="form-group col-md-6 mb-2">
                                                                <label for="">Plan name</label>
                                                                <input type="text" class="form-control" placeholder="Enter plan name" wire:model="name">
                                                            </div>
                                                             <div class="form-group col-md-6 mb-2">
                                                                <label for="">Price</label>
                                                                <input type="text" class="form-control" placeholder="Enter plan name" wire:model="price">
                                                            </div>
                                                             <div class="form-group col-md-12 mb-2">
                                                                <label for="">Plan Type</label>
                                                                 <select name="" wire:model="type" class="form-control" >
                                                                     <option value="">Select</option>
                                                                     <option value="trial">Trial version</option>
                                                                     <option value="one_month">One Month</option>
                                                                     <option value="four_month">Four Month</option>
                                                                     <option value="six_month">Six Month</option>
                                                                     <option value="one_year">One Year</option>
                                                                 </select>
                                                            </div>
                                                            <div class="form-group col-md-12 mb-2">
                                                                <label for="">Plan Status</label>
                                                                 <select name="" wire:model="status" class="form-control" >
                                                                     <option value="">Select</option>
                                                                     <option value="0">Active</option>
                                                                     <option value="1">Inactive</option>
                                                                 </select>
                                                            </div>



                                                        </div>

                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-label-secondary" data-bs-dismiss="modal">
                                                            Close
                                                        </button>
                                                        <button type="button" wire:click="submit" class="btn btn-primary">Save</button>
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
