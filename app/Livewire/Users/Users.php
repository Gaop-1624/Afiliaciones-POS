<?php

namespace App\Livewire\Users;

use App\Models\User;
use Jantinnerezo\LivewireAlert\Facades\LivewireAlert;
use Livewire\Component;
use Livewire\WithPagination;

class Users extends Component
{
    use WithPagination;

    public $search, $email,  $password_confirmation, $empresa_id, $userid;
    public $name, $password, $suspended_at;

    public function suspend($userId){

        $user = User::find($userId);

        if($user->isSuspended()){
            $user->unsuspended();

            LivewireAlert::title('!Usuario Activo!')->success()->show();
        }else{
            $user->suspend();

            LivewireAlert::title('!Usuario Suspendido!')->success()->show();
        }
    }

    public function update(User $user){
       // dd($user->id);
       //   $this->userid = $user->id;
          return redirect()->route('Admin.User.Edit', ['userid' => $user->id]);
         
    } 

    public function render()
    {
        $users = User::where('empresa_id')
            ->where('id', 'like', '%'.$this->search. '%')
            ->orWhere('name', 'like', '%'.$this->search. '%') 
            ->orWhere('email', 'like', '%'.$this->search. '%') 
            ->orderBy('id','DESC')
            ->paginate(6);  

        return view('livewire.users.users', [
            'users' => $users
        ]);
    }
}
