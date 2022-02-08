<div class="col-md-4 mb-3" id="contact-form">
    <h4 class="--roboto-condensed --body-20 mb-3">CONNECT WITH US</h4>
    <div class="--poppins">
        <form action="{{ route('contacts.store') }}" method="POST">
            @csrf
            @if(!Auth::user())
            <div class="form-group">
                <input type="text" name="full_name" id="full_name" class="form-control" placeholder="full name" required>
            </div>
            @endif
            <div class="form-group">
                <input type="text" name="subject" id="subject" class="form-control" placeholder="subject" required>
            </div>
            @if(!Auth::user())
            <div class="form-group">
                <input type="email" name="email" id="email" class="form-control" placeholder="email" required>
            </div>
            @endif
            <div class="form-group">
                <textarea name="message" id="message" cols="30" rows="5" class="form-control" placeholder="message" required></textarea>
            </div>

            <input type="submit" value="SEND" class="btn btn-block --border-radius-30 --btn-outline-green">
        </form>
    </div>
</div>
