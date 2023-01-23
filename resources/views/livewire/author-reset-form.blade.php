<div class="authentication-wrapper authentication-basic container-p-y">
    <div class="authentication-inner">
    <!-- Register -->
    <div class="card">
        <div class="card-body">
        <!-- Justify -->
        <div class="app-brand justify-content-center">
        </div>
        <!-- /Logo (Not Done) -->
        <h4 class="mb-2">Change account password 🔑</h4>
        <p class="mb-4">Please enter a new password to continue</p>

        @if (Session::get('fail'))
            <div class="alert alert-danger">
                {!! Session::get('fail') !!}
            </div>
        @endif

        @if (Session::get('success'))
            <div class="alert alert-success">
                {!! Session::get('success') !!}
            </div>
        @endif

        <form id="formAuthentication" class="mb-3" method="post" wire:submit.prevent='ResetHandler()' >
            <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input
                type="text"
                class="form-control"
                id="email"
                name="email-username"
                placeholder="Enter your email or username"
                wire:model='email' disabled
                autofocus
            >
            <span class="text-danger">@error('email'){{ $message }}@enderror</span>
            </div>
            <div class="mb-3 form-password-toggle">
            <div class="d-flex justify-content-between">
                <label class="form-label" for="password">New Password</label>
            </div>
            <div class="input-group input-group-merge">
                <input
                type="password"
                id="password"
                class="form-control"
                name="password"
                placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                aria-describedby="password"
                wire:model="new_password"
                />
                <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
            </div>
            <span class="text-danger">@error('new_password'){{ $message }}@enderror</span>
            </div>
            <div class="mb-3 form-password-toggle">
                <div class="d-flex justify-content-between">
                    <label class="form-label" for="password">Confirm Password</label>
                </div>
                <div class="input-group input-group-merge">
                    <input
                    type="password"
                    id="password"
                    class="form-control"
                    name="password"
                    placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                    aria-describedby="password"
                    wire:model="confirm_new_password"
                    />
                    <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                </div>
                <span class="text-danger">@error('confirm_new_password'){{ $message }}@enderror</span>
            </div>
            <a href="{{ route('author.login') }}">Back to login page</a>
            <div class="mb-3">
            <button class="btn btn-primary d-grid w-100" type="submit">Reset Password</button>
            </div>
        </form>
        
        </div>
    </div>
    <!-- /Register -->
    </div>
</div>
