<div>
  
    @if(Session::get('success'))
        <div class="alert alert-success">
            {{ Session::get('success') }}
        </div>
    @endif

    <form id="formAuthentication" class="mb-3" action="index.html" method="POST" wire:submit.prevent="ForgotHandler()">
        <div class="mb-3">
          <label for="email" class="form-label">Email</label>
          <input
            type="text"
            class="form-control"
            id="email"
            name="email"
            placeholder="Enter your email"
            autofocus
            wire:model='email'
          />
          <span class="text-danger">@error('email'){{ $message }}@enderror</span>
        </div>
        <button class="btn btn-primary d-grid w-100" type="submit">Send Reset Link</button>
      </form>
      
</div>
