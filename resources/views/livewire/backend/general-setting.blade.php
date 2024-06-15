<div>
    <div class="container-xxl flex-grow-1 container-p-y">


        <div class="card">
            <div class="card-body">


                <x-alert></x-alert>

                <div class="">

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group mb-2">
                                <label for="">Stripe Public Key</label>
                                <input type="text" class="form-control" wire:model="stripe_p">
                            </div>
                             <div class="form-group mb-3">
                                <label for="">Stripe Secret Key</label>
                                <input type="text" class="form-control" wire:model="stripe_s">
                            </div>
                             <div class="form-group">
                                <button class="btn btn-dark" wire:click="submit">Update</button>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
<!-- / Content -->


</div>
