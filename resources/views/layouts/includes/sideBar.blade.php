<nav class="active" id="sidebar">
 <ul class="list-unstyled lead">
    <li class="active">
        <a href=""> <i class="fa fa-home fa-lg"></i>Home</a>
    </li>
    <li>
        <a href="{{url('product')}}"><i class="fa fa-truck fa-lg"></i>Products</a>
    </li>
    <li>
        <a href="{{url('supplier')}}"><i class="fa fa-industry fa-lg" aria-hidden="true"></i>Supplier</a>
    </li>
    <li>
        <a href="{{url('/orders')}}"><i class="fa fa-box fa-lg" aria-hidden="true"></i>Orders</a>
    </li>
     <li>
         <a href="{{url('/transactions')}}"><i class="fa fa-money-bill fa-lg" aria-hidden="true"></i>Transactions</a>
     </li>
    </ul>

</nav>

<style>
    #sidebar ul.lead{
        border-bottom: 1px solid #4aa0e6;
        width: fit-content;
    }

    #sidebar ul li a{
        padding: 10px;
        font-size: 1.1em;
        display: block;
        width: 30vh;
        color: #008B8B;
    }

    #sidebar ul li a:hover{
        color: #ffffff;
        background: #008B8B;
        text-decoration: none !important;
    }

    #sidebar ul li a i {
        margin-right: 10px;
    }

    #sidebar ul li.active>a,a[aria-expanded="true"]{
        color: #fff;
        background:#008B8B;
    }
</style>
