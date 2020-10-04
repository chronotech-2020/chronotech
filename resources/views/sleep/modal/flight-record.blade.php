<div class="modal fade" id="flightrecordModal" aria-hidden="false"  role="dialog" tabindex="-1">
    <form method="POST" action="{{ route('flights.store') }}" autocomplete="off">
    @csrf
    <div class="modal-dialog modal-simple modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title"> Flight Record </h4>
                <button type="button" class="close float-right" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span> 
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label>Flight Start</label>
                    <input type="time" class="form-control" name="flight_start_time" required/>
                </div>
                <div class="form-group">
                    <label>Flight Landing</label>
                    <input type="time" class="form-control" name="flight_end_time" required/>
                </div>
                <button type="submit" class="btn btn-primary float-right">Submit</button>
            </div>
        </div>
    </div>
    </form>
 </div>
 <!-- End Modal -->

