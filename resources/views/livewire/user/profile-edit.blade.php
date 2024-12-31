<form wire:submit.prevent="saveChanges">
    <div class="row mb-3">
        <label for="firstName" class="col-md-4 col-lg-3 col-form-label">First Name</label>
        <div class="col-md-8 col-lg-9">
            <input wire:model="first_name" type="text" class="form-control" id="firstName" placeholder="Enter first name">
            @error('first_name') <span class="text-danger">{{ $message }}</span> @enderror
        </div>
    </div>

    <div class="row mb-3">
        <label for="lastName" class="col-md-4 col-lg-3 col-form-label">Last Name</label>
        <div class="col-md-8 col-lg-9">
            <input wire:model="last_name" type="text" class="form-control" id="lastName" placeholder="Enter last name">
            @error('last_name') <span class="text-danger">{{ $message }}</span> @enderror
        </div>
    </div>

    <div class="row mb-3">
        <label for="username" class="col-md-4 col-lg-3 col-form-label">Username</label>
        <div class="col-md-8 col-lg-9">
            <input wire:model="username" type="text" class="form-control" id="username" placeholder="Enter username">
            @error('username') <span class="text-danger">{{ $message }}</span> @enderror
        </div>
    </div>

    <div class="row mb-3">
        <label for="email" class="col-md-4 col-lg-3 col-form-label">Email</label>
        <div class="col-md-8 col-lg-9">
            <input wire:model="email" type="email" class="form-control" id="email" placeholder="Enter email">
            @error('email') <span class="text-danger">{{ $message }}</span> @enderror
        </div>
    </div>

    <div class="text-center">
        <button type="submit" class="btn btn-primary">Save Changes</button>
    </div>
</form>
