<script type="text/javascript">
    try{ace.settings.loadState('sidebar')}catch(e){}
</script>

@php
    $nav_master = "";
@endphp

@switch(Session::get('nav_active'))
    @case('master')
        @php $nav_master = 'active open'; @endphp
    @break
@endswitch

@php
    $sub_master_bank = ""; $sub_master_bloodtype = "";
@endphp

@switch(Session::get('sub_active'))
    @case('bank')
        @php $sub_master_bank = 'active'; @endphp
    @break
    @case('bloodtype')
        @php $sub_master_bloodtype = 'active'; @endphp
    @break
@endswitch

<ul class="nav nav-list">
    <li class="">
        <a href="#">
            <i class="menu-icon fa fa-tachometer"></i>
            <span class="menu-text"> Dashboard </span>
        </a>
        <b class="arrow"></b>
    </li>
    <li class="{{ $nav_master }}">
        <a href="#" class="dropdown-toggle">
            <i class="menu-icon fa fa-list"></i>
            <span class="menu-text"> Master </span>

            <b class="arrow fa fa-angle-down"></b>
        </a>
        <b class="arrow"></b>
        <ul class="submenu">
            <li class="{{ $sub_master_bank }}">
                <a href="{{ URL('master/bank') }}">
                    <i class="menu-icon fa fa-caret-right"></i>
                    Bank
                </a>
                <b class="arrow"></b>
            </li>
            <li class="{{ $sub_master_bloodtype }}">
                <a href="{{ route('blood-type.index') }}">
                    <i class="menu-icon fa fa-caret-right"></i>
                    Golongan Darah
                </a>
                <b class="arrow"></b>
            </li>
            <li class="{{ $sub_master_bloodtype }}">
                <a href="{{ route('department.index') }}">
                    <i class="menu-icon fa fa-caret-right"></i>
                    Divisi
                </a>
                <b class="arrow"></b>
            </li>
            <li class="{{ $sub_master_bloodtype }}">
                <a href="{{ route('designation.index') }}">
                    <i class="menu-icon fa fa-caret-right"></i>
                    Posisi
                </a>
                <b class="arrow"></b>
            </li>
            <li class="{{ $sub_master_bloodtype }}">
                <a href="{{ route('gender.index') }}">
                    <i class="menu-icon fa fa-caret-right"></i>
                    Jenis Kelamin
                </a>
                <b class="arrow"></b>
            </li>
            <li class="{{ $sub_master_bloodtype }}">
                <a href="{{ route('job-status.index') }}">
                    <i class="menu-icon fa fa-caret-right"></i>
                    Status Kerja
                </a>
                <b class="arrow"></b>
            </li>
            <li class="{{ $sub_master_bloodtype }}">
                <a href="{{ route('marital.index') }}">
                    <i class="menu-icon fa fa-caret-right"></i>
                    Status Pernikahan
                </a>
                <b class="arrow"></b>
            </li>
            <li class="{{ $sub_master_bloodtype }}">
                <a href="{{ route('religion.index') }}">
                    <i class="menu-icon fa fa-caret-right"></i>
                    Agama
                </a>
                <b class="arrow"></b>
            </li>
            <li class="{{ $sub_master_bloodtype }}">
                <a href="{{ route('taxes.index') }}">
                    <i class="menu-icon fa fa-caret-right"></i>
                    Perpajakan
                </a>
                <b class="arrow"></b>
            </li>
        </ul>
    </li>
</ul><!-- /.nav-list -->

<div class="sidebar-toggle sidebar-collapse" id="sidebar-collapse">
    <i id="sidebar-toggle-icon" class="ace-icon fa fa-angle-double-left ace-save-state" data-icon1="ace-icon fa fa-angle-double-left" data-icon2="ace-icon fa fa-angle-double-right"></i>
</div>
