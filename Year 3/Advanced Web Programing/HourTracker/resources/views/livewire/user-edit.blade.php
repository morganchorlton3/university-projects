<div  x-data="{ 'showModal': false }"
@keydown.escape="showModal = false">
  <button><i class="fas fa-pen" wire:click="user({{$user->id}})" @click="showModal = true"></i></button>  
  @if($userToEdit != null)
    <!-- Modal -->
    <!--Overlay-->
    <div class="overflow-auto" style="background-color: rgba(0,0,0,0.5)" x-show="showModal" :class="{ 'absolute inset-0 z-10 flex items-center justify-center': showModal }">
      <!--Dialog-->
      <div class="bg-gray-900 text-white  w-5/12 rounded shadow-lg py-4 text-left px-6" x-show="showModal" @click.away="showModal = false">
      
        <form action="{{ route('admin.users.update', $user) }}" method="POST">
          @CSRF
          @method('put') 

          <!-- Add margin if you want to see some of the overlay behind the modal-->
          <div class="modal-content py-4 text-left px-6">
            <!--Title-->
            <div class="flex justify-between items-center pb-3">
              <p class="text-2xl font-bold">Edit User {{ $user->id}}</p>
              <div class="modal-close cursor-pointer z-50" @click="showModal = false">
                <svg class="fill-current text-white" xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18">
                  <path d="M14.53 4.53l-1.06-1.06L9 7.94 4.53 3.47 3.47 4.53 7.94 9l-4.47 4.47 1.06 1.06L9 10.06l4.47 4.47 1.06-1.06L10.06 9z"></path>
                </svg>
              </div>
            </div>

              <!--Body-->
              <div class="flex justify-start">
                <div class="w-1/2">
                  <div class="flex flex-wrap">
                    <p class="w-full text-sm">Name:</p>
                    <p class="w-full pb-4">{{ $user->firstName }} {{ $user->lastName }}</p>
                    <p class="w-full text-sm">Email:</p>
                    <p class="w-full pb-4">{{ \Illuminate\Support\Str::limit($user->email, 25, $end='...') }}</p>
                  </div>
                </div>
                <div class="w-1/2">
                  <div class="flex justify-start mb-3">
                    <div class="flex flex-wrap">
                    @foreach($roles as $role)
                      <label class="custom-label flex w-full py-1">
                        <div class="bg-gray-700 shadow w-6 h-6 p-1 flex justify-center items-center mr-2">
                          <input type="checkbox" class="hidden" name="roles[]" value="{{ $role->id }}" @if($user->roles->pluck('id')->contains($role->id)) checked @endif >
                          <svg class="hidden w-4 h-4 text-white pointer-events-none" viewBox="0 0 172 172"><g fill="none" stroke-width="none" stroke-miterlimit="10" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode:normal"><path d="M0 172V0h172v172z"/><path d="M145.433 37.933L64.5 118.8658 33.7337 88.0996l-10.134 10.1341L64.5 139.1341l91.067-91.067z" fill="currentColor" stroke-width="1"/></g></svg>
                        </div>
                        <span>{{$role->name}}</span>
                      </label>
                    @endforeach
                    </div>      
                  </div>
                </div>                                        
              </div>

            <div class="flex justify-end">
              <button type="submit" class="px-4 bg-gray-600 p-2 rounded-lg text-white hover:bg-gray-100 hover:text-indigo-400 mr-2">Update</button>
            </div>
          </div>
        </form><!-- Form -->
      </div><!--/Dialog -->
    </div><!-- /Overlay -->
  @endif
</div>
        