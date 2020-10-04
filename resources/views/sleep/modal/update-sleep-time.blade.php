<div class="modal fade" id="sleepAndWakeUpTimeModal" aria-hidden="false"  role="dialog" tabindex="-1">
    <form method="POST" action="{{ route('sleep.store') }}" autocomplete="off">
    @csrf
    <div class="modal-dialog modal-simple modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title"> Sleep and Wake Time </h4>
                <button type="button" class="close float-right" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span> 
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label>Sleep Time</label>
                    <input type="time" class="form-control" name="sleep_time" required/>
                </div>
                <div class="form-group">
                    <label>Wake Time</label>
                    <input type="time" class="form-control" name="wake_time" required/>
                </div>
                <button type="submit" class="btn btn-primary float-right">Submit</button>
            </div>
        </div>

    </div>
    </form>
 </div>
 <!-- End Modal -->

