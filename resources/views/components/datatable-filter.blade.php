
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
        <input type="text" wire:model.live="query" class="form-control" id="basic-default-name " placeholder="搜索" required="">

        @isset($isExport)
            @if($isExport == 'true')
                <button type="button" class="btn btn-sm btn-label-github waves-effect me-2">

                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-screen-share">
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
            @endif
        @endisset
        <div class="btn-group">
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

