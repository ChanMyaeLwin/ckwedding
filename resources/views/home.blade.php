@extends('layouts.app')

@section('content')
<div class="content-page">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-4">
                <div class="card card-transparent card-block card-stretch card-height border-none">
                    <div class="card-body p-0 mt-lg-2 mt-0">
                        <h3 class="mb-3">{{__('home.hi')}} , {{Auth::user()->name}}</h3>
                        <p class="mb-3"><strong>
                                @foreach ($branches as $branch)
                                {{ $branch->branches->branch_name }} <br>
                                @endforeach
                            </strong></p>
                    </div>
                </div>
            </div>
            <div class="col-lg-8">
                <div class="row">
                    @can('view-dashboard-return-total')
                    <div class="col-lg-4 col-md-4">
                        <div class="card card-block card-stretch card-height">

                            <div class="card-body">
                                <div class="d-flex align-items-center mb-4 card-total-sale">
                                    <div class="icon iq-icon-box-2 bg-info-light">
                                        <img src="{{ asset('images/return_icon.png') }}" class="img-fluid" alt="image">
                                    </div>
                                    <div>
                                        <a href="{{route('documents.index','type=1')}}">
                                            <p class="mb-2">{{__('home.total_return_document')}}</p>
                                        </a>
                                        <h4>{{number_convert($totalReturnDoc)}}</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endcan
                    @can('view-dashboard-return-finish')
                    <div class="col-lg-4 col-md-4">
                        <div class="card card-block card-stretch card-height">
                            <div class="card-body">
                                <div class="d-flex align-items-center mb-4 card-total-sale">
                                    <div class="icon iq-icon-box-2 bg-success-light">
                                        <img src="{{ asset('images/return_icon.png') }}" class="img-fluid" alt="image">
                                    </div>
                                    <div>
                                        <a href="{{route('document_detail_listing','detail_type=1')}}">
                                            <p class="mb-2">{{__('home.finish_return_document')}}</p>
                                        </a>
                                        <h4>{{number_convert($completeReturnDoc)}}</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endcan
                    @can('view-dashboard-return-pending')
                    <div class="col-lg-4 col-md-4">
                        <div class="card card-block card-stretch card-height">
                            <div class="card-body">
                                <div class="d-flex align-items-center mb-4 card-total-sale">
                                    <div class="icon iq-icon-box-2 bg-danger-light">
                                        <img src="{{ asset('images/return_icon.png') }}" class="img-fluid" alt="image">
                                    </div>
                                    <div>
                                        <a href="{{route('document_detail_listing','detail_type=2')}}">
                                            <p class="mb-2">{{__('home.pending_return_document')}}</p>
                                        </a>
                                        <h4>{{number_convert($totalReturnDoc - $completeReturnDoc)}}</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endcan
                    @can('view-dashboard-exchange-total')
                    <div class="col-lg-4 col-md-4">
                        <div class="card card-block card-stretch card-height">
                            <div class="card-body">
                                <div class="d-flex align-items-center mb-4 card-total-sale">
                                    <div class="icon iq-icon-box-2 bg-info-light">
                                        <img src="{{ asset('images/exchange_icon.png') }}" class="img-fluid" alt="image">
                                    </div>
                                    <div>
                                        <a href="{{route('documents.index','type=2')}}">
                                            <p class="mb-2">{{__('home.total_exchange_document')}}</p>
                                        </a>
                                        <h4>{{number_convert($totalExchangeDoc)}}</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endcan
                    @can('view-dashboard-exchange-finish')
                    <div class="col-lg-4 col-md-4">
                        <div class="card card-block card-stretch card-height">
                            <div class="card-body">
                                <div class="d-flex align-items-center mb-4 card-total-sale">
                                    <div class="icon iq-icon-box-2 bg-success-light">
                                        <img src="{{ asset('images/exchange_icon.png') }}" class="img-fluid" alt="image">
                                    </div>
                                    <div>
                                        <a href="{{route('document_detail_listing','detail_type=3')}}">
                                            <p class="mb-2">{{__('home.finish_exchange_document')}}</p>
                                        </a>
                                        <h4>{{number_convert($completeExchangeDoc)}}</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endcan
                    @can('view-dashboard-exchange-pending')
                    <div class="col-lg-4 col-md-4">
                        <div class="card card-block card-stretch card-height">
                            <div class="card-body">
                                <div class="d-flex align-items-center mb-4 card-total-sale">
                                    <div class="icon iq-icon-box-2 bg-danger-light">
                                        <img src="{{ asset('images/exchange_icon.png') }}" class="img-fluid" alt="image">
                                    </div>
                                    <div>
                                        <a href="{{route('document_detail_listing','detail_type=4')}}">
                                            <p class="mb-2">{{__('home.pending_exchange_document')}}</p>
                                        </a>
                                        <h4>{{number_convert($totalExchangeDoc - $completeExchangeDoc)}}</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endcan
                    @can('view-dashboard-overdue-exchange-document')
                    <div class="col-lg-4 col-md-4">
                        <div class="card card-block card-stretch card-height">
                            <div class="card-body">
                                <div class="d-flex align-items-center mb-4 card-total-sale">
                                    <div class="icon iq-icon-box-2 bg-danger-light">
                                        <img src="{{ asset('images/overdue_exchange_document.png') }}" class="img-fluid" alt="image">
                                    </div>
                                    <div>
                                        <a href="{{route('document_detail_listing','detail_type=5')}}">
                                            <p class="mb-2">{{__('home.overdue_exchange_document')}}</p>
                                        </a>
                                        <h4>{{number_convert($overdueExchangeDoc)}}</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endcan
                    @can('view-dashboard-total-user')
                    <div class="col-lg-4 col-md-4">
                        <div class="card card-block card-stretch card-height">
                            <div class="card-body">
                                <div class="d-flex align-items-center mb-4 card-total-sale">
                                    <div class="icon iq-icon-box-2 bg-info-light">
                                        <img src="{{ asset('images/member_image.png') }}" class="img-fluid" alt="image">
                                    </div>
                                    <div>
                                        <a href="{{route('users.index')}}">
                                            <p class="mb-2">{{__('home.total_user')}}
                                        </a></p>
                                        <h4>{{number_convert($totalUser)}}</h4>
                                    </div>
                                </div>
                                <div class="iq-pFrogress-bar mt-2">
                                    <span class="bg-info iq-progress progress-1" data-percent="85">
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endcan
                    @can('view-dashboard-total-supplier')
                    <div class="col-lg-4 col-md-4">
                        <div class="card card-block card-stretch card-height">
                            <div class="card-body">
                                <div class="d-flex align-items-center mb-4 card-total-sale">
                                    <div class="icon iq-icon-box-2 bg-danger-light">
                                        <img src="{{ asset('images/department_image.png') }}" class="img-fluid" alt="image">
                                    </div>
                                    <div>
                                        <a href="{{ route('suppliers.index')}}">
                                            <p class="mb-2">{{__('home.total_supplier')}}</p>
                                        </a>
                                        <h4>{{number_convert($totalSupplier)}}</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endcan
                    @can('view-dashboard-total-branch')
                    <div class="col-lg-4 col-md-4">
                        <div class="card card-block card-stretch card-height">
                            <div class="card-body">
                                <div class="d-flex align-items-center mb-4 card-total-sale">
                                    <div class="icon iq-icon-box-2 bg-success-light">
                                        <img src="{{ asset('images/branch_image.png') }}" class="img-fluid" alt="image">
                                    </div>
                                    <div>
                                        <a href="{{ route('branches.index')}}">
                                            <p class="mb-2">{{__('home.total_branch')}}</p>
                                        </a>
                                        <h4>{{ number_convert($totalBranch) }}</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endcan
                    @can('view-dashboard-total-role')
                    <div class="col-lg-4 col-md-4">
                        <div class="card card-block card-stretch card-height">
                            <div class="card-body">
                                <div class="d-flex align-items-center mb-4 card-total-sale">
                                    <div class="icon iq-icon-box-2 bg-success-light">
                                        <img src="{{ asset('images/role_image.png') }}" class="img-fluid" alt="image">
                                    </div>
                                    <div>
                                        <a href="{{ route('roles.index')}}">
                                            <p class="mb-2">{{__('home.total_role')}}</p>
                                        </a>
                                        <h4>{{number_convert($totalBranch)}}</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endcan
                </div>
            </div>

        </div>
        <!-- Page end  -->
    </div>
</div>
@endsection