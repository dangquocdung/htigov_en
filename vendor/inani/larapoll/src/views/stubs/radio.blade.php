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
        <div class="mb-20">
            <input type="submit" class="btn btn-primary btn-sm" value="Vote" />
        </div>
    </form>
    