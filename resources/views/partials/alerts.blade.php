@if(session('success'))
    <div class="alert alert-primary" role="alert">
        <p>{{ session('success') }}</p>
    </div>
@endif

@if(session('empty'))
    <div class="alert alert-primary" role="alert">
        <p>{{ session('empty') }}</p>
    </div>
@endif
