<div>
    <form id="formAccountSettings" method="POST" wire:submit.prevent='UpdateDetails'>
        <div class="row">
          <div class="mb-3 col-md-6">
            <label for="name" class="form-label">Name</label>
            <input
              class="form-control"
              type="text"
              id="name"
              name="name"
              wire:model='name'
              autofocus
            />
            <span class="text-danger">@error('name'){{ $message }}@enderror</span>
          </div>
          <div class="mb-3 col-md-6">
            <label for="username" class="form-label">Username</label>
            <input
              class="form-control"
              type="text"
              id="username"
              name="username"
              wire:model='username'
              disabled
              autofocus
            />
            <span class="text-danger">@error('username'){{ $message }}@enderror</span>
          </div>
          <div class="mb-3 col-md-6">
            <label for="email" class="form-label">E-mail</label>
            <input
              class="form-control"
              type="text"
              id="email"
              name="email"
              wire:model='email'
              disabled
            />
            <span class="text-danger">@error('email'){{ $message }}@enderror</span>
          </div>
          <div class="mb-3 col-md-6">
            <label for="language" class="form-label">Language</label>
            <select id="language" class="select2 form-select">
              <option value="">Select Language</option>
              <option value="en">Bahasa Indonesia</option>
              <option value="fr">English</option>
            </select>
          </div>
          <div class="mb-3 col-md-6">
            <label for="email" class="form-label">Description</label>
            <textarea
              class="form-control"
              type="text"
              id="description"
              name="description"
              wire:model='description'
              >
            </textarea>
          </div>
        </div>
        <div class="mt-2">
          <button type="submit" class="btn btn-primary me-2">Save changes</button>
          <button type="reset" class="btn btn-outline-secondary">Cancel</button>
        </div>
      </form>
</div>
