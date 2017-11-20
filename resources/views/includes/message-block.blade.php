@if(count($errors) > 0)
    <div class="row">
        <div class="col-md-4 col-md-offset-4" style="border: 1px solid red; background-color: #d1f9da; color: red; text-align: center;">
            <ul style="list-style: none; margin: 0; padding: 0;">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    </div>
@endif

@if(Session::has('message'))
    <div class="row">
        <div class="col-md-4 col-md-offset-4" style="border: 1px solid red; background-color: #d1f9da; color: green; text-align: center;">
            {{ Session::get('message') }}
        </div>
    </div>
@endif