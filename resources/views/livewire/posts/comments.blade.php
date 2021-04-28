<div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body p-2">
                    <input type="text" placeholder="Comment..." wire:model.lazy="comment" class="form-control my-1">
                    <div class="row justify-content-end">
                            <button wire:click="createNewComment" class="btn btn-primary mr-3">Add new comment</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row mt-2">
        @foreach($comments as $comment)
            <div class="col-12 mb-3">
                <div class="card">
                    <div class="card-body pb-0">
                        <p>{{ $comment->comment }}</p>
                        <p>Created by: {{ $comment->user->name }}, {{ $comment->created_at->diffforhumans() ?? '' }}</p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
