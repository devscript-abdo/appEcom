@if (session()->has('good'))
    <div class="alert alert-primary">
        <ul>
                <li>{{ session('good') }}</li>
        </ul>
    </div>
@endif

@if (session()->has('error'))
    <div class="alert alert-danger">
        <ul>
                <li>{{ session('error') }}</li>
        </ul>
    </div>
@endif