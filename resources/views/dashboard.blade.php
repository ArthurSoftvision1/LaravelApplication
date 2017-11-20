@include('layouts.app')
@include('includes.header')
@include('includes.message-block')
    <div class="container">
        <div class="col-md-12" style="text-align: center; margin: 0 auto; width: 50%;">
            <ul class="nav navbar-nav navbar-right" style="display: inline-block">
                <li><a class="logout-button" href="{{ route('logout') }}" style="text-decoration: none;">Logout</a> </li>
                <li><a class="#" href="{{ route('account') }}" style="text-decoration: none;">Account</a></li>

            </ul>
            <section class="row new-post" style="text-align: center">
                <div class="col-md-12 col-md-offset-3">
                    <header>
                        <h3>What do you have to say?</h3>
                    </header>
                    <form action="{{ route('post.create') }}" method="post">
                        <div class="form-group">
                            <textarea class="form-control" name="body" id="new-post" rows="5" placeholder="Your Post"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Create Post</button>
                        <input type="hidden" value="{{ Session::token() }}" name="_token">
                    </form>
                </div>
            </section>
            <section class="row posts">
                <div class="col-md-12 col-md-3-offset">
                <header><h3>What other people say...</h3></header>
                @foreach($posts as $post)
                    <article class="post" data-postid="{{ $post->id }}">
                        <p>{{ $post->body }}</p>
                        <div class="info">
                            Posted by {{ $post->user['first_name'] }} on {{ $post->created_at }}
                        </div>
                        <div class="interaction">
                            <a href="#" class="like">{{ Auth::user()->likes()->where('post_id', $post->id)->first() ? Auth::user()->likes()->where('post_id', $post->id)->first()->like == 1 ? 'You like this post' : 'Like' : 'Like'  }}</a> |
                            <a href="#" class="like">{{ Auth::user()->likes()->where('post_id', $post->id)->first() ? Auth::user()->likes()->where('post_id', $post->id)->first()->like == 0 ? 'You don\'t like this post' : 'Dislike' : 'Dislike'  }}</a>
                            |
                            @if(Auth::user() == $post->user)
                                <a class="edit" href="#">Edit</a>﻿
                                <a href="{{ route('post.delete', ['post_id' => $post->id]) }}">Delete</a>
                            @endif
                        </div>
                    </article>
                @endforeach
                </div>
            </section>
            <div id="edit-modal" class="modal" tabindex="-1" role="dialog" >
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title">Edit Post</h4>
                        </div>
                        <div class="modal-body">
                            <form>
                                <div class="form-group">
                                    <label for="post-body">Edit the Post</label>
                                    <textarea class="form-control" name="post-body" id="post-body" rows="5"></textarea>
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary" id="modal-save">Save changes</button>
                        </div>
                    </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
            </div><!-- /.modal -->
        </div>
    </div>
<script>
    var token = '{{ Session::token() }}';
    var urlEdit = '{{ route('edit') }}';
    var urlLike = '{{ route('like') }}';
</script>
@include('includes.footer')