<meta name="csrf-token" content="{{ csrf_token() }}">

@foreach(config('backup.libraries.stylesheets', []) as $css)
    <link href="{{ url($css) }}" rel="stylesheet" type="text/css"/>
@endforeach

<div class="backup-wrapper">
    <div class="box box-info">
        <div class="box-header with-border">
            <h3 class="box-title">{{ __('Backup management') }}</h3>
        </div>
        <div class="box-body">
            @yield('backup-content')
        </div>
    </div>
</div>

<script type="text/javascript">
    'use strict';
    var Botble = Botble || {};
    Botble.languages = {
        'notices_msg': {!! json_encode(trans('backup::backup.notices'), JSON_HEX_APOS) !!},
        'character_remain': '{{ trans('backup::backup.character_remain') }}'
    };
</script>

@foreach(config('backup.libraries.javascript', []) as $js)
    <script src="{{ url($js) }}" type="text/javascript"></script>
@endforeach

@if (session()->has('success_msg') || session()->has('error_msg') || isset($errors) || isset($error_msg))
    <script type="text/javascript">
        'use strict';
        $(document).ready(function () {
            @if (session()->has('success_msg'))
                Botble.showNotice('success', '{{ session('success_msg') }}', Botble.languages.notices_msg.success);
            @endif
            @if (session()->has('error_msg'))
                Botble.showNotice('error', '{{ session('error_msg') }}', Botble.languages.notices_msg.error);
            @endif
            @if (isset($error_msg))
                Botble.showNotice('error', '{{ $error_msg }}', Botble.languages.notices_msg.error);
            @endif
            @if (isset($errors))
                @foreach ($errors->all() as $error)
                    Botble.showNotice('error', '{{ $error }}', Botble.languages.notices_msg.error);
                @endforeach
            @endif
        });
    </script>
@endif