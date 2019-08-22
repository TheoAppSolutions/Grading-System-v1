@extends('_layouts.main')

@push("js")
    <script src="{{ url("/app-assets/vendors/js/forms/repeater/jquery.repeater.min.js") }}"
            type="text/javascript"></script>
    <script src="{{ url("/app-assets/js/scripts/forms/form-repeater.js") }}" type="text/javascript"></script>
@endpush

@section('content-title')
    Announcements
@endsection

@section('content-body')
    <section class="row">
        <div class="col">
            <div class="card border-info">
                <div class="card-head">
                    <div class="card-header">
                        <button class="btn btn-primary btn-md"
                                onclick="loadModal('New Announcement', '{{ route('announcement.create') }}')"
                                data-target='#modal' data-toggle="modal">
                            <i class="ft-plus white"></i> Add New Announcement
                        </button>
                    </div>
                </div>
                <div class="card-content">
                    <div class="card-body pt-0">
                        <div class="table-responsive">
                            <table class="table table-white-space table-bordered row-grouping display no-wrap table-middle">
                                <thead>
                                <tr class="text-center">
                                    <th>Title</th>
                                    <th>Description</th>
                                    <th>User</th>
                                    <th>Date Issued</th>
                                    <th>Date Expires</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @isset($notifications["announcements"])
                                    @foreach($notifications["announcements"] as $notif)
                                        <tr class="text-center">
                                            <td>{{ $notif['title'] }}</td>
                                            <td>{{ $notif['description'] }}</td>
                                            @if (strpos($notif['from_user_id'], "ADMIN") !== false)
                                                <td>ADMINISTRATOR</td>
                                            @else
                                                <td>{{ $notif['from_user_id'] }}</td>
                                            @endif
                                            <td>{{ $notif['date_start'] }}</td>
                                            <td>{{ $notif['date_end'] }}</td>
                                            <th><a href="{{ route('announcement.delete', $notif['entry_id']) }}" class="btn btn-danger" title="Delete" style="cursor: pointer;">
                                                    <i class="ft-trash"></i>
                                                </a>
                                            </th>
                                        </tr>
                                    @endforeach
                                @endisset
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @include('_layouts.modal')
@endsection