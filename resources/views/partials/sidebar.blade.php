<aside class="menu-sidebar d-none d-lg-block">
            <div class="logo">
                <h2><b style="font-family: cursive;">Admin</b></h2>
                <a href="/home">
                    <img src="{{ asset ('frontend/images/icons/logokripcok.png') }}" alt="Cool Admin" style="height: 90px;" />
                </a>
            </div>
            <div class="menu-sidebar__content js-scrollbar1">
                <nav class="navbar-sidebar">
                    <ul class="list-unstyled navbar__list">
                        <li>
                            <a href="/home">
                                <i class="fas fa-home"></i>Home</a>
                        </li>
                        <!--  -->
                        <li>
                            <a href="{{route('artikel.index')}}">
                                <i class="fas fa-table"></i>Artikel</a>
                        </li>
                        
                        <li>
                            <a href="{{route('galeri.index')}}">
                                <i class="fas fa-picture-o"></i>Galeri</a>
                        </li>
                        <li>
                            <a href="{{route('kontak.index')}}">
                                <i class="fas fa-inbox"></i>Kontak</a>
                        </li>
                        <li>
                            <a href="{{route('produk.index')}}">
                                <i class="fas fa-list-alt"></i>Produk</a>
                        </li>
                        <li>
                            <a href="{{route('cart.index')}}">
                                <i class="fas fa-shopping-cart"></i>Cart</a>
                        </li>
                        <li>
                            <a href="{{route('custom.index')}}">
                                <i class="fas fa-shopping-cart"></i>Checkout</a>
                        </li>
                        <li>
                            <a href="{{route('testimoni.index')}}">
                                <i class="fas fa-eye"></i>Testimoni</a>
                        </li>
                        <li>
                            <a href="{{route('user.index')}}">
                                <i class="fas fa-user"></i>User</a>
                        </li>
                    </ul>
                </nav>
            </div>
        </aside>