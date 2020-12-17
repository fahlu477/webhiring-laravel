 <div class="mosh-breadcumb-area" style="background-image: url({{ asset('template/mosh/img/core-img/breadcumb.png')}});">
     <div class="container h-100">
         <div class="row h-100 align-items-center">
             <div class="col-12">
                 <div class="bradcumbContent">
                     <h2>{{ __($title ?? 'Info Lowongan Pekerjaan') }}</h2>
                     <nav aria-label="breadcrumb">
                         <ol class="breadcrumb">
                             <li class="breadcrumb-item">
                                 <a href="{{ route('home') }}">{{ __('Home') }}</a>
                             </li>
                             <li class="breadcrumb-item active" aria-current="page">{{ __('Karir') }}</li>
                         </ol>
                     </nav>
                 </div>
             </div>
         </div>
     </div>
 </div>
