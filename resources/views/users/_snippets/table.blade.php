<div class="table-responsive">
    <table class="table table-white-space table-bordered row-grouping display no-wrap table-middle table-striped">
        <thead>
        <tr>
            <th>ID#</th>
            <th>Name</th>
            <th>Email</th>
            <th>Contact#</th>
            <th>Actions</th>
        </tr>
        </thead>

        <tbody>
        @php($lastID = '')
        @foreach($users as $user)
            @if($lastID != $user->id)
                <tr>
                    <td>
                        {{ $user->id }}
                    </td>

                    <td>
                        <div class="media">
                            <div class="media-left pr-1">
                                <span class="avatar avatar-sm rounded-circle">
                                <img src="{{ profile_image($user->id) }}"
                                     alt="avatar">
                                </span>
                            </div>
                            <div class="media-body media-middle">
                                <a href="{{ route("user.show", $user->id) }}"
                                   class="media-heading">{{ $user->lastname . ", " . $user->firstname }}
                                </a>
                                @isset($roles[$user->id])
                                    @foreach($roles[$user->id] as $role)
                                        <div class="badge badge-{{ $role->color }}">{{ $role->role_description }}</div>
                                    @endforeach
                                @endisset
                            </div>
                        </div>
                    </td>

                    <td class="text-center">
                        <a href="mailto:{{ $user->email }}">{{ $user->email }}</a>
                    </td>

                    <td>{{ $user->contact }}</td>
                    <td>
                        <a href="{{ route('user.show',$user->id) }}" title="Edit" class="btn btn-primary"><i
                                    class="ft-edit-2"></i></a>
                        @if($user->active == 1)
                            <button type="button" class="btn btn-secondary" title="Reset Password"
                                    onclick="accountStatus('{{ route('admin.password.default') }}','Reset Password','{{ $user->id }}')">
                                <i class="la la-key"></i>
                            </button>
                            <button class="btn btn-warning" title="De-Activate" style="cursor: pointer;"
                                    onclick="accountStatus('{{ route('user.activate') }}','Disable','{{ $user->id }}');">
                                <i class="ft-thumbs-down"></i>
                            </button>
                        @elseif ($user->active == 0)
                            <button class="btn btn-success" title="Activate" style="cursor: pointer;"
                                    onclick="accountStatus('{{ route('user.activate') }}','Activate','{{ $user->id }}');">
                                <i class="ft-thumbs-up"></i>
                            </button>
                            <button class="btn btn-danger" title="Delete" style="cursor: pointer;"
                                    onclick="accountStatus('{{ route('user.delete') }}','Delete','{{ $user->id }}');">
                                <i class="ft-trash"></i>
                            </button>
                        @endif
                    </td>
                </tr>
                @php($lastID = $user->id)
            @endif
        @endforeach
        </tbody>

        <tfoot>
        <tr>
            <th>ID#</th>
            <th>Name</th>
            <th>Email</th>
            <th>Contact#</th>
            <th>Actions</th>
        </tr>
        </tfoot>
    </table>
</div>
