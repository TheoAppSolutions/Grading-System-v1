<div class="clearfix blue-grey lighten-2 text-sm-center mb-0 px-2">
      <span class="float-md-left d-block d-md-inline-block">
          Copyright &copy; {{ date('Y') }}, All rights reserved.
      </span>
    @php($project_status = getProjectStatus())
    @if($project_status == "System is up to date")
        <span class="float-md-right d-block d-md-inline-blockd-none d-lg-block success">
            System is up-to-date <i class="ft-check-circle"></i>
        </span>
    @elseif($project_status == "System is outdated")
        <span class="float-md-right d-block d-md-inline-blockd-none d-lg-block danger">
            System is out-of-date <i class="ft-x-circle"></i>
        </span>
    @endif
</div>
