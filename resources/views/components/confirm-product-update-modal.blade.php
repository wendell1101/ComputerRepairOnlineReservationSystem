<div>
    {{-- MODALS --}}
    {{-- Tip: Loop modals for each set of data --}}
    <div class="modal fade" id="confirm-product-update-modal-{{'id'}}" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="update-confirmation-modal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Confirmation</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <p>Do you want to save these changes?</p>
                </div>

                <div class="modal-footer">
                    <div class="row">
                        <div class="col-6">
                            <button type="button" class="btn btn-outline-danger btn-block" data-dismiss="modal" onclick="event.preventDefault();">CANCEL</button>
                        </div>

                        <div class="col-6">
                            <button type="button" class="btn btn-outline-success btn-block" id="modal-save-btn" onclick="
                                event.preventDefault();
                                document.querySelector('#product-update-{{'id'}}').submit;
                                ">CONFIRM</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>