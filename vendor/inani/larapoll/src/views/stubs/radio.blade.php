<form method="POST" action="{{ route('poll.vote', $id) }}" >
        @csrf
        <div class="">
            <div class="panel-heading">
                <h5 class="panel-title">
                    {{ $question }}
                </h5>
            </div>
        </div>
        <div class="">
            <ul class="list-group">
                @foreach($options as $id => $name)
                    <li class="" style="padding: 10px 15px">
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
        <div class="mb-20">
            <input type="submit" class="btn btn-primary btn-sm" value="Vote" />
        </div>
    </form>
    