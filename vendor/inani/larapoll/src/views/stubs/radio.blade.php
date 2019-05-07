<form method="POST" action="{{ route('poll.vote', $id) }}" >
    @csrf
    
    <h5 class="panel-title">
        {{ $question }}
    </h5>
       
    <div class="panel-body">
        <ul class="list-group">
            @foreach($options as $id => $name)
                <li class="list-group-item">
                    <div class="radio">
                        <label>
                            <input value="{{ $id }}" type="radio" name="options">
                            {{ $name }}
                        </label>
                    </div>
                </li>
            @endforeach
        </ul>
    </div>
    <div class="panel-footer">
        <input type="submit" class="btn btn-primary btn-sm" value="Vote" />
    </div>
</form>
