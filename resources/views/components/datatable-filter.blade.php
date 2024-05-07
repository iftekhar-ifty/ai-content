
<div class="mb-3">
    <h5 class="mb-0">{{ $tableTitle ?? '' }}</h5>
</div>
<div class="col-md-2 mb-2">
    <div>
        <select wire:model.live="perPage" class="form-select" id="basic-default-country" required="">
            <option value="10">10</option>
            <option value="25">25</option>
            <option value="36">36</option>
            <option value="50">50</option>
        </select>
    </div>
</div>
<div class="col-md-5"></div>
<div class="col-md-5 mb-2">

    <div class="d-flex">
        <input type="text" wire:model.live="query" class="form-control  me-3" id="basic-default-name " placeholder="Search" required="">


        <div class=" btn-group">
            @if(isset($isUrl))
                <a href="{{$isUrl ?? ''}}"
                   class="btn btn-sm btn-primary  waves-effect waves-light">
                    {{ $actionBtn ?? '' }}
                </a>

            @else
                <button wire:click="create" type="button"
                        class="btn btn-sm btn-primary  waves-effect waves-light"
                        data-bs-toggle="modal"
                        data-bs-target="#basicModal">
                    {{ $actionBtn ?? '' }}
                </button>
            @endif
        </div>
    </div>
</div>

