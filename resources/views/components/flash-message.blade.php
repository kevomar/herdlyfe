@if(session()->has('success'))
    <div class="fixed top-0 left-1/2 transform -translate-x-1/2 fade show bg-green-500 text-white p-6"
     role="alert" x-data="{show: true}" x-init="setTimeout(() => show = false, 1000)" x-show="show">
        <strong>Success!</strong> {{ session()->get('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif  