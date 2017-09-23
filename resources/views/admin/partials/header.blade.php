<nav class="navbar navbar-default navbar-fixed">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#">Admin Page</a>
                </div>
                <div id="navbar" class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-extended">
                        <li class="{{ Request::is('admin/dashboard') ? 'active' : ''}}" >
                    <a href="{{url('/admin/dashboard')}}">
                        <p>Dashboard</p>
                    </a>
                </li>
                <li class="{{ Request::is('admin/code') ? 'active' : ''}}">
                    <a href="{{url('/admin/code')}}">
                        <p>Unique Code</p>
                    </a>
                </li>
                <li class="{{ Request::is('admin/product') ? 'active' : ''}}">
                    <a href="{{url('/admin/product')}}">
                        <p>Product</p>
                    </a>
                </li>
                <li class="{{ Request::is('admin/pesanan') ? 'active' : ''}}">
                    <a href="{{url('/admin/pesanan')}}">
                        <p>Pesanan</p>
                    </a>
                </li>
                <!--<li>
                    <a href="{{url('/admin/video')}}">
                        <p>Video</p>
                    </a>
                </li>-->
                <li class="{{ Request::is('admin/registered') ? 'active' : ''}}">
                    <a href="{{url('/admin/registered')}}">
                        <p>Registered</p>
                    </a>
                </li> 
                <li>
                                                        <a href="{{url('/admin/log/cluster')}}">
                                                            <p>Customer CLuster</p>
                                                        </a>
                                                    </li>
                                                    <li >
                                                        <a href="{{url('/admin/log/marker/category')}}">
                                                            <p>A. Rule Category</p>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="{{url('/admin/log/marker/object')}}">
                                                            <p>A. Rule Object</p>
                                                        </a>
                                                    </li>
                    </ul>

                    <ul class="nav navbar-nav navbar-right">
                        <li>
                            <a href="{{url('/admin/logout')}}">
                                Log out
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>