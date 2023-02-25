<div>
    <form method="POST" wire:submit.prevent='updateGeneralSettings()'>
        <div class="mb-3">
            <label for="defaultFormControlInput" class="form-label">Blog's Name</label>
            <input type="text" class="form-control" id="defaultFormControlInput" placeholder="John Doe" aria-describedby="defaultFormControlHelp" wire:model='blog_name' />
            <span class="text-danger">@error('blog_name'){{ $message }}@enderror</span>
          </div>
          <div class="mb-3">
            <label for="defaultFormControlInput" class="form-label">Blog's Email</label>
            <input type="text" class="form-control" id="defaultFormControlInput" placeholder="John Doe" aria-describedby="defaultFormControlHelp"
            wire:model='blog_email' />
            <span class="text-danger">@error('blog_email'){{ $message }}@enderror</span>
          </div>
          <div>
            <label for="exampleFormControlTextarea1" class="form-label">Blog's Description</label>
            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" wire:model='blog_desc'></textarea>
            <span class="text-danger">@error('blog_desc'){{ $message }}@enderror</span>
          </div>

          <div class="button-wrapper mt-4">
          <button type="submit" class="btn btn-outline-primary">Save</button>
          </div>
    </form>
</div>
