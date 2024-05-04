@if (session('delete_msg'))
    <div class="alert alert-danger">
        {{ session('delete_msg') }}
    </div>
@endif
@if (session('status'))
    <div class="alert alert-primary">
        {{ session('status') }}
    </div>
@endif
@if (session('success'))
    <div class="alert alert-primary">
        {{ session('success') }}
    </div>
@endif

@if (session('error'))
    <div class="alert alert-primary">
        {{ session('error') }}
    </div>
@endif

