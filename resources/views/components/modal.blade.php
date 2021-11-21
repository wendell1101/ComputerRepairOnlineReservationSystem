<div>
    {{-- MODALS --}}
    {{-- Tip: Loop modals for each set of data --}}
    <div class="modal fade" id="update-confirmation-modal" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="update-confirmation-modal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Confirmation</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <p>Do you want to save the changes?</p>
                </div>

                <div class="modal-footer">
                    <div class="row">
                        <div class="col-6">
                            <button type="button" class="btn btn-outline-secondary btn-block" data-dismiss="modal">Cancel</button>
                        </div>

                        <div class="col-6">
                            <button type="button" class="btn btn-outline-primary btn-block" id="modal-save-btn">Save</button>
                        </div>

                        {{-- FORMS FOR EACH DATA SETS --}}
                        <form id="reservation-update-{{'id'}}" action="" class="d-none" method="post">
                            @csrf
                        </form>

                        <form id="product-update-{{'id'}}" action="" class="d-none" method="post">
                            @csrf
                        </form>

                        <form id="category-update-{{'id'}}" action="" class="d-none" method="post">
                            @csrf
                        </form>

                        <form id="user-update-{{'id'}}" action="" class="d-none" method="post">
                            @csrf
                        </form>
                    </div>
                </div>
          </div>
        </div>
      </div>
</div>