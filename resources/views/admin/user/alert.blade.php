@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li style="list-style: none;">{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

@if(Session::has("error"))
<div class="alert alert-danger">
    {{Session::get('error')}}
</div>
@endif