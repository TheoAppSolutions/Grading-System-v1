<div class="modal-footer">
    @if($checkbox == 'true')
    <div class="col-1">
            <button type="button" onclick="clearChecked();" class="btn btn-default pull-left">Clear
            </button>
    </div>
    @endif
    <div class="col-7">
        @if($prev != '')
            <button class='btn btn-danger text-center' type="button"
                    onclick="submit('prev');">
                Save & Prev
            </button>
        @endif
        @if($next != '')
            <button class='btn btn-info text-center' type="button"
                    onclick="submit('next');">
                Save & Next
            </button>
        @endif
    </div>
    <div class="col-4">
        <button type="button" class="btn btn-primary" onclick="submit();">Save & Close</button>
        <button type="button" data-dismiss="modal" class="btn btn-default">Close</button>
    </div>
</div>
