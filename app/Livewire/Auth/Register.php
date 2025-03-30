<?php
namespace App\Livewire\Auth;

use App\Models\Cart;
use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class Register extends Component
{
    public $name = '';
    public $email = '';
    public $password = '';
    public $password_confirmation = '';
    public $first_name = '';
    public $last_name = '';
    public $phone = '';
    public $address = '';
    public $postal_code = '';
    public $city = '';
    public $country = 'France';
    public $client_type = 'private';

    protected $rules = [
        'name' => 'required|min:3',
        'email' => 'required|email|unique:users',
        'password' => 'required|min:8|confirmed',
        'first_name' => 'required|min:2',
        'last_name' => 'required|min:2',
        'phone' => 'required',
        'address' => 'required',
        'postal_code' => 'required',
        'city' => 'required',
    ];

    public function register()
    {
        $this->validate();

        $user = User::create([
            'name' => $this->name,
            'email' => $this->email,
            'password' => Hash::make($this->password),
            'first_name' => $this->first_name,
            'last_name' => $this->last_name,
            'phone' => $this->phone,
            'address' => $this->address,
            'postal_code' => $this->postal_code,
            'city' => $this->city,
            'country' => $this->country,
            'client_type' => $this->client_type,
        ]);

        Auth::login($user);

        // Synchroniser le panier session avec l'utilisateur
        if (session()->has('cart')) {
            $cart = Cart::create(['user_id' => $user->id]);

            foreach (session('cart')['items'] as $item) {
                $cart->items()->create([
                    'product_id' => $item['id'],
                    'quantity' => $item['quantity']
                ]);
            }
        }

        $this->dispatch('showToast', [
            'message' => 'Inscription réussie! Vous êtes maintenant connecté.',
            'type' => 'success'
        ]);

        return $this->redirect(route('home'));
    }

    public function render()
    {
        return view('livewire.auth.register')->layout('components.layouts.app');
    }
}
