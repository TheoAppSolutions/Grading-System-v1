<form class="form">
    <div class="form-body">
        <div class="form-section row">
            <div class="col-12">
                <div class="card">
                    <div class="card-content">
                        <div class="card-body">
                            <div class="card-text">
                                @include('_partials.error_alerts')
                            </div>
                            <form class="form form-horizontal form-bordered" action="{{ route('announcement.store') }}"
                                  method="POST" name="create_announcement">
                                @csrf

                                <div class="form-body">
                                    <div class="row">
                                        <div class="col">
                                            <h4 class="form-section">
                                                Fields with <span class="danger">*</span> are required fields.
                                            </h4>
                                            <fieldset class="form-group">
                                                <label for="title">Title <span class="danger">*</span>:</label>
                                                <input type="text" id="title" value=""
                                                       class="form-control" min="1"
                                                       max="255" required
                                                       placeholder="Enter Title" name="title">
                                            </fieldset>

                                            <fieldset class="form-group">
                                                <label for="description">Description <span
                                                            class="danger">*</span>:</label>
                                                <textarea id="description"
                                                          class="form-control" minlength="1"
                                                          maxlength="255" required style="height: 150px;"
                                                          placeholder="Enter Description" name="description"></textarea>
                                            </fieldset>

                                            {{--<fieldset class="form-group">
                                                <label for="image">Banner Image:</label>
                                                <input type="file" id="image" value=""
                                                       class="form-control" name="image">
                                            </fieldset>

                                            <fieldset class="form-group">
                                                <label for="image">Attach Files:</label>
                                                <input type="file" id="image" value=""
                                                       class="form-control" name="image">
                                            </fieldset>--}}

                                            {{--<fieldset class="form-group">
                                                <label for="target">Target <span class="danger">*</span>:</label>
                                                <select class="select2-placeholder form-control" name="target"
                                                        id="target">
                                                    <option>All</option>
                                                    <option>Homeroom Teachers</option>
                                                    <option>Office Staff</option>
                                                    <option>Teachers</option>
                                                    <option>Teacher 1</option>
                                                </select>
                                            </fieldset>--}}

                                            <fieldset class="form-group">
                                                <label for="start">Start Date: <span class="danger">*</span>: </label>
                                                <input type="date" id="start"
                                                       value="{{ \Carbon\Carbon::now()->format('Y-m-d') }}"
                                                       class="form-control" name="start">
                                            </fieldset>

                                            <fieldset class="form-group">
                                                <label for="end">End Date: <span class="danger">*</span>: </label>
                                                <input type="date" id="end"
                                                       value="{{ \Carbon\Carbon::now()->addDay(1)->format('Y-m-d') }}"
                                                       class="form-control" name="end">
                                            </fieldset>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="form-actions right">
        <button type="button" class="btn btn-success" onclick="create_announcement();">Create Announcement</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
    </div>
</form>

<script>
    function create_announcement() {
        let id = '{{ Auth::id() }}', title = $('#title').val(), description = $('#description').val(),
            start = $('#start').val(), end = $('#end').val();

        $.ajax({
            url: '{{ route('announcement.store') }}',
            type: 'POST',
            data: {
                'id': id,
                'title': title,
                'description': description,
                'start': start,
                'end': end,
                '_token': token
            },
            success: function (response) {
                location.reload();
            }
        });
        return false;
    }
</script>


