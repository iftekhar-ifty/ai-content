<div class="modal fade" id="deletedModal" tabindex="-1" aria-hidden="true" wire:ignore>
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button
                    type="button"
                    class="btn-close"
                    data-bs-dismiss="modal"
                    aria-label="Close"></button>
            </div>

                <div class="modal-body p-0">
                    <div class="row text-center">
                        <div class="col mb-3">
                            <p>Are you sure ？</p>
                            <p>You want to deleted it ？</p>
                            <button type="button" class="mr-2 btn btn-label-secondary" data-bs-dismiss="modal">
                                Close
                            </button>
                            <button wire:click="deleteItem" type="submit" class="btn btn-danger"> Delete</button>
                        </div>
                    </div>

                </div>

        </div>
    </div>
</div>
