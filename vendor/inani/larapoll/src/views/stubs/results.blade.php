@if(Session::has('errors'))
    <div class="alert alert-danger">
            {{ session('errors') }}
    </div>
@endif
@if(Session::has('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<<div class="" style="padding-top: 20px">
    <h5 class="panel-title" style="line-height: 1.5em">
        {{ $question }}
    </h5>
</div>

<div style="padding:10px">



@foreach($options as $option)
    <div class='result-option-id'>
        <span style="text-align:left">{{ $option->name }}</span>
        <span class='pull-right'>{{ $option->percent }}%</span>
        <div class='progress'>
            <div class='progress-bar progress-bar-striped active' role='progressbar' aria-valuenow='{{ $option->percent }}' aria-valuemin='0' aria-valuemax='100' style='width: {{ $option->percent }}%'>
                <span class='sr-only'>{{ $option->percent }}% Complete</span>
            </div>
        </div>
    </div>
@endforeach

</div>
