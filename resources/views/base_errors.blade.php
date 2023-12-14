
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
