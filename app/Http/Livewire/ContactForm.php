<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Mail;
use Livewire\Component;

class ContactForm extends Component
{
    public $name;
    public $email;
    public $subject;
    public $message;

    protected $rules = [
        'name' => 'required|min:3',
        'email' => 'required|email',
        'subject' => 'required|max:255',
        'message' => 'required|max:1000',
    ];

    public function submit()
    {
        $fields = $this->validate();

        $data = ['name' => $fields['name'], 'data' => $fields['message']];
        $user = ['email' => $fields['email'], 'subject' => $fields['subject']];

        try {
            Mail::send('mail', $data, function ($message) use ($user) {
                $message->to('info@mumarsah.com', 'Info');
                $message->replyTo($user['email']);
                $message->subject($user['subject']);
            });
            session()->flash('email', 'Email was sent successfully.');
            $this->reset();
        } catch (\Throwable $th) {
            // throw $th;
        }

    }

    public function render()
    {
        return view('livewire.contact-form');
    }
}
