<div class="authentication-wrapper authentication-basic container-p-y">
    <div class="authentication-inner">
    <!-- Register -->
    <div class="card">
        <div class="card-body">
        <!-- Justify -->
        <div class="app-brand justify-content-center">
            <div class="text-center mt-2 mb-2 mr-1">
                <img src="../backend\assets\img\logo\1677296607_29721_bntv_logo.png" alt="" height="40" width=200>
                
            </div>
        </div>
        <!-- /Logo (Not Done) -->

        <h4 class="mb-2">Login to your account 🔑</h4>
        <p class="mb-4">Please sign-in to your account to continue</p>

        @if(Session::get('fail'))
            <div class="alert alert-danger">
                {{ Session::get('fail') }}
            </div>
        @endif

        @if(Session::get('success'))
            <div class="alert alert-success">
                {{!! Session::get('success') !!}}
            </div>
        @endif
        
        <form id="formAuthentication" class="mb-3" wire:submit.prevent="LoginHandler()" method="post">
            <div class="mb-3">
            <label for="email" class="form-label">Email or Username</label>
            <input
                type="text"
                class="form-control"
                id="email"
                name="email-username"
                placeholder="Enter your email or username"
                autofocus
                wire:model="login_id"
            >
            @error('login_id')
                <span class="text-danger">{{ $message }}</span>
            @enderror 
            </div>
            <div class="mb-3 form-password-toggle">
            <div class="d-flex justify-content-between">
                <label class="form-label" for="password">Password</label>
                <a href="{{ route('author.forgot-password') }}">
                <small>Forgot Password?</small>
                </a>
            </div>
            <div class="input-group input-group-merge">
                <input
                type="password"
                id="password"
                class="form-control"
                name="password"
                placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                aria-describedby="password"
                wire:model="password"
                />
                <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
            </div>
            @error('password')
                <span class="text-danger">{{ $message }}</span>
            @enderror
            </div>
            {{-- <div class="mb-3">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" id="remember-me" />
                <label class="form-check-label" for="remember-me"> Remember Me </label>
            </div>
            </div> --}}
            <div class="mb-3">
            <button class="btn btn-primary d-grid w-100" type="submit">Sign in</button>
            </div>
        </form>

        <p class="text-center">
            <span>New on our platform?</span>
            <a href="auth-register-basic.html">
            <span>Create an account</span>
            </a>
        </p>
        </div>
    </div>
    <!-- /Register -->
    </div>
</div>