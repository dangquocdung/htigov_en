<form method="POST" action="{{ route('poll.vote', $id) }}" >
    @csrf
   <h4>{{ $question }}</h4>
   <table style="text-align:left; margin-bottom: 5px;">
        @foreach($options as $id => $name)
        <tr>
            <td>
                <label>
                    <input value="{{ $id }}" type="checkbox" name="options[]">
                    {{ $name }}
                </label>

            </td>
            
        </tr>
        @endforeach
        <tr>
            <input type="submit" class="btn btn-primary btn-sm" value="Vote" />
        </tr>
   </table>
</form>
