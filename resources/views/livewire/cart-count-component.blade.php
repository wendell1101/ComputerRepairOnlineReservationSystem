<li class="nav-item --underline mx-3 d-flex align-items-center " wire:poll>
    <a href="/cart" class="nav-link">
        <i class="fa" style="font-size:16px; margin-top:3px">&#xf07a;</i>
        {{-- <i class="fas fa-shopping-cart"></i> --}}
        <span class='badge badge-warning' id='lblCartCount'> {{ $cartCount }} </span>
    </a>
</li>

{{-- @section('js')
<script>
    window.addEventListener('cart-count', event => {
        alert('CartCount to: ' + event.detail.count);
    })

</script>
@endsection --}}
