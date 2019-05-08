<form method="POST" action="{{ route('poll.vote', $id) }}" >
    @csrf
    <div class="">
        <div class="" style="padding-top: 20px">
            <h5 class="panel-title" style="line-height: 1.5em">
                {{ $question }}
            </h5>
        </div>
    </div>
    <div class="">
        <ul class="list-group" style="padding: 0 10px">
            @foreach($options as $id => $name)
                <li class="" style="padding: 0 15px">
                    <div class="radio" style="text-align:left; padding: 5px">
                        <label>
                            <input value="{{ $id }}" type="radio" name="options">
                            {{ $name }}
                        </label>
                    </div>
                </li>
            @endforeach
        </ul>
    </div>
    <div class="" style="margin-bottom: 20px">
        <input type="submit" class="btn btn-primary btn-sm" value="Bình chọn" />
    </div>
</form>
    