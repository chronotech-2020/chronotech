<div class="modal fade" id="caffeinebreakModal" aria-hidden="false"  role="dialog" tabindex="-1">
    <form method="POST" action="{{ route('caffeine-intake.store') }}" autocomplete="off">
    @csrf
    <div class="modal-dialog modal-simple modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title"> Caffeine Break </h4>
                <button type="button" class="close float-right" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span> 
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label>Caffeine Break Start</label>
                    <input type="time" class="form-control" name="time_start" required/>
                </div>
                <div class="form-group">
                    <label>Caffeine Break End</label>
                    <input type="time" class="form-control" name="time_end" required/>
                </div>
                <button type="submit" class="btn btn-primary float-right">Submit</button>
            </div>
        </div>
    </div>
    </form>
 </div>
 <!-- End Modal -->

