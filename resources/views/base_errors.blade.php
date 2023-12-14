@if (session()->has('success') || session()->has('error'))
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            @if (session()->has('success'))
                alert("{{ session('success') }}");
            @endif
            @if (session()->has('error'))
                alert("{{ session('error') }}");
            @endif
        });
    </script>
@endif
