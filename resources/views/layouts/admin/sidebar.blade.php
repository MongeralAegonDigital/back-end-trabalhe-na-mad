<!--sidebar start-->
<aside>

    <div id="sidebar"  class="nav-collapse ">
        <!-- sidebar menu start-->
        <ul class="sidebar-menu" id="nav-accordion">

            <p class="centered">
                <a href="">
                    <img src="{{url('assets/img/usuarios/avatar.jpg')}}" class="img-rounded" width="100">
                </a></p>
            <h5 class="centered"><i class="fa fa-user fa-fw"></i>{{ Auth::user()->name }}</h5>
            <hr>

            <li class="sub-menu">
                <a class="" href="{{route('admin.home')}}">
                    <span><i class="fa fa-home" aria-hidden="true"></i><strong>Home</strong></span>
                </a>
            </li>
            <li class="sub-menu">
                <a class="" href="{{route('admin.categoria.index')}}">
                    <span><i class="fa fa-check-circle-o" aria-hidden="true"></i><strong>Categorias</strong></span>
                </a>
            </li>
            <li class="sub-menu">
                <a class="" href="{{route('admin.produtos.index')}}">
                    <span><i class="fa fa-plus-circle" aria-hidden="true"></i><strong>Produtos</strong></span>
                </a>
            </li>
            <li class="sub-menu">
                <a class="" title="Usuários" href="{{route('admin.users.index')}}">
                    <span><i class="fa fa-user" aria-hidden="true"></i><strong>Usuários</strong></span>
                </a>
            </li>
        </ul>
        <!-- sidebar menu end-->
    </div>
</aside>
<!--sidebar end-->
