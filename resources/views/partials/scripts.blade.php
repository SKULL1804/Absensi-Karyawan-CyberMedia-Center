{{-- Bootstrap 5.2 JS --}}
<script src="{{ asset('bootstrap5.2/js/bootstrap.bundle.min.js') }}"></script>

{{-- FeaterIcons --}}
<script src="https://unpkg.com/feather-icons"></script>
<script src="https://cdn.jsdelivr.net/npm/feather-icons/dist/feather.min.js"></script>

<script>
    feather.replace({ 'aria-hidden': 'true' })
</script>

{{-- Main JS --}}
<script type="module" src="{{ asset('js/main.js') }}"></script>
{{-- Livewire JS --}}
@livewireScripts
