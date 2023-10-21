
<div class="py-4" style="border-top: 1.5px solid black;">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-3 col-sm-3 my-3">
                <img class="img-fluid img-brand d-block mx-auto" src="assets/img/logo.png" alt="..." aria-label="Logo" />
            </div>
            <div class="col-md-3 col-sm-3 my-3">
                <a href="https://www.tokopedia.com/japanesetime"><img class="img-fluid img-brand d-block mx-auto" src="assets/img/tokped.png" alt="..." aria-label="Tokopedia Logo" /></a>
            </div>
            <div class="col-md-3 col-sm-3 my-3">
                <a href="https://shopee.co.id/japanesetime"><img class="img-fluid img-brand d-block mx-auto" src="assets/img/shopee.png" alt="..." aria-label="Shopee Logo" /></a>
            </div>
            <div class="col-md-3 col-sm-3 my-3">
                <img class="img-fluid img-brand d-block mx-auto" src="assets/img/logo.png" alt="..." aria-label="Logo" />
            </div>
        </div>
    </div>
</div>
<footer class="footer py-4">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-4 text-lg-start">Copyright &copy; Juan Wira Lukmarda</div>
            <div class="col-lg-4 my-3 my-lg-0">
                <a class="btn btn-dark btn-social mx-2" href="https://www.instagram.com/japanesetime/" aria-label="Instagram"><i class="fab fa-instagram"></i></a>
                {{-- <a class="btn btn-dark btn-social mx-2" href="#!" aria-label="Facebook"><i class="fab fa-facebook-f"></i></a> --}}
            </div>
            <div class="col-lg-4 text-lg-end">
            @auth
            <form action="/logout" method="POST" style="margin: 0">
                @csrf
                <button type="submit"class="me-3 btn btn-outline-dark">Logout</button>
            </form>
            {{-- <div class="me-3">ADMIN, {{ auth()->user()->username }}</div> --}}
            @else
            <a class="admin text-decoration-none me-3" href="/login"><i class="bi bi-wrench-adjustable"></i> Admin</a>
            @endauth
            </div>
        </div>
    </div>
</footer>