<?php

namespace App\Http\Livewire;

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;
use function dd;

class Posts extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';
    public $search = '';
    public $category_id_search = '';
    public $user_id_search = '';
    public $isUpdatePost = false;
    public $title;
    public $body;
    public $category_id;
    public $post_id;


    protected $rules = [
        'title' => 'required',
        'body' => 'required',
        'category_id' => 'required',
    ];


    public function render()
    {

        $posts = Post::latest()
            ->where(function ($q) {
                $q->where('title', 'like', '%' . $this->search . '%')
                    ->orWhere('body', 'like', '%' . $this->search . '%');
            });

        if ($this->category_id_search) {
            $posts = $posts->whereCategoryId($this->category_id_search);
        }
        if ($this->user_id_search) {
            $posts = $posts->whereUserId($this->user_id_search);
        }
        $posts = $posts->paginate(10);


        return view('livewire.posts.index', [
            'posts' => $posts,
            'categories' => Category::all(),
            'users' => User::all()
        ]);
    }

    public function resetForm()
    {
        $this->title = '';
        $this->body = '';
        $this->category_id = '';
    }


    public function store()
    {
        $this->validate();
        try {
            Post::create([
                'title' => $this->title,
                'body' => $this->body,
                'category_id' => $this->category_id,
                'user_id' => Auth::id()
            ]);

            //session()->flash('success', 'Post Created Successfully!!');
            $this->dispatchBrowserEvent('alert', [
                'type' => 'success',
                'message' => "Post Created Successfully!!"
            ]);
            $this->resetForm();

        } catch (\Exception $e) {
            $this->dispatchBrowserEvent('alert', [
                'type' => 'error',
                'message' => "Something goes wrong while creating post!!  .." . $e->getMessage()
            ]);
        }


    }

    public function edit($id)
    {
        $post = Post::findOrFail($id);
        $this->post_id = $post->id;
        $this->title = $post->title;
        $this->body = $post->body;
        $this->category_id = $post->category_id;
        $this->isUpdatePost = true;
    }

    public function cancel()
    {
        $this->isUpdatePost = false;
        $this->resetForm();
    }

    public function update()
    {
        $this->validate();
        try {
            $post = Post::findOrFail($this->post_id);
            $post->update([
                'title' => $this->title,
                'body' => $this->body,
                'category_id' => $this->category_id,
                'user_id' => Auth::id()
            ]);

            $this->dispatchBrowserEvent('alert', [
                'type' => 'success',
                'message' => "Post Updated Successfully!!"
            ]);

        } catch (\Exception $e) {
            $this->dispatchBrowserEvent('alert', [
                'type' => 'error',
                'message' => "Something goes wrong while updating post!!  .." . $e->getMessage()
            ]);
        }
        $this->cancel();
    }

    public function destroy($id)
    {
        try {
            Post::find($id)->delete();
            $this->dispatchBrowserEvent('alert', [
                'type' => 'success',
                'message' => "Category Deleted Successfully!!"
            ]);
        } catch (\Exception $e) {

            $this->dispatchBrowserEvent('alert', [
                'type' => 'error',
                'message' => "Something goes wrong while deleting category!!  .." . $e->getMessage()
            ]);
        }
    }

}
