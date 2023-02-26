<div>
<div class="card">
    <div class="card-datatable table-responsive">
       <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper dt-bootstrap5 no-footer">
          <div class="row mx-2 m-4">
            <div class="col-sm-12 col-md-4 col-lg-6">
              <div class="dataTables_length" id="DataTables_Table_0_length">
                  <label>
                    <select name="DataTables_Table_0_length" aria-controls="DataTables_Table_0" class="form-select">
                        <option value="10">10</option>
                        <option value="25">25</option>
                    </select>
                  </label>
              </div>
            </div>
            <div class="col-sm-12 col-md-8 col-lg-6">
              <div class="dt-action-buttons text-xl-end text-lg-start text-md-end text-start d-flex align-items-center justify-content-md-end justify-content-center align-items-center flex-sm-nowrap flex-wrap me-1">
                  <div class="me-2">
                    <div id="DataTables_Table_0_filter" class="dataTables_filter"><input type="search" class="form-control" placeholder="Search.." aria-controls="DataTables_Table_0"></div>
                  </div>
                  <div class="user_role w-px-200 pb-3 pb-sm-0">
                    <select id="UserRole" class="form-select text-capitalize">
                        <option value=""> Select Role </option>
                        <option value="Admin" class="text-capitalize">Admin</option>
                        <option value="Author" class="text-capitalize">Author</option>
                        <option value="Editor" class="text-capitalize">Editor</option>
                        <option value="Maintainer" class="text-capitalize">Maintainer</option>
                        <option value="Subscriber" class="text-capitalize">Subscriber</option>
                    </select>
                  </div>
                  <button type="button" class="btn btn-outline-primary w-px-200 mx-2" data-bs-target='#add_author_modal' data-bs-toggle="modal">
                    <span class="tf-icons bx bxs-user-plus me-1"></span> Add Author
                  </button>
              </div>
            </div>
          </div>
          <table class="datatables-users table border-top dataTable no-footer dtr-column" id="DataTables_Table_0" aria-describedby="DataTables_Table_0_info" style="width: 1210px;">
             <thead>
                <tr>
                   <th class="control sorting_disabled dtr-hidden" rowspan="1" colspan="1" style="width: 0px; display: none;" aria-label=""></th>
                   <th class="sorting sorting_desc" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 331px;" aria-label="User: activate to sort column ascending" aria-sort="descending">User</th>
                   <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 156px;" aria-label="Role: activate to sort column ascending">Role</th>
                   <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 101px;" aria-label="Status: activate to sort column ascending">Status</th>
                   <th class="sorting_disabled" rowspan="1" colspan="1" style="width: 58px;" aria-label="Edit">Edit</th>
                </tr>
             </thead>

             @forelse ($authors as $author)

             <tbody>
                <tr class="even">
                   <td class="  control" tabindex="0" style="display: none;"></td>
                   <td class="sorting_1">
                      <div class="d-flex justify-content-left align-items-center">
                         <div class="avatar-wrapper">
                            <div class="avatar avatar-sm me-3"><span class="avatar-initial rounded-circle bg-label-warning">{{ Auth::user()->initial() }}</span></div>
                         </div>
                         <div class="d-flex flex-column"><a href="app-user-view-account.html" class="text-body text-truncate"><span class="fw-semibold">{{ $author->name }}</span></a><small class="text-muted">{{ $author->email }}</small></div>
                      </div>
                   </td>
                   <td><span class="text-truncate d-flex align-items-center"><span class="badge badge-center rounded-pill bg-label-success w-px-30 h-px-30 me-2"><i class="bx bx-cog bx-xs"></i></span>{{ $author->authorType->name }}</span></td>
                   <td><span class="badge bg-label-success">Active</span></td>
                   <td><a href="#" class="btn btn-sm btn-icon"><i class="bx bxs-edit-alt"></i></a></td>
                </tr>
             </tbody>

             @empty
                 <span class="text-danger mx-3">No Author Found!</span>
             @endforelse

          </table>
          <div class="row mx-2 m-4">
             <div class="col-sm-12 col-md-6">
                {{-- <div class="dataTables_info" id="DataTables_Table_0_info" role="status" aria-live="polite">Showing 1 to 10 of 50 entries</div> --}}
             </div>
          </div>
       </div>
    </div>
 </div>

<!-- Modal -->
<div wire:ignore.self class="modal fade" id="add_author_modal" tabindex="-1" aria-labelledby="ModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Add User</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
            </button>
        </div>
        <div class="modal-body">
            <form wire:submit.prevent='addAuthor' method="post">
                @csrf
                <div class="mb-3">
                    <label for="defaultFormControlInput" class="form-label">Name</label>
                    <input type="text" class="form-control" id="defaultFormControlInput" placeholder="Enter name" aria-describedby="defaultFormControlHelp" wire:model='name' />
                    <span class="text-danger">@error('name'){{ $message }}@enderror</span>
                </div>
                <div class="mb-3">
                    <label for="defaultFormControlInput" class="form-label">Email</label>
                    <input type="text" class="form-control" id="defaultFormControlInput" placeholder="Enter email" aria-describedby="defaultFormControlHelp" 
                    wire:model='email'/>
                    <span class="text-danger">@error('email'){{ $message }}@enderror</span>
                </div>
                <div class="mb-3">
                    <label for="defaultFormControlInput" class="form-label">Username</label>
                    <input type="text" class="form-control" id="defaultFormControlInput" placeholder="Enter username" aria-describedby="defaultFormControlHelp"
                    wire:model='username' />
                    <span class="text-danger">@error('username'){{ $message }}@enderror</span>
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlSelect1" class="form-label">Roles</label>
                    <select class="form-select" id="exampleFormControlSelect1" aria-label="Default select example" wire:model='author_type'>
                        <option selected>-- Select Role --</option>
                        @foreach (\App\Models\Type::all() as $type)
                        <option value="{{$type->id}}">{{ $type->name }}</option>
                        @endforeach
                    </select>
                </div>
                <span class="text-danger">@error('author_type'){{ $message }}@enderror</span>
                <div class="col-sm">
                    <small class="text-light fw-semibold">Direct Publisher Option</small>
                    <div class="form-check mt-3">
                      <input name="default-radio-1" class="form-check-input" type="radio" value="0" id="defaultRadio1" wire:model='direct_publisher'/>
                      <label class="form-check-label" for="defaultRadio1">
                        Yes
                      </label>
                    </div>
                    <div class="form-check">
                      <input name="default-radio-1" class="form-check-input" type="radio" value="1" id="defaultRadio2" checked wire:model='direct_publisher' />
                      <label class="form-check-label" for="defaultRadio2">
                        No
                      </label>
                    </div>
                    <span class="text-danger">@error('direct_publisher'){{ $message }}@enderror</span>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
      </div>
    </div>
</div>
</div>