{{-- Message --}}
{{-- @if (Session::has('success'))
<div class="alert border-0 border-start border-5 border-success alert-dismissible fade show py-2 alert_close_btn">
    <div class="d-flex align-items-center">
        <div class="font-35 text-success"><i class='bx bxs-check-circle'></i>
        </div>
        <div class="ms-3">
            <h6 class="mb-0 text-success">{!! session::get('success') !!}</h6>
        </div>
    </div>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif
@if (Session::has('error'))
<div class="alert border-0 border-start border-5 border-danger alert-dismissible fade show py-2 alert_close_btn">
    <div class="d-flex align-items-center">
        <div class="font-35 text-danger"><i class='bx bxs-message-square-x'></i>
        </div>
        <div class="ms-3">
            <h6 class="mb-0 text-danger ">{!! session::get('error') !!}</h6>
        </div>
    </div>
    <button type="button" class="btn-close " data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif --}}



@if ($errors->any())
    <div class="alert alert-danger " role="alert" style="background-color: #f8d7da; color: #721c24;">
        <strong>There were some problems with your input:</strong>
       
        <button type="button" class="close" data-dismiss="alert">
            <span aria-hidden="true">&times;</span><span class="sr-only">Close</span>
        </button>

        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif


{{-- Message --}}
@if (Session::has('success'))

<div class="alert alert-success" role="alert">
    <button type="button" class="close alert_close_btn" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
    <strong>{!! session::get('success') !!}</strong>
</div>

@endif
@if (Session::has('error'))
<div class="alert alert-danger" role="alert">
    <button type="button" class="close alert_close_btn" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
    <strong>{!! session::get('error') !!}</strong>
</div>

@endif