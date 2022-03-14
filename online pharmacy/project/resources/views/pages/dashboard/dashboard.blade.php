
@include('pages.seller.sellerDashboard')
@elseif(session('role') == 'user')

@include('pages.login');
@endif