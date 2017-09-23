@extends('masterpage')

@section('content')

  <!-- Page Wrapper -->
  <div class="page-wrapper">
    <!-- Main Content Wrapper -->
    <main class="content-wrapper" style="padding:0">
      <!-- Container -->
      <form method="post" class="container padding-top-3x padding-bottom-2x">
        <h1 class="space-top-half">Profile</h1>
        <div class="row padding-top">

            <!-- Sidebar -->
            <div class="col-md-3 col-md-offset-1 col-sm-4 padding-bottom" style="margin:0px 0 0 auto;">
              <aside>
                <img style="border-radius:100%;" width="100" height="100" src="/img/profile-default.png" alt="">
                <h3 style="margin: 20px 0 0 0;">{{ Auth::user()->first_name }} {{ Auth::user()->last_name }}</h3>
                <p style="margin:0px" class="text-sm text-gray">{{ Auth::user()->username }}</p>
                <h5 class="text-gray">{{ Auth::user()->email }}</h5>
              </aside>
            </div><!-- .col-md-3.col-sm-4 -->

          <!-- Checkout Form -->
          <div class="col-sm-8 padding-bottom">
            <div class="row">
              <h3 style="padding-left: 15px">Edit Profile</h3>
              <div class="col-sm-6">
                 <input value="{{ Auth::user()->username }}" type="text" class="form-control" name="username" placeholder="Username" >
                 <input value="{{ Auth::user()->first_name }}" type="text" class="form-control" name="first_name" placeholder="First name" required>
                 <input value="{{ Auth::user()->phone }}" type="number" class="form-control" name="phone" placeholder="Phone">
              </div>
              <div class="col-sm-6">
                 <input value="{{ Auth::user()->email }}" type="email" class="form-control" name="email" placeholder="Email" required>
                 <input value="{{ Auth::user()->last_name }}" type="text" class="form-control" name="last_name" placeholder="Last name">
                 <input value="{{ Auth::user()->postal_code }}" type="text" class="form-control" name="postal_code" placeholder="Postal code">
              </div>
            </div><!-- .row -->
            <input value="{{ Auth::user()->address }}" type="text" class="form-control" name="saddress" placeholder="Address">
            <button type="submit" class="btn btn-pill btn-ghost btn-primary waves-effect waves-light ajax-load-link pull-right">Save Profile</button>
          </div><!-- .col-sm-8 -->
        </div><!-- .row -->
        </form> 

        <!-- order history -->
        <div class="row padding-top">

            <!-- temp -->
            <div class="col-md-3 col-md-offset-1 col-sm-4 padding-bottom" style="margin:0px 0 0 auto;"></div>

          <!-- Checkout Form -->
          <div id="order-history" class="col-sm-8 padding-bottom">
            <div class="row">
              <h3>Order History</h3>
              <table>
                  <tr>
                      <td><strong>Transaction code</strong></td>
                      <td><strong>Transaction date</strong></td>
                      <td><strong>Total Fee</strong></td>
                      <td><strong>Status</strong></td>
                  </tr>
                  
                  @foreach($transactions as $item)
                  <tr class="" id="">
                      <td>{{ $item->transaction_code }}</td>
                      <td>{{ $item->created_at }}</td>
                      <td>IDR. {{  $item->total_fee }}</td>
                      <td>{{ $item->status }}</td>
                  </tr>
                  @endforeach

                  <!-- if there is no history -->
                  <!-- <tr>
                      <td rowspan="4">no history :(</td>
                      <td></td><td></td><td></td>
                  </tr> -->
              </table>
            </div>
          </div><!-- .col-sm-8 -->
        </div><!-- .row -->

        <!-- validation Form -->
        <form method="POST" action="">
        <div class="row padding-top">

            <!-- Sidebar -->
            <div class="col-md-3 col-md-offset-1 col-sm-4 padding-bottom" style="margin:0px 0 0 auto;"></div>

          <div class="col-sm-8 padding-bottom">
            <div class="row">
              <h3 style="padding-left: 15px">Payment Validation</h3>
              <div class="col-sm-6">
                 <input type="text" class="form-control" name="co_trans_name" placeholder="Transaction code">
              </div>
              <div class="col-sm-6">
                 <input placeholder="Transaction date" class="form-control" type="text" onfocus="(this.type='date')" onblur="(this.type='text')"  id="date">
              </div>
            </div><!-- .row -->
            <button type="submit" class="btn btn-pill btn-ghost btn-primary waves-effect waves-light ajax-load-link pull-right">Upload</button>
            <button type="file" class="btn btn-pill btn-ghost btn-primary waves-effect waves-light ajax-load-link pull-right">Select Photo</button>
            <img width="170" height="340" src="/img/sample-bukti-transfer.jpg" alt="">
          </div><!-- .col-sm-8 -->
        </div><!-- .row -->
      </form><!-- .container -->

@endsection
