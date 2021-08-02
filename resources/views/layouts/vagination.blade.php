<ul class="sidebar-menu">
    <li class="header"><strong>MAIN NAVIGATION</strong></li>
    <li class="treeview"><a href="#">
        <i class="icon icon-sailing-boat-water purple-text s-18"></i> <span>Dashboard</span>
        <i class="icon icon-angle-right s-18 pull-right"></i>
    </a>
    </li>

    <li class="header light"><strong>MASTER ROLE</strong></li>
    <li>
        <a href="{{route('MasterRole.role.index')}}">
            <i class="icon icon-key4 amber-text s-18"></i> <span>Role</span>
            <i class="icon icon-angle-right s-18 pull-right"></i>
        </a>
    </li>
    <li class="no-b">
        <a href="{{route('MasterRole.permissions.index')}}">
            <i class="icon icon-clipboard-list2 text-success s-18"></i> <span>Permission</span>
            <i class="icon icon-angle-right s-18 pull-right"></i>
        </a>
    </li>
    <li>
        <a href="{{route('MasterRole.pengguna.index')}}"><i class="icon icon-user blue-text s-18"></i>
        <span>Pengguna</span>
        <i class="icon icon-angle-right s-18 pull-right"></i>
        </a>
    </li>

    <li class="header"><strong>APOTEK ASYFA</strong></li>
    <li>
        <a href="{{route('Asyfa.Data_barang.index')}}"><i class="icon icon-glass blue-text s-18"></i>
        <span>Data Barang</span>
        <i class="icon icon-angle-right s-18 pull-right"></i>
        </a>
    </li>
    <li>
        <a href="{{route('Asyfa.Jenis_barang.index')}}"><i class="icon icon-th-list blue-text s-18"></i>
        <span>Jenis Barang</span>
        <i class="icon icon-angle-right s-18 pull-right"></i>
        </a>
    </li>
</ul>
