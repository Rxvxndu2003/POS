<footer class="main-footer">
    <div class="pull-right hidden-xs">
        <b>Version</b> 1.0.00
    </div>
    @php
    $setting = new stdClass(); // Mocking the $setting object for this example
    $setting->nama_perusahaan = "TRIO"; // Set company name as "TRIO"

    $word = strtoupper($setting->nama_perusahaan); // This will output "TRIO"
    echo $word;
@endphp

    <strong>&copy; {{ date('Y') }} <a href="/">{{ $setting->nama_perusahaan }}</a>.</strong> All rights
    reserved.
</footer>