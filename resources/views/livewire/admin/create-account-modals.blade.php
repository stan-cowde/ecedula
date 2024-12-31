<div x-data="{ isOpen: @entangle('isOpen') }">
    <!-- Button to open the modal -->
    <button @click="isOpen = true" class="btn btn-accent mb-3">
        <i class="fa fa-person-booth"></i>
        Create account
    </button>

    <!-- Modal -->
        <dialog :class="isOpen ? 'modal modal-open' : 'modal'">
            <div class="modal-box">
                <form>
                    <!-- Modal Header -->
                    <div class="flex justify-between items-center border-b pb-2 mb-4">
                        <h5 class="text-lg font-bold">Create Account</h5>
                        <button type="button" class="btn btn-sm btn-circle" @click="isOpen = false">
                            ✕
                        </button>
                    </div>

                    <!-- Modal Body -->
                    <div class="space-y-4">
                        <label class="input input-bordered flex items-center gap-2">
                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                viewBox="0 0 16 16"
                                fill="currentColor"
                                class="h-4 w-4 opacity-70">
                                <path
                                    d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6ZM12.735 14c.618 0 1.093-.561.872-1.139a6.002 6.002 0 0 0-11.215 0c-.22.578.254 1.139.872 1.139h9.47Z" />
                            </svg>
                            <input wire:model="firstname" type="text" class="grow" placeholder="First Name" />
                        </label>
                         @error('firstname')
                            <span class="text-error text-sm">{{ $message }}</span>
                        @enderror
                        <label class="input input-bordered flex items-center gap-2">
                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                viewBox="0 0 16 16"
                                fill="currentColor"
                                class="h-4 w-4 opacity-70">
                                <path
                                    d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6ZM12.735 14c.618 0 1.093-.561.872-1.139a6.002 6.002 0 0 0-11.215 0c-.22.578.254 1.139.872 1.139h9.47Z" />
                            </svg>
                            <input wire:model="lastname" type="text" class="grow" placeholder="Last Name" />
                        </label>
                        @error('lastname')
                            <span class="text-error text-sm">{{ $message }}</span>
                        @enderror
                        <label class="input input-bordered flex items-center gap-2">
                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                viewBox="0 0 16 16"
                                fill="currentColor"
                                class="h-4 w-4 opacity-70">
                                <path
                                    d="M2.5 3A1.5 1.5 0 0 0 1 4.5v.793c.026.009.051.02.076.032L7.674 8.51c.206.1.446.1.652 0l6.598-3.185A.755.755 0 0 1 15 5.293V4.5A1.5 1.5 0 0 0 13.5 3h-11Z" />
                                <path
                                    d="M15 6.954 8.978 9.86a2.25 2.25 0 0 1-1.956 0L1 6.954V11.5A1.5 1.5 0 0 0 2.5 13h11a1.5 1.5 0 0 0 1.5-1.5V6.954Z" />
                            </svg>
                            <input wire:model="email" type="text" class="grow" placeholder="Email" />
                        </label>
                         @error('email')
                            <span class="text-error text-sm">{{ $message }}</span>
                        @enderror
                        <label class="input input-bordered flex items-center gap-2">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="size-5">
                                <path fill-rule="evenodd" d="M5.404 14.596A6.5 6.5 0 1 1 16.5 10a1.25 1.25 0 0 1-2.5 0 4 4 0 1 0-.571 2.06A2.75 2.75 0 0 0 18 10a8 8 0 1 0-2.343 5.657.75.75 0 0 0-1.06-1.06 6.5 6.5 0 0 1-9.193 0ZM10 7.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5Z" clip-rule="evenodd" />
                            </svg>
                            <input wire:model="username" type="text" class="grow" placeholder="Username" />
                        </label>
                         @error('username')
                             <span class="text-error text-sm">{{ $message }}</span>
                        @enderror
                        <label class="input input-bordered flex items-center gap-2">
                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                viewBox="0 0 16 16"
                                fill="currentColor"
                                class="h-4 w-4 opacity-70">
                                <path
                                    fill-rule="evenodd"
                                    d="M14 6a4 4 0 0 1-4.899 3.899l-1.955 1.955a.5.5 0 0 1-.353.146H5v1.5a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1-.5-.5v-2.293a.5.5 0 0 1 .146-.353l3.955-3.955A4 4 0 1 1 14 6Zm-4-2a.75.75 0 0 0 0 1.5.5.5 0 0 1 .5.5.75.75 0 0 0 1.5 0 2 2 0 0 0-2-2Z"
                                    clip-rule="evenodd" />
                            </svg>
                            <input wire:model="password" type="password" class="grow" placeholder="password" />
                        </label>
                         @error('password')
                        <span class="text-error text-sm">{{ $message }}</span>
                        @enderror
                        <select wire:model="role" class="select select-bordered select-primary w-full max-w-s">
                            <option disabled selected>Pick Role</option>
                            <option value="1">User</option>
                            <option value="2">Admin</option>
                        </select>
                        @error('role')
                            <span class="text-error text-sm">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Modal Footer -->
                    <div class="modal-action">
                        <button type="button" class="btn" @click="isOpen = false">Close</button>
                        <button wire:click="createAccount" type="button" class="btn btn-primary">Create Account</button>
                    </div>
                </form>
            </div>
        </dialog>
</div>
