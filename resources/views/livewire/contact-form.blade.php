<div class="col-md-7 col-sm-6">
    <h4 class="widget-title">Send a message to us</h4>
    <div>
        @if (session()->has('email'))
            <div class="alert alert-success">
                {{ session('email') }}
            </div>
        @endif
    </div>
    <form class="contact-form" wire:submit.prevent="submit">
        <p class="full-row">
            <label for="name">Your Name:</label>
            <input type="text" id="name" name="name" wire:model="name">
            @error('name') <span class="text-danger">{{ $message }}</span> @enderror
        </p>
        <p class="full-row">
            <label for="email">Email:</label>
            <input type="text" id="email" name="email" wire:model="email">
            @error('email') <span class="text-danger">{{ $message }}</span> @enderror
        </p>
        <p class="full-row">
            <label for="subject">Subject:</label>
            <input type="text" id="subject" name="subject" maxlength="255" wire:model="subject">
            @error('subject') <span class="text-danger">{{ $message }}</span> @enderror
        </p>
        <p class="full-row">
            <label for="message">Message:</label>
            <textarea name="message" id="message" rows="6" maxlength="1000" wire:model="message"></textarea>
            @error('message') <span class="text-danger">{{ $message }}</span> @enderror
        </p>
        <input class="mainBtn" type="submit" name="" value="Send Message">
    </form>
</div>
