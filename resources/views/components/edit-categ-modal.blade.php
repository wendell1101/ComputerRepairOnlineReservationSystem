<div>
    {{-- MODALS --}}
    {{-- For loop here is temporary. Change to foreach --}}
    @for ($i = 0; $i < 2; $i++)
        <div class="modal fade" id="category-edit-modal-{{$i}}" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="update-confirmation-modal" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel"></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <div class="modal-body">
                        {{-- FORMS FOR EACH DATA SETS --}}
                        <form id="update-category-{{$i}}" action="" class="" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="category-name-{{$i}}">Name</label>
                                <input type="text" name="name" id="category-name-{{$i}}" class="form-control" value="{{'Value here'}}">
                            </div>

                            <div class="form-group">
                                <div class="custom-control custom-switch">
                                    <input type="checkbox" name="status" id="category-status-{{$i}}" class="custom-control-input">

                                    <label for="category-status-{{$i}}" class="custom-control-label">{{'Unavailable||Available'}}</label>
                                </div>
                            </div>

                            <div class="form-group">
                                <button class="btn btn-block btn-outline-dark" id="update-category-btn-{{$i}}" onclick="
                                    event.preventDefault();
                                    document.querySelector('#update-footer-{{$i}}').classList.remove('d-none');
                                    ">UPDATE</button>
                            </div>
                        </form>

                        {{-- CONFIRMATION --}}
                        <div id="update-footer-{{$i}}" class="modal-footer d-none">
                            <div class="row w-100">
                                <div class="col-12">
                                    <p>Do you want save these changes?</p>
                                </div>
                                <div class="col-6">
                                    <button class="btn btn-outline-danger btn-block" data-dismiss="modal" onclick="event.preventDefault();">Cancel</button>
                                </div>
                                <div class="col-6">
                                    <button class="btn btn-outline-success btn-block" onclick="
                                        event.preventDefault();
                                        document.querySelector('#update-category-{{$i}}').submit;
                                        ">SAVE</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endfor
</div>