<div class="col-md-4 mb-3" id="contact-form">
    <h4 class="--roboto-condensed --body-20 mb-3">CONNECT WITH US</h4>
    <div class="--poppins">
        <form action="{{ route('contacts.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <input type="text" name="full_name" id="" class="form-control" placeholder="Full name">
            </div>
            <div class="form-group">
                <input type="text" name="subject" id="" class="form-control" placeholder="Subject">
            </div>

            <div class="form-group">
                <input type="text" name="email" id="" class="form-control" placeholder="email">
            </div>
            <div class="form-group">
                <textarea name="message" id="" cols="30" rows="5" class="form-control" placeholder="message"></textarea>
            </div>

            <input type="submit" value="SEND" class="btn btn-block --border-radius-30 --btn-outline-green">
        </form>
    </div>
</div>
