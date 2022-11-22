<div>
    {{-- Nothing in the world is as soft and yielding as water. --}}

    <select name="users" id="users" wire:model="selectedUser" class="form-control">
        <option value="" selected>Choose User</option>
        @foreach($users as $user)
            <option value="{{$user->id}}"> {{ $user->name }}</option>
        @endforeach
    </select>
    <br>

    @if(!is_null($selectedUser))

        <select name="tasks" id="tasks"  class="form-control">
            <option value="" selected>Choose Tasks</option>
            @foreach($tasks as $task)
                <option value="{{$task->id}}"> {{ $task->title }}</option>
            @endforeach
        </select>
   @endif


</div>
