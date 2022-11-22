<?php

namespace App\Http\Livewire\Filter;

use App\Models\Task;
use App\Models\User;
use Livewire\Component;
use function collect;

class UserTask extends Component
{
    public $users;
    public $tasks;

    public $selectedUser = null ;

    public function mount()
    {
        $this->users =  User::all();
        $this->tasks = collect();

    }
    public function render()
    {
        return view('livewire.filter.user-task');
    }

    public function updatedSelectedUser($user)
    {
        $this->tasks = Task::where("user_id", $user)->get();
    }
}
