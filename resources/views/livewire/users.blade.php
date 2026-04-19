<div>

    <h1> this is user component</h1>
    @foreach($data as  $value)
        @livewire('users-listing', ['data' => $value])
    @endforeach

</div>
