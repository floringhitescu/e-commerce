<form action="{{ route('search') }}" method="put" class=" d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0 ">
    <div class="input-group">
        <input class="form-control" id="search" name="search" type="text" placeholder="Search for..." aria-label="Search" value="{{ request()->input('search') }}" aria-describedby="basic-addon2" />
        <div class="input-group-append">
            <button class="btn btn-primary" type="submit">Search</button>
        </div>
    </div>
</form>
