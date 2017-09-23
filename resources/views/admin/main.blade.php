@if( Auth::user()->role == 'admin' )
@include('admin.partials.head')
<div class="wrapper">
    <!-- Sidebar -->
    @include('admin.partials.sidebar')
    <div class="main-panel">
         @include('admin.partials.header')
      <!-- Header -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                     <div class="col-md-12">
                        <div class="card">
                            <div class="header">
                                @yield('content')
                            </div>
                            <div class="content">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

@include('admin.partials.footer')
@else
    Cannot Access this page
@endif


        
