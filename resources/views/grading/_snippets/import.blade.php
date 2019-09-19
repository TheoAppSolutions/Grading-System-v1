<form action="{{ route('grades.import') }}" method="POST">
    <input type="hidden" value="{{ $currentQuarter }}" name="currentQuarter">
    @csrf
    <div class="form-body">
        <div class="form-section row">
            <div class="form-group col-12">
                Copy and Paste <code>Import Codes Here</code>
            </div>
        </div>

        <div class="form-group">
            <textarea class=form-control name="import" required></textarea>
        </div>
    </div>

    <div class="form-actions right">
        <button type="submit" class="btn btn-success">Import</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
    </div>
</form>