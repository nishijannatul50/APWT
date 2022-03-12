@if(session('role') == 'admin')
@include('pages.adminDashboard')
@elseif(session('role') == 'user')
@include('pages.userDashboard')
@else
@include('pages.login');
@endif