<!-- Button trigger modal -->
<a href="#edit{{ $admin->id }}" class="btn" data-bs-toggle="modal" data-bs-target="#edit{{ $admin->id }}">
    <i class="fa-solid link-warning fa-pencil"></i> 
</a>

<div class="modal fade" id="edit{{ $admin->id }}" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel">Edit Admin</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('admin.update', ['id'=> $admin->id]) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <label for="name">Admin name *</label>
                    <input type="text" class="form-control mb-3 @error('name') is-invalid @enderror" id="name" name="name" placeholder="Admin name" value="{{ $admin->name }}" required>
                    @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror

                    <label for="email">Email *</label>
                    <input type="email" class="form-control mb-3  @error('email') is-invalid @enderror" id="email" name="email" placeholder="Email" value="{{ $admin->email }}" required>
                    @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror

        

                    <label for="is_admin">Admin Role *</label>
                    <select name="is_admin" id="is_admin" class="form-control @error('is_admin') is-invalid @enderror">
                        <option value="1" {{ $admin->is_admin ? 'selected' : '' }}>Super Admin</option>
                        <option value="0" {{ !$admin->is_admin ? 'selected' : '' }}>Admin</option>
                    </select>
                    @error('is_admin')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>
