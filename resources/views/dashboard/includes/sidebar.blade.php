<!-- Left Panel -->
<aside id="left-panel" class="left-panel">
    <nav class="navbar navbar-expand-sm navbar-default">
        <div id="main-menu" class="main-menu collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li class="{{ Request::is('dashboard') ? 'active' : '' }}">
                    <a href="{{ route('dashboard') }}"><i class
                        ="menu-icon fa fa-laptop"></i>Dashboard </a>
                </li>
                <li class="menu-title">Barang</li><!-- /.menu-title -->
                <li class="{{ Request::is('dashboard/products') ? 'active' : '' }}">
                    <a href="{{ route('products.index') }}"> <i class="menu-icon fa fa-list"></i>Lihat Barang</a>
                </li>
                <li class="{{ Request::is('dashboard/products/create') ? 'active' : '' }}">
                    <a href="{{ route('products.create') }}"> <i class="menu-icon fa fa-plus"></i>Tambah Barang</a>
                </li>

                <li class="menu-title">Foto Barang</li><!-- /.menu-title -->
                <li class="{{ Request::is('dashboard/galleries') ? 'active' : '' }}">
                    <a href="{{ route('galleries.index') }}"> <i class="menu-icon fa fa-list"></i>Lihat Foto Barang</a>
                </li>
                <li class="{{ Request::is('dashboard/galleries/create') ? 'active' : '' }}">
                    <a href="{{ route('galleries.create') }}"> <i class="menu-icon fa fa-plus"></i>Tambah Foto Barang</a>
                </li>

                @can('admin')
                    <li class="menu-title">Transaksi</li><!-- /.menu-title -->
                    <li class="{{ Request::is('dashboard/transaction*') ? 'active' : '' }}">
                        <a href="{{ route('transaction.index') }}"> <i class="menu-icon fa fa-list"></i>Lihat Transaksi</a>
                    </li>

                    <li class="menu-title">Category</li><!-- /.menu-title -->
                    <li class="{{ Request::is('dashboard/category') ? 'active' : '' }}">
                        <a href="{{ route('category.index') }}"> <i class="menu-icon bi bi-grid"></i>Lihat Category</a>
                    </li>
                    <li class="{{ Request::is('dashboard/category/create') ? 'active' : '' }}">
                        <a href="{{ route('category.create') }}"> <i class="menu-icon fa fa-plus"></i>Tambah Category</a>
                    </li>
                @endcan
                
            </ul>
        </div><!-- /.navbar-collapse -->
    </nav>
</aside>
<!-- /#left-panel -->