<form wire:submit.prevent="store">
    <div class="row">
        <div class="form-group col-md-6">
            <label for="title">Title:</label>
            <input type="text" class="form-control @error('title') is-invalid @enderror" id="title"
                   placeholder="Enter Title"
                   wire:model="title">
            @error('title') <span class="text-danger">{{ $message }}</span>@enderror
        </div>
        <div class="form-group col-md-6">
            <label for="category_id">Category</label>
            <select name="category_id" wire:model="category_id" class="form-control">
                <option>Select Category</option>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
            @error('category_id')<span class="text-danger">{{ $message }}</span>@enderror
        </div>
        <div class="form-group col-md-12">
            <label for="body">Body:</label>
            <textarea class="form-control @error('body') is-invalid @enderror" id="body"
                      wire:model="body" placeholder="Enter Body"></textarea>
            @error('body') <span class="text-danger">{{ $message }}</span>@enderror
        </div>
    </div>
    <div class="">
        <button class="btn btn-success btn-block">Save</button>
    </div>
</form>
