<style>
    .subscribe {
        position: relative;
        padding: 20px;
        background-color: #FFF;
        border-radius: 4px;
        color: #333;
        box-shadow: 0px 0px 60px 5px rgba(0, 0, 0, 0.4);
    }

    .subscribe:after {
        position: absolute;
        content: "";
        right: -10px;
        bottom: 18px;
        width: 0;
        height: 0;
        border-left: 0px solid transparent;
        border-right: 10px solid transparent;
        border-bottom: 10px solid #763ebd;
    }

    .subscribe p {
        text-align: center;
        font-size: 20px;
        font-weight: bold;
        letter-spacing: 4px;
        line-height: 28px;
    }



    .subscribe .submit-btn {
        position: absolute;
        border-radius: 30px;
        border-bottom-right-radius: 0;
        border-top-right-radius: 0;
        background-color: #763ebd;
        color: #FFF;
        padding: 12px 25px;
        display: inline-block;
        font-size: 12px;
        font-weight: bold;
        letter-spacing: 5px;
        right: -10px;
        bottom: -20px;
        cursor: pointer;
        transition: all .25s ease;
        box-shadow: -5px 6px 20px 0px rgba(26, 26, 26, 0.4);
    }

    .subscribe .submit-btn:hover {
        background-color: #763ebd;
        box-shadow: -5px 6px 20px 0px rgb(255, 255, 255);
    }
</style>

<style>
    .loading-overlay {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.5);
        z-index: 9999;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .loading-spinner {
        width: 40px;
        height: 40px;
        border: 4px solid #f3f3f3;
        border-top: 4px solid #3498db;
        border-radius: 50%;
        animation: spin 1s linear infinite;
    }

    @keyframes spin {
        0% { transform: rotate(0deg); }
        100% { transform: rotate(360deg); }
    }
</style>

<div class="loading-overlay" id="loadingSpinner" style="display: none;">
    <div class="loading-spinner"></div>
</div>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@10.15.6/dist/sweetalert2.min.css">
<!-- SweetAlert CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.20/dist/sweetalert2.min.css">

<!-- SweetAlert JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.20/dist/sweetalert2.min.js"></script>

<!--  Body Wrapper -->
<div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-sidebartype="full" data-sidebar-position="fixed" data-header-position="fixed">
    <!-- Sidebar Start -->
    <aside class="left-sidebar card">
      <!-- Sidebar scroll-->
      <div>
        <div class="brand-logo d-flex align-items-center justify-content-between">

          <div class="close-btn d-lg-none d-block sidebartoggler cursor-pointer" id="sidebarCollapse">
            <i class="ti ti-x fs-8 text-muted"></i>
          </div>

<!--begin::User-->
<div class="aside-user d-flex align-items-sm-center justify-content-center py-5">
  <!--begin::Symbol-->
  <div class="symbol symbol-50px">
      <img src="{{ getImage(getFilePath('userProfile') . '/' . auth()->user()->image, getFileSize('userProfile')) }}" alt=""/>
  </div>
  <!--end::Symbol-->

  <!--begin::Wrapper-->
  <div class="aside-user-info flex-row-fluid flex-wrap ms-5">
      <!--begin::Section-->
      <div class="d-flex">
          <!--begin::Info-->
          <div class="flex-grow-1 me-2">
              <!--begin::Username-->

              <a href="#" class="hide-menu text-primary text-hover-primary fs-6 fw-bold">{{Auth::user()->fullname}}</a>
              <!--end::Username-->
              <!--begin::Description-->
              <a href="#" class="hide-menu text-gray-600 text-hover-primary fw-semibold d-block fs-8 mb-1">{{Auth::user()->username}}</a>
              <!--end::Description-->
              <!--begin::Label-->
              <div class="hide-menu d-flex align-items-center text-success fs-9">
                  <span class=" bullet bullet-dot bg-success me-1"></span>@lang('online')
              </div>
              <!--end::Label-->
          </div>
          <!--end::Info-->
          <!--begin::User menu-->
          <div class="me-n2">
              <!--begin::Action-->
              <a href="#" class="btn btn-icon btn-sm btn-active-color-primary mt-n2" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-start" data-kt-menu-overflow="true">
                  <i class="ti ti-setting text-muted fs-1"><span class="path1"></span><span class="path2"></span></i>
              </a>
              <!--end::Action-->
          </div>
          <!--end::User menu-->
      </div>
      <!--end::Section-->
  </div>
  <!--end::Wrapper-->
</div>
<!--end::User-->

        </div>


        <!-- Sidebar navigation-->
        <nav class="sidebar-nav scroll-sidebar" data-simplebar>
          <ul id="sidebarnav">
            <!-- ============================= -->
            <!-- Home -->
            <!-- ============================= -->
            <li class="nav-small-cap">
              <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
              <span class="hide-menu">@lang('Home')</span>
            </li>
            <!-- =================== -->
            <!-- Dashboard -->
            <!-- =================== -->
            <li class="sidebar-item">
              <a class="sidebar-link" href="{{ route('user.home') }}" aria-expanded="false">
                <span>
                  <i class="ti ti-home"></i>
                </span>
                <span class="hide-menu">@lang('Dashboard')</span>
              </a>
            </li>

            <!-- ============================= -->
            <!-- Apps -->
            <!-- ============================= -->
            <li class="nav-small-cap">
              <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
              <span class="hide-menu">@lang('Apps')</span>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="{{ route('user.kyc.index') }}" aria-expanded="false">
                <span>
                  <i class="ti ti-shield"></i>
                </span>
                <span class="hide-menu">@lang('KYC Verification')</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="{{ route('user.deposit.index') }}" aria-expanded="false">
                <span>
                  <i class="ti ti-wallet"></i>
                </span>
                <span class="hide-menu">@lang('Wallet Funding')</span>
              </a>
          </li>
{{--          <li class="sidebar-item">--}}
{{--            <a class="sidebar-link" href="{{ route('user.withdraw') }}" aria-expanded="false">--}}
{{--              <span>--}}
{{--                <i class="ti ti-cash-banknote"></i>--}}
{{--              </span>--}}
{{--              <span class="hide-menu">@lang('Wallet Payouts')</span>--}}
{{--            </a>--}}
{{--        </li>--}}
        <li class="sidebar-item">
          <a class="sidebar-link" href="{{ route('user.bank.transfer') }}" aria-expanded="false">
            <span>
              <i class="ti ti-building-bank"></i>
            </span>
            <span class="hide-menu">@lang('Bank Transfer')</span>
          </a>
        </li>

        @if ($general->p2p > 0)
        <li class="sidebar-item">
            <a class="sidebar-link" href="{{ route('user.p2p.history') }}" aria-expanded="false">
              <span>
                <i class="ti ti-arrows-transfer-down"></i>
              </span>
              <span class="hide-menu">@lang('P2P Transfer')</span>
            </a>
        </li>
        @endif

            <!-- ============================= -->
            <!-- VENDOR -->
            <!-- ============================= -->
            <li class="nav-small-cap">
              <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
              <span class="hide-menu">@lang('Vendor')</span>
            </li>
            @if ($general->escrow > 0)
            <li class="sidebar-item">
              <a class="sidebar-link" href="{{ route('user.escrow.welcome') }}" aria-expanded="false">
                <span class="d-flex">
                  <i class="ti ti-heart-handshake"></i>
                </span>
                <span class="hide-menu">@lang('Escrow Payment')</span>
              </a>
            </li>
            @endif
            @if ($general->event > 0)
            <li class="sidebar-item">
              <a class="sidebar-link" href="{{ route('user.event.index') }}" aria-expanded="false">
                <span class="d-flex">
                  <i class="ti ti-ticket"></i>
                </span>
                <span class="hide-menu">@lang('Event Ticket')</span>
              </a>
            </li>
            @endif
            @if ($general->crypto > 0)
            <li class="sidebar-item">
              <a class="sidebar-link" href="{{ route('user.crypto.index') }}" aria-expanded="false">
                <span>
                  <i class="ti ti-wallet"></i>
                </span>
                <span class="hide-menu">@lang('Crypto Wallet')</span>
              </a>
            </li>
            @endif
          </li>
          @if ($general->buy_giftcard > 0 || $general->sell_giftcard > 0)
          <li class="sidebar-item">
              <a class="sidebar-link" href="{{ route('user.tradegift') }}" aria-expanded="false">
                <span>
                  <i class="ti ti-credit-card"></i>
                </span>
                <span class="hide-menu">@lang('Trade Giftcard')</span>
              </a>
          </li>
          @endif
          @if ($general->giftcard_auto)
          <li class="sidebar-item">
            <a class="sidebar-link" href="{{ route('user.giftcard.digital.index') }}" aria-expanded="false">
              <span>
                <i class="ti ti-credit-card"></i>
              </span>
              <span class="hide-menu">@lang('Digital Giftcard')</span>
            </a>
          </li>
          @endif
          @if ($general->buy_crypto > 0 || $general->sell_crypto > 0)
          <li class="sidebar-item">
              <a class="sidebar-link" href="{{ route('user.crypto.trade.index') }}" aria-expanded="false">
                <span>
                  <i class="ti ti-shopping-cart"></i>
                </span>
                <span class="hide-menu">@lang('Trade Crypto')</span>
              </a>
          </li>
          @endif
            @if($general->invoice > 0 && Auth::user()->vendor == 1)
            <li class="sidebar-item">
                <a class="sidebar-link" href="{{ route('user.invoice.index') }}" aria-expanded="false">
                  <span>
                    <i class="ti ti-file-invoice"></i>
                  </span>
                  <span class="hide-menu">@lang('Payment Link')</span>
                </a>
            </li>
            @endif
            @if($general->voucher)
            <li class="sidebar-item">
                <a class="sidebar-link" href="{{ route('user.voucher.index') }}" aria-expanded="false">
                  <span>
                    <i class="ti ti-receipt"></i>
                  </span>
                  <span class="hide-menu">@lang('Voucher')</span>
                </a>
            </li>
            @endif
            @if($general->savings > 0 && Auth::user()->vendor == 1)
            <li class="sidebar-item">
                <a class="sidebar-link" href="{{ route('user.savings.index') }}" aria-expanded="false">
                  <span>
                    <i class="ti ti-pig"></i>
                  </span>
                  <span class="hide-menu">@lang('Savings')</span>
                </a>
            </li>
            @endif
            @if($general->virtualcard > 0 && Auth::user()->vendor == 1)
            <li class="sidebar-item">
                <a class="sidebar-link" href="{{ route('user.virtualcard.index') }}" aria-expanded="false">
                  <span>
                    <i class="ti ti-credit-card"></i>
                  </span>
                  <span class="hide-menu">@lang('Virtual Card')</span>
                </a>
            </li>
            @endif
            @if($general->qr > 0 && Auth::user()->vendor == 1)
            <li class="sidebar-item">
                <a class="sidebar-link" href="{{ route('user.qr.index') }}" aria-expanded="false">
                  <span>
                    <i class="ti ti-scan"></i>
                  </span>
                  <span class="hide-menu">@lang('QR Code')</span>
                </a>
            </li>
            @endif
            @if($general->store_front > 0 && Auth::user()->vendor == 1)
            <li class="sidebar-item">
                <a class="sidebar-link" href="{{ route('user.storefront.index') }}" aria-expanded="false">
                  <span>
                    <i class="ti ti-building-store"></i>
                  </span>
                  <span class="hide-menu">@lang('Storefront')</span>
                </a>
            </li>
            @endif
            @if($general->store_front > 0)
            <li class="sidebar-item">
              <a class="sidebar-link" href="{{ route('user.storefront.purchase.order') }}" aria-expanded="false">
                <span>
                  <i class="ti ti-shopping-cart"></i>
                </span>
                <span class="hide-menu">@lang('Storefront Order')</span>
              </a>
          </li>
          @endif

            <!-- ============================= -->
            <!-- Bills -->
            <!-- ============================= -->
            <li class="nav-small-cap">
              <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
              <span class="hide-menu">@lang('Bills')</span>
            </li>

            @if ($general->airtime2cash > 0)
            <li class="sidebar-item">
              <a class="sidebar-link" href="{{ route('user.airtime.tocash') }}" aria-expanded="false">
                <span class="d-flex">
                  <i class="ti ti-reload"></i>
                </span>
                <span class="hide-menu">@lang('Airtime 2 Cash')</span>
              </a>
            </li>
            @endif
            @if ($general->airtime > 0)
            <li class="sidebar-item">
              <a class="sidebar-link" href="{{ route('user.airtime.index') }}" aria-expanded="false">
                <span class="d-flex">
                  <i class="ti ti-device-mobile"></i>
                </span>
                <span class="hide-menu">@lang('Airtime Topup')</span>
              </a>
            </li>
            @endif
{{--            @if ($general->airtimelocal > 0)--}}
{{--            <li class="sidebar-item">--}}
{{--              <a class="sidebar-link" href="{{ route('user.airtime.indexlocal') }}" aria-expanded="false">--}}
{{--                <span class="d-flex">--}}
{{--                  <i class="ti ti-device-mobile"></i>--}}
{{--                </span>--}}
{{--                <span class="hide-menu">@lang('Airtime ')<small>(@lang('Non Global'))</small></span>--}}
{{--              </a>--}}
{{--            </li>--}}
{{--            @endif--}}
{{--            @if ($general->internet > 0)--}}
{{--            <li class="sidebar-item">--}}
{{--              <a class="sidebar-link" href="{{ route('user.internet.index') }}" aria-expanded="false">--}}
{{--                <span class="d-flex">--}}
{{--                  <i class="ti ti-building-broadcast-tower"></i>--}}
{{--                </span>--}}
{{--                <span class="hide-menu">@lang('Internet') <small>(@lang('Global'))</small></span>--}}

{{--              </a>--}}
{{--            </li>--}}
{{--            @endif--}}
            @if ($general->internetsme > 0)
            <li class="sidebar-item">
              <a class="sidebar-link" href="{{ route('user.internet_sme.index') }}" aria-expanded="false">
                <span class="d-flex">
                  <i class="ti ti-wifi"></i>
                </span>
                <span class="hide-menu">@lang('Internet') <small>(@lang('SME & Gifting'))</small> </span>
              </a>
            </li>
            @endif
            @if ($general->utilityglobal > 0)
            <li class="sidebar-item">
              <a class="sidebar-link" href="{{ route('user.utility.index') }}" aria-expanded="false">
                <span class="d-flex">
                  <i class="ti ti-bolt"></i>
                </span>
                <span class="hide-menu">@lang('Utility Bills') <small>(@lang('Global'))</small></span>
              </a>
            </li>
            @endif
{{--            @if ($general->utilitylocal > 0)--}}
{{--            <li class="sidebar-item">--}}
{{--              <a class="sidebar-link" href="{{ route('user.utility.local.index') }}" aria-expanded="false">--}}
{{--                <span class="d-flex">--}}
{{--                  <i class="ti ti-bulb"></i>--}}
{{--                </span>--}}
{{--                <span class="hide-menu">@lang('Utility Bills') <small>(@lang('Non Global'))</small></span>--}}
{{--              </a>--}}
{{--            </li>--}}
{{--            @endif--}}
            @if ($general->cabletv > 0)
            <li class="sidebar-item">
              <a class="sidebar-link" href="{{ route('user.cabletv.index') }}" aria-expanded="false">
                <span class="d-flex">
                  <i class="ti ti-video"></i>
                </span>
                <span class="hide-menu">@lang('Cable TV')</span>
              </a>
            </li>
            @endif
            @if ($general->insurance > 0)
            <li class="sidebar-item">
              <a class="sidebar-link" href="{{ route('user.insurance.index') }}" aria-expanded="false">
                <span class="d-flex">
                  <i class="ti ti-umbrella"></i>
                </span>
                <span class="hide-menu">@lang('Insurance')</span>
              </a>
            </li>
            @endif
            @if ($general->betting > 0)
            <li class="sidebar-item">
              <a class="sidebar-link" href="{{ route('user.betting.index') }}" aria-expanded="false">
                <span class="d-flex">
                  <i class="ti ti-run"></i>
                </span>
                <span class="hide-menu">@lang('Sport Betting ')<small>(@lang('Wallet Funding'))</small></span>
              </a>
            </li>
            @endif


            <!-- ============================= -->
            <!-- Apps -->
            <!-- ============================= -->
            <li class="nav-small-cap">
              <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
              <span class="hide-menu">@lang('Misc')</span>
            </li>
            <li class="sidebar-item">
                <a class="sidebar-link" href="{{ route('user.transactions') }}" aria-expanded="false">
                  <span>
                    <i class="ti ti-printer"></i>
                  </span>
                  <span class="hide-menu">@lang('Transactions')</span>
                </a>
            </li>
            <li class="sidebar-item">
                <a class="sidebar-link" href="{{ route('ticket.index') }}" aria-expanded="false">
                  <span>
                    <i class="ti ti-message"></i>
                  </span>
                  <span class="hide-menu">@lang('Support Ticket')</span>
                </a>
            </li>

            <li class="sidebar-item">
                <a class="sidebar-link" href="{{ route('user.profile.setting') }}" aria-expanded="false">
                  <span class="d-flex">
                    <i class="ti ti-settings"></i>
                  </span>
                  <span class="hide-menu">@lang('Account Settings')</span>
                </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="{{route('user.downlines')}}" aria-expanded="false">
                <span>
                  <i class="ti ti-users"></i>
                </span>
                <span class="hide-menu">@lang('Downlines')</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="{{route('user.logout')}}" aria-expanded="false">
                <span>
                  <i class="ti ti-power"></i>
                </span>
                <span class="hide-menu">@lang('Logout')</span>
              </a>
            </li>


          </ul>
{{--          <div class="unlimited-access hide-menu bg-light-primary position-relative my-7 rounded">--}}
{{--            <div class="d-flex">--}}
{{--              <div class="unlimited-access-img">--}}
{{--                <img src="{{ asset('assets/assets/dist/images/backgrounds/lock.png')}}" alt="" class="img-fluid">--}}
{{--                <center>--}}
{{--                <h6 class="fw-semibold fs-4 mb-6 text-dark w-85">{{ __(systemDetails()['name']) }}</h6>--}}
{{--                <button class="btn btn-primary fs-2 fw-semibold lh-sm">@lang('V'){{ systemDetails()['version'] }}</button>--}}
{{--              </center>--}}
{{--              </div>--}}
{{--            </div>--}}
{{--          </div>--}}
        </nav>
        <div class="fixed-profile p-3 bg-light-secondary rounded sidebar-ad mt-3">
          <div class="hstack gap-3">
            <div class="john-img">
              <img src="{{ getImage(getFilePath('logoIcon') . '/logo.png') }}" class="rounded-circle" width="40" height="40" alt="">
            </div>
            <div class="john-title">
              <h6 class="mb-0 fs-4 fw-semibold">{{ auth()->user()->username }}</h6>
              <span class="fs-2 text-dark">@lang('User')</span>
            </div>
            <a href="{{ route('user.logout') }}" class="border-0 bg-transparent text-primary ms-auto" tabindex="0" type="button" aria-label="logout" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="logout">
              <i class="ti ti-power fs-6"></i>
            </a>
          </div>
        </div>
        <!-- End Sidebar navigation -->
      </div>
      <!-- End Sidebar scroll-->
    </aside>
    <!--  Sidebar End -->
    <!--  Main wrapper -->



@push('script')

@endpush
