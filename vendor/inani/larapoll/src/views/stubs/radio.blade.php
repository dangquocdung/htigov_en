<form method="POST" action="{{ route('poll.vote', $id) }}" >
    @csrf
    
    <h4>
        <span class="glyphicon glyphicon-arrow-right"></span> {{ $question }}
    </h4>
        
    
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
    
    
        <input type="submit" class="btn btn-primary btn-sm" value="Vote" />
    
</form>
