<x-guest-layout>
    <div class="py-12 mt-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @can('Admin')
            <div class="mb-6 flex">
                <a class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white" href="{{ Route('projects.edit', $project->id) }}">
                    <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m14.304 4.844 2.852 2.852M7 7H4a1 1 0 0 0-1 1v10a1 1 0 0 0 1 1h11a1 1 0 0 0 1-1v-4.5m2.409-9.91a2.017 2.017 0 0 1 0 2.853l-6.844 6.844L8 14l.713-3.565 6.844-6.844a2.015 2.015 0 0 1 2.852 0Z" />
                    </svg>
                </a>
                <a class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white" href="{{ Route('projects.show', $project->id) }}">
                    <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-width="2" d="M21 12c0 1.2-4.03 6-9 6s-9-4.8-9-6c0-1.2 4.03-6 9-6s9 4.8 9 6Z" />
                        <path stroke="currentColor" stroke-width="2" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                    </svg>
                </a>
                <form method="POST" action="{{ route('projects.destroy', $project->id) }}">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white" onclick="return confirm('Are you sure?')">
                        <svg class="w-6 h-6 text-red-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 7h14m-9 3v8m4-8v8M10 3h4a1 1 0 0 1 1 1v3H9V4a1 1 0 0 1 1-1ZM6 7h12v13a1 1 0 0 1-1 1H7a1 1 0 0 1-1-1V7Z" />
                        </svg>
                    </button>
                </form>
            </div>
            @endcan
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div>
                    <input id="projectId" type="hidden" value="{{ $project->id }}">

                    <h1 class="mb-4 text-4xl font-extrabold leading-none tracking-tight text-gray-900 md:text-5xl lg:text-6xl dark:text-white grid place-content-evenly">
                        {{ $project->title }}</h1>
                    @if ($project->picture)
                    <div class="grid place-content-evenly px-8">
                        <img class="h-auto max-w-full mx-auto" src="{{ asset('pictures/' . $project->picture) }}" alt="image description">
                    </div>
                    @endif
                    <div class="mt-8 px-8">
                        <p class="mb-3 text-lg text-gray-500 md:text-xl dark:text-gray-400">
                            {{ $project->description }}</p>
                    </div>
                </div>
                <div class="mb-6 grid place-content-evenly px-8">
                    <div class="inline-flex font-medium items-center text-gray-600">
                        {{ $project->created_at->diffForHumans() }}</div>
                </div>


                @can('User')
                <div class="interaction text-center mt-5">
                    <a href="#" class="like ml-3">
                        @if ($userLike)
                        @if ($userLike->like == 1)
                        <i class="far fa-thumbs-up fa-2x" style="color: blue"></i> <span id="likeNumber">{{ $countLike }}</span>
                        @else
                        <i class="far fa-thumbs-up fa-2x"></i> <span id="likeNumber">{{ $countLike }}</span>
                        @endif
                        @else
                        <i class="far fa-thumbs-up fa-2x"></i> <span id="likeNumber">{{ $countLike }}</span>
                        @endif
                    </a> |
                    <a href="#" class="like mr-3">
                        @if ($userLike)
                        @if ($userLike->like == 0)
                        <i id="like_down" class="far fa-thumbs-down fa-2x liked"></i> <span id="dislikeNumber">{{ $countDislike }}</span>
                        @else
                        <i id="like_down" class="far fa-thumbs-down fa-2x"></i> <span id="dislikeNumber">{{ $countDislike }}</span>
                        @endif
                        @else
                        <i id="like_down" class="far fa-thumbs-down fa-2x"></i> <span id="dislikeNumber">{{ $countDislike }}</span>
                        @endif
                    </a>
                </div>
                @endcan

                @if(Auth::guest())
                <div class="interaction text-center mt-5">
                    <a href="#" class="like ml-3">
                        <i class="far fa-thumbs-up fa-2x" style="color: blue"></i> <span>{{ $countLike }}</span>
                    </a> |
                    <a href="#" class="like mr-3">
                        <i class="far fa-thumbs-down fa-2x"></i> <span>{{ $countDislike }}</span>
                    </a>
                </div>
                @endif


                <div class="mt-4 px-2">
                    <section class="bg-white dark:bg-gray-900 py-8 lg:py-16 antialiased">
                        <div class="max-w-2xl mx-auto px-4">
                            @can('User')
                            <div class="flex justify-between items-center mb-6">
                                <h2 class="text-lg lg:text-2xl font-bold text-gray-900 dark:text-white">{{ __('Comment') }}</h2>
                            </div>
                            <div class="mb-6">
                                <div class="py-2 px-4 mb-4 bg-white rounded-lg rounded-t-lg border border-gray-200 dark:bg-gray-800 dark:border-gray-700">
                                    <label for="comment" class="sr-only">{{ __('Comment') }}</label>
                                    <textarea id="comment" rows="6" class="px-0 w-full text-sm text-gray-900 border-0 focus:ring-0 focus:outline-none dark:text-white dark:placeholder-gray-400 dark:bg-gray-800" placeholder="{{ __('Add Comment') }}" required></textarea>
                                </div>
                                <button type="submit" class="saveComment text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">
                                    {{ __('Comment') }}
                                </button>
                            </div>
                            <div class="commentBody"></div>
                            @endcan
                            @cannot('User')
                            <p class="text-center text-rose-500">{{ __('SignUp or Login to be able to like or comment on the project') }}</p>
                            @endcannot

                            @foreach ($comments as $comment)
                            <article class="p-6 text-base bg-white border-t border-gray-200 dark:border-gray-700 dark:bg-gray-900">
                                <footer class="flex justify-between items-center mb-2">
                                    <div class="flex items-center">
                                        <p class="inline-flex items-center mr-3 text-sm text-gray-900 dark:text-white font-semibold"><img class="mr-2 w-6 h-6 rounded-full" src="{{ $comment->user->profile_photo_url }}" alt="{{ $comment->user->name }}">{{ $comment->user->name }}</p>
                                        <p class="text-sm text-gray-600 dark:text-gray-400"><time pubdate datetime="2022-06-23" title="June 23rd, 2022">{{ $comment->created_at->diffForHumans() }}</time></p>
                                    </div>
                                    @can('User')
                                    @if ($comment->user_id == auth()->user()->id || auth()->user()->hasRole('Admin'))
                                    <button id="dropdownComment4Button" data-dropdown-toggle="dropdownComment{{ $comment->id }}" class="inline-flex items-center p-2 text-sm font-medium text-center text-gray-500 dark:text-gray-40 bg-white rounded-lg hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-50 dark:bg-gray-900 dark:hover:bg-gray-700 dark:focus:ring-gray-600" type="button">
                                        <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 16 3">
                                            <path d="M2 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3Zm6.041 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM14 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3Z" />
                                        </svg>
                                    </button>
                                    <!-- Dropdown menu -->
                                    <div id="dropdownComment{{ $comment->id }}" class="hidden z-10 w-36 bg-white rounded divide-y divide-gray-100 shadow dark:bg-gray-700 dark:divide-gray-600">
                                        <ul class="py-1 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownMenuIconHorizontalButton">
                                            <li>
                                                <form method="GET" action="{{ route('comment.edit', $comment->id) }}">
                                                    <button type="submit" class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">{{ __('Edit') }}</button>
                                                </form>
                                            </li>
                                            <li>
                                                <form method="POST" action="{{ route('comment.destroy', $comment->id) }}" onsubmit="return confirm('{{ __('Are you sure you want to delete this comment?') }}')">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">{{ __('Delete') }}</button>
                                                </form>
                                            </li>
                                        </ul>
                                    </div>
                                    @endif
                                    @endcan

                                </footer>
                                <p class="text-gray-500 dark:text-gray-400">{{ $comment->body }}</p>
                            </article>
                            @endforeach
                        </div>
                </div>
                </section>
            </div>

        </div>
    </div>
    </div>
    @section('scripts')


    <script>
        $('.like').on('click', function(event) {
            var token = '{{ Session::token() }}';
            var urlLike = '{{ route('like') }}';

            var projectId = 0;
            var AuthUser = "{{{ (Auth::user()) ? 0 : 1 }}}";

            if (AuthUser == '1') {
            event.preventDefault();
            var html = '';

                $(".loginAlert").html(html);
            } else {
                event.preventDefault();
                projectId = $("#projectId").val();
                var isLike = event.target.parentNode.previousElementSibling == null;
                $.ajax({
                    method: 'POST'
                    , url: urlLike
                    , data: {
                        isLike: isLike
                        , projectId: projectId
                        , _token: token
                    }
                    , success: function(data) {
                        if ($(event.target).hasClass('fa-thumbs-up')) {
                            if ($(event.target).hasClass('liked')) {
                                $(event.target).removeClass("liked");
                            } else {
                                $(event.target).addClass("liked");
                            }

                            $('#likeNumber').html(data.countLike);
                            $('#dislikeNumber').html(data.countDislike);
                        }

                        if ($(event.target).hasClass('fa-thumbs-down')) {
                            if ($(event.target).hasClass('liked')) {
                                $(event.target).removeClass("liked");
                            } else {
                                $(event.target).addClass("liked");
                            }
                            $('#likeNumber').html(data.countLike);
                            $('#dislikeNumber').html(data.countDislike);
                        }
                        if (isLike) {
                            $(".fa-thumbs-down").removeClass("liked");
                        } else {
                            $(".fa-thumbs-up").removeClass("liked");
                        }

                    }
                })
            }
        });

    </script>
    <script>
        $('.saveComment').on('click', function(event) {
            var token = '{{ Session::token() }}';
            var urlComment = '{{ route('comment') }}';

            var projectId = 0;

            var AuthUser = "{{{ (Auth::user()) ? 0 : 1 }}}";

            if (AuthUser == '1') {
                event.preventDefault();
                var html = '<div class="alert alert-danger">\
                            <ul>\
                                <li>Sign in to be able to comment</li>\
                            </ul>\
                        </div>';
                $(".commentAlert ").html(html);
            } else if ($('#comment').val().length == 0) {
                var html = '<div class="alert alert-danger">\
                            <ul>\
                                <li>Please write a comment</li>\
                            </ul>\
                        </div>';
                $(".commentAlert ").html(html);
            } else {
                $(".commentAlert ").html('');
                event.preventDefault();
                projectId = $("#projectId").val();
                comment = $("#comment").val();
                $.ajax({
                    method: 'POST'
                    , url: urlComment
                    , data: {
                        comment: comment
                        , projectId: projectId
                        , _token: token
                    }
                    , success: function(data) {
                        $("#comment").val('');
                        destroyUrl = "{{route('comment.destroy', 'des_id')}}";
                        destroy = destroyUrl.replace('des_id', data.commentId);
                        editUrl = "{{route('comment.edit', 'id')}}";
                        url = editUrl.replace('id', data.commentId);
                        var html = ' <article class="p-6 text-base bg-white border-t border-gray-200 dark:border-gray-700 dark:bg-gray-900">\
                            <footer class="flex justify-between items-center mb-2">\
                                <div class="flex items-center">\
                                    <p class="inline-flex items-center mr-3 text-sm text-gray-900 dark:text-white font-semibold"><img class="mr-2 w-6 h-6 rounded-full" src="'+data.userImage+'" alt="'+data.userName+'">'+data.userName+'</p>\
                                    <p class="text-sm text-gray-600 dark:text-gray-400"><time pubdate datetime="2022-06-23" title="June 23rd, 2022">'+data.commentDate+'</time></p>\
                                </div>\
                                            <div class="flex">\
                                                <form method="POST" action="'+destroy+'">\
                                                    @csrf\
                                                    @method('DELETE')\
                                                    <button type="submit" class="float-left"><i class="far fa-trash-alt text-danger fa-2xs"></i></button>\
                                                </form>\
                                                <form method="GET" action="'+url+'">\
                                                    @csrf\
                                                    <button type="submit" class="float-left"><i class="far fa-edit text-success fa-2xs ml-2"></i></button>\
                                                </form>\
                                            </div>\
                            </footer>\
                            <p class="text-gray-500 dark:text-gray-400">'+comment+'</p>\
                        </article>';


                        $(".commentBody").prepend(html);
                        }
                        })
                        }
                        });

                        </script>
                        @endsection
                        </x-guest-layout>

