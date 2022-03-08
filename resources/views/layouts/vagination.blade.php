<ul class="sidebar-menu">
    <li class="header"><strong>MASTER BERANDA</strong></li>
    @can('dashboard')
    <li class="treeview"><a href="{{route('dashboard')}}">
        <i class="icon icon-sailing-boat-water purple-text s-18"></i> <span>Dashboard</span>
        <i class="icon icon-angle-right s-18 pull-right"></i>
    </a>
    </li>
    @endcan

    <li class="header light"><strong>MASTER AKSES</strong></li>
    @can('akses')
    <li>
        <a href="{{route('MasterRole.role.index')}}">
            <i class="icon icon-key4 amber-text s-18"></i> <span>Akses</span>
            <i class="icon icon-angle-right s-18 pull-right"></i>
        </a>
    </li>
    @endcan
 
    @can('hak_akses')
    <li class="no-b">
        <a href="{{route('MasterRole.permissions.index')}}">
            <i class="icon icon-clipboard-list2 text-success s-18"></i> <span>Hak Akses</span>
            <i class="icon icon-angle-right s-18 pull-right"></i>
        </a>
    </li>
    @endcan

    @can('pengguna')
  
    <li>
        <a href="{{route('MasterRole.pengguna.index')}}"><i class="icon icon-user blue-text s-18"></i>
        <span>Pengguna</span>
        <i class="icon icon-angle-right s-18 pull-right"></i>
        </a>
    </li>

    @endcan
 
   

    <li class="header"><strong>MASTER DATA</strong></li>
    

    @can('jenis_obat')
    <li>
        <a href="{{route('Asyfa.Jenis_barang.index')}}"><i class="icon icon-credit-card2 blue-text s-18"></i>
        <span>Jenis Obat</span>
        <i class="icon icon-angle-right s-18 pull-right"></i>
        </a>
    </li>
    @endcan
  
    @can('satuan')
    <li>
        <a href="{{route('Asyfa.satuan.index')}}"><i class="icon icon-bookmark2 red-text s-18"></i>
        <span>Satuan</span>
        <i class="icon icon-angle-right s-18 pull-right"></i>
        </a>
    </li>
    @endcan

    @can('supplier')

    <li>
        <a href="{{route('Asyfa.supplier.index')}}"><i class="icon icon-car green-text s-18"></i>
        <span>Supplier</span>
        <i class="icon icon-angle-right s-18 pull-right"></i>
        </a>
    </li>

    @endcan

    @can('data_obat')
    <li>
        <a href="{{route('Asyfa.Data_barang.index')}}"><i class="icon icon-glass orange-text s-18"></i>
        <span>Data Obat</span>
        <i class="icon icon-angle-right s-18 pull-right"></i>
        </a>
    </li>
    @endcan

   <li class="header"><strong>MASTER BARANG</strong></li>
    @can('barang_masuk')
        
    <li>
        <a href="{{route('Asyfa.Barang_masuk.index')}}">
            <i class="icon icon-arrow_downward green-text s-18"></i>
            <span>Barang Masuk</span>
            <i class="icon icon-angle-right s-18 pull-right"></i>
        </a>
    </li>
    @endcan
    @can('barang_keluar')
        
    <li>
        <a href="{{route('Asyfa.Barang_keluar.index')}}">
            <i class="icon icon-arrow_upward red-text s-18"></i>
            <span>Barang Keluar</span>
            <i class="icon icon-angle-right s-18 pull-right"></i>
        </a>
    </li>
    @endcan


    

   {{-- @can('transaksi_tunai')
   <li>
        <a href="{{route('Asyfa.transaksi_tunai.index')}}"><i class="icon icon-add_shopping_cart green-text s-18"></i>
        <span>Transaksi Tunai</span>
        <i class="icon icon-angle-right s-18 pull-right"></i>
        </a>
    </li>
    @endcan

    @can('list_transaksi')

    <li>
        <a href="{{route('Asyfa.list_transaksi.index')}}"><i class="icon icon-list3 blue-text s-18"></i>
        <span>List Transaksi</span>
        <i class="icon icon-angle-right s-18 pull-right"></i>
        </a>
    </li>
    @endcan --}}


    <li class="header"><strong>MASTER REPORT</strong></li>

    @can('laporan')
    <li>
        <a href="{{route('Asyfa.laporan_penjualan.index')}}"><i class="icon icon-clipboard-edit2 blue-text s-18"></i>
        <span>Laporan Penjualan</span>
        <i class="icon icon-angle-right s-18 pull-right"></i>
        </a>
    </li>
    @endcan

</ul>
