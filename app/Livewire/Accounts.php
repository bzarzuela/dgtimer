<?php

namespace App\Livewire;

use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Str;
use Livewire\Attributes\Validate;
use Livewire\Component;

class Accounts extends Component
{
    public Collection $users;

    public string $default_password = '';

    #[Validate(['required', 'string', 'max:255'])]
    public string $name = '';

    #[Validate(['required', 'email', 'max:255', 'unique:users,email'])]
    public string $email = '';

    public function mount(): void
    {
        $this->users = User::all();
    }

    public function delete(User $user): void
    {
        $this->authorize('delete', $user);

        $user->delete();

        $this->users = User::all();
    }

    public function createUser(): void
    {
        $this->validate();

        $this->default_password = Str::password(12);

        $user = new User();
        $user->name = $this->name;
        $user->email = $this->email;
        $user->password = $this->default_password;;
        $user->save();

        $this->users = User::all();

        $this->reset('name', 'email');
    }

    public function render(): View
    {
        return view('livewire.accounts');
    }
}
