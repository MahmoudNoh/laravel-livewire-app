<div class="card">
    <div class="card-header">
        <h2>Posts</h2>
    </div>
    <div class="card-body">

        @if(session()->has('success'))
            <div class="alert alert-success" role="alert">
                {{ session()->get('success') }}
            </div>
        @endif

        @if(session()->has('error'))
            <div class="alert alert-danger" role="alert">
                {{ session()->get('error') }}
            </div>
        @endif


        @if($isUpdatePost)
            @include('livewire.posts.update')
        @else
            @include('livewire.posts.create')
        @endif
        <br>
        <div class="row">

            <div class="col-md-4">
                <input class="form-control" wire:model="search" type="search"
                       placeholder="Search posts by title or body...">
            </div>

            <div class="col-md-4">
                <select name="category_id_search" wire:model="category_id_search" class="form-control">
                    <option>Select Category</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="col-md-4">
                <select name="user_id_search" wire:model="user_id_search" class="form-control">
                    <option>Select User</option>
                    @foreach($users as $users)
                        <option value="{{ $users->id }}">{{ $users->name }}</option>
                    @endforeach
                </select>
            </div>


        </div>
        <br>
        <table class="table table-bordered ">
            <thead>
            <tr>
                <th>No.</th>
                <th>Title</th>
                <th>Body</th>
                <th>User</th>
                <th>Category</th>
                <th width="150px">Action</th>
            </tr>
            </thead>
            <tbody>
            @if($posts)
                @foreach($posts as $post)
                    <tr>
                        <td>{{ $post->id }}</td>
                        <td>{{ $post->title }}</td>
                        <td>{{ $post->body }}</td>
                        <td>{{ $post->user->name }}</td>
                        <td>{{ $post->category->name }}</td>
                        <td>
                            <button wire:click="edit({{ $post->id }})" class="btn btn-primary btn-sm">Edit</button>
                            <button wire:click="destroy({{ $post->id }})" class="btn btn-danger btn-sm"
                                    onclick="confirm('Are you sure?'); return false;">Delete
                            </button>
                        </td>
                    </tr>
                @endforeach
            @endif
            </tbody>
        </table>

        @if($posts)
            {{ $posts->links() }}
        @endif

    </div>
</div>


