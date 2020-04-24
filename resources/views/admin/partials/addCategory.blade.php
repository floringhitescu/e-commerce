<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Category</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="createNewCategory" action="{{ route('admin.categories.store') }}" method="post">
                    @csrf

                    <div class="">
                        <label for="name">Category name</label>

                        <div class="input-group mt-2 mb-4 border rounded-pill p-2">
                            <input type="text" name="name" id="name" placeholder="Perfume" aria-describedby="button-addon3" class="form-control border-0 @error('name') text-danger @enderror " required maxlength="25" minlength="3" >
                        </div>
                        @error('name')
                            <p class="text-danger">{{$message}}</p>
                        @enderror
                    </div>

                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" onclick="event.preventDefault(); createNewCategory()" class="btn btn-primary">Create</button>
            </div>
        </div>
    </div>
</div>
