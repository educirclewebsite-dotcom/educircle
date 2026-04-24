@extends('new_layout.app')
@section('title', 'Explore Universities - Educircle.io')

@section('content')
    <div class="scholarship-bg-wrapper bg-alice-blue-custom" style="padding-top: 190px; padding-bottom: 80px;">
        <!-- Most Popular Universities -->
        @if (isset($popularUniversities) && $popularUniversities->count() > 0)
            <section class="popular-universities-section mb-5">
                <div class="container">
                    <div class="popular-section-header mb-4">
                        <h1 class="hero-title mb-2"><span class="text-dark-blue">Popular</span> <span
                                class="text-accent-green">Universities</span></h1>
                        <p class="hero-subtitle">Highly top-rated institutions by students</p>
                    </div>
                    <div class="row">
                        @foreach ($popularUniversities as $item)
                            <div class="col-lg-4 mb-4">
                                <div class="uni-card-v2 h-100 popular-featured-card position-relative">
                                    <div class="popular-tag-v2"><i class="fas fa-fire mr-1"></i> Popular</div>
                                    <div class="uni-logo-box-v2">
                                        <a href="{{ route('university.show', $item->slug) }}">
                                            @php
                                                $logo = !empty($item->logo_img) ? ltrim(str_replace('public/', '', $item->logo_img), '/') : '';
                                                $banner = !empty($item->banner_img) ? ltrim(str_replace('public/', '', $item->banner_img), '/') : '';

                                                $finalImg = 'theme/images/banner/banner.png';
                                                if (!empty($banner) && file_exists(public_path($banner))) {
                                                    $finalImg = $banner;
                                                } elseif (!empty($logo) && file_exists(public_path($logo))) {
                                                    $finalImg = $logo;
                                                }

                                                $defaultBanner = 'theme/images/banner/banner.png';
                                            @endphp
                                            <img src="{{ asset($finalImg) }}" alt="{{ $item->university_name }}"
                                                onerror="this.onerror=null; this.src='{{ asset($defaultBanner) }}';">
                                        </a>
                                    </div>
                                    <div class="uni-details-v2">
                                        <div class="d-flex justify-content-between align-items-start">
                                            <div class="uni-name-box">
                                                <h5 class="mb-1">
                                                    <a href="{{ route('university.show', $item->slug) }}"
                                                        class="text-dark uni-name-nowrap">{{ $item->university_name }}</a>
                                                </h5>
                                                @if($item->rank)
                                                    <span class="uni-rank-v2">#{{ $item->rank }} Rank</span>
                                                @endif
                                                @if($item->region_type)
                                                    <div class="mt-2">
                                                        <span class="badge-region">{{ $item->region_type }}</span>
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                        <a href="{{ route('university.show', $item->slug) }}" class="btn-know-more-capsule mt-3">
                                            Know More <i class="fas fa-arrow-right ml-1"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </section>
            <div class="container">
                <hr class="mb-5" style="border-top: 2px solid #e2e8f0; opacity: 0.5;">
            </div>
        @endif

        <!-- Off-canvas Filter Drawer -->
        <div class="filter-backdrop" id="filterBackdrop"></div>
        <div class="filter-offcanvas" id="filterOffcanvas">
            <div class="offcanvas-header d-flex justify-content-between align-items-center p-3">
                <h5 class="mb-0 px-2"><i class="fas fa-sliders-h mr-2"></i>Filters</h5>
                <button type="button" class="btn border-0 bg-transparent" id="closeFilter">
                    <i class="fas fa-times fs-4"></i>
                </button>
            </div>

            <div class="offcanvas-body p-4 d-flex flex-column h-100">
                <form id="filterForm" method="GET" action="{{ route('universities') }}" class="d-flex flex-column h-100">
                    <!-- Keep existing search if present -->
                    <input type="hidden" name="search" value="{{ request('search') }}">

                    <div class="flex-grow-1 uni-filter-group" style="overflow-y: auto; padding-right: 10px; margin-right: -10px;">
                        <!-- State (Multi-select) -->
                        <div class="mb-4">
                            <label class="small text-uppercase font-weight-bold text-muted mb-2 d-block">States</label>
                            <div class="form-control custom-select-v2" style="height: 180px; overflow-y: auto; padding: 10px;">
                                @foreach ($states as $id => $name)
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="states[]" 
                                            value="{{ $id }}" id="state_{{ $id }}"
                                            {{ in_array($id, (array) request('states', [])) ? 'checked' : '' }}>
                                        <label class="form-check-label" for="state_{{ $id }}">
                                            {{ $name }}
                                        </label>
                                    </div>
                                @endforeach
                            </div>
                        </div>

                        <!-- Region Type -->
                        <div class="mb-4">
                            <label class="small text-uppercase font-weight-bold text-muted mb-2 d-block">Region Type</label>
                            <div class="d-flex flex-wrap" style="gap: 15px 25px;">
                                @foreach($regionTypes as $type)
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="region_types[]" value="{{ $type }}" id="reg_{{ $type }}" {{ in_array($type, (array) request('region_types', [])) ? 'checked' : '' }}>
                                        <label class="form-check-label" for="reg_{{ $type }}">{{ $type }}</label>
                                    </div>
                                @endforeach
                            </div>
                        </div>

                        <!-- Rankings (Selectable Buttons) -->
                        <div class="mb-4">
                            <label class="small text-uppercase font-weight-bold text-muted mb-2 d-block">Rankings</label>
                            <div class="d-flex gap-3 flex-wrap">
                                <input type="hidden" name="ranking" id="rankingInput" value="{{ request('ranking') }}">
                                <button type="button" class="btn btn-outline-primary btn-sm rounded-pill px-3 ranking-btn {{ request('ranking') == 'Top 10' ? 'active' : '' }}" data-value="Top 10">Top 10</button>
                                <button type="button" class="btn btn-outline-primary btn-sm rounded-pill px-3 ranking-btn {{ request('ranking') == 'Top 15' ? 'active' : '' }}" data-value="Top 15">Top 15</button>
                                <button type="button" class="btn btn-outline-primary btn-sm rounded-pill px-3 ranking-btn {{ request('ranking') == 'Top 20' ? 'active' : '' }}" data-value="Top 20">Top 20</button>
                            </div>
                        </div>

                        <!-- Intakes -->
                        <div class="mb-4">
                            <label class="small text-uppercase font-weight-bold text-muted mb-2 d-block">Intakes</label>
                            <div class="d-flex flex-wrap" style="gap: 15px 25px;">
                                @foreach($intakeOptions as $intake)
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="intakes[]" value="{{ $intake }}" id="intake_{{ $intake }}" {{ in_array($intake, (array) request('intakes', [])) ? 'checked' : '' }}>
                                        <label class="form-check-label" for="intake_{{ $intake }}">{{ $intake }}</label>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>

                    <div class="offcanvas-footer d-flex mt-auto pt-4 pb-5 bg-white border-top border-light" style="gap: 15px;">
                        <button type="button" class="btn btn-clear-v2" onclick="resetFilters()">Clear</button>
                        <button type="submit" class="btn btn-apply-v2">Apply Filters</button>
                    </div>
                </form>
            </div>
        </div>

        <div class="container mt-5">
            <h1 class="hero-title mb-2"><span class="text-dark-blue">Explore</span> <span
                    class="text-accent-green">Universities</span></h1>
            <p class="hero-subtitle mb-4">Discover world-class institutions and courses</p>

            <!-- Search, Filter & Sort Row -->
            <div class="search-row-uni">
                <div class="search-card-wrapper mobile-stack-fix">
                    <form action="{{ route('universities') }}" method="GET"
                        class="d-flex w-100 align-items-center mobile-form-stack">
                        <div class="search-input-with-icon">
                            <i class="fas fa-search search-icon-mobile"></i>
                            <input type="text" name="search" class="search-input"
                                placeholder="Search by course, university or keywords" value="{{ request('search') }}">
                        </div>
                        <button type="submit" class="btn-search-pill-v2">Search</button>
                    </form>
                </div>

                <div class="filter-sort-group-v2">
                    <button class="btn-filter-pill-v2" id="filterToggleButton">Filter University <i class="fas fa-sliders-h ml-2"></i></button>

                    <div class="sort-by-capsule-v2">
                        <span>Sort By : Popularity</span>
                        <i class="fas fa-chevron-down small"></i>
                    </div>
                </div>
            </div>

            <!-- University Grid -->
            <div class="row mt-5">
                @forelse ($universities as $item)
                    <div class="col-lg-4 mb-4">
                        <div class="uni-card-v2 h-100">
                            <div class="uni-logo-box-v2">
                                <a href="{{ route('university.show', $item->slug) }}">
                                    @php
                                        $logo = !empty($item->logo_img) ? ltrim(str_replace('public/', '', $item->logo_img), '/') : '';
                                        $banner = !empty($item->banner_img) ? ltrim(str_replace('public/', '', $item->banner_img), '/') : '';

                                        $finalImg = 'theme/images/banner/banner.png';
                                        if (!empty($banner) && file_exists(public_path($banner))) {
                                            $finalImg = $banner;
                                        } elseif (!empty($logo) && file_exists(public_path($logo))) {
                                            $finalImg = $logo;
                                        }

                                        $defaultBanner = 'theme/images/banner/banner.png';
                                    @endphp
                                    <img src="{{ asset($finalImg) }}" alt="{{ $item->university_name }}"
                                        onerror="this.onerror=null; this.src='{{ asset($defaultBanner) }}';">
                                </a>
                            </div>
                            <div class="uni-details-v2">
                                <div class="d-flex justify-content-between align-items-start">
                                    <div class="uni-name-box">
                                        <h5 class="mb-1">
                                            <a href="{{ route('university.show', $item->slug) }}"
                                                class="text-dark uni-name-nowrap">{{ $item->university_name }}</a>
                                        </h5>
                                        @if($item->rank)
                                            <span class="uni-rank-v2">#{{ $item->rank }} Rank</span>
                                        @endif
                                        @if($item->region_type)
                                            <div class="mt-2">                                              
                                                <span class="badge-region">{{ $item->region_type }}</span>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                                <a href="{{ route('university.show', $item->slug) }}" class="btn-know-more-capsule mt-3">
                                    Know More <i class="fas fa-arrow-right ml-1"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-12 text-center">
                        <p class="text-muted">No universities found.</p>
                    </div>
                @endforelse
            </div>
        </div>
    </div>

@push('header_script')
    <style>
        .ranking-btn {
            margin-right: 8px;
            margin-bottom: 8px;
            border: 1.5px solid #007bff !important;
            color: #007bff !important;
            background: transparent;
            transition: all 0.3s;
        }

        .ranking-btn:hover {
            background-color: #007bff !important;
            color: white !important;
        }

        .ranking-btn.active {
            background-color: #007bff !important;
            color: white !important;
            box-shadow: 0 4px 8px rgba(0, 123, 255, 0.3);
        }

        /* Namespaced Filter Styles to avoid global conflicts */
        .uni-filter-group .form-check {
            margin-bottom: 12px;
            display: flex !important;
            align-items: center !important;
            padding-left: 0 !important;
            gap: 10px;
        }

        .uni-filter-group .form-check-input {
            margin: 0 !important;
            position: static !important;
            width: 1.25rem;
            height: 1.25rem;
            cursor: pointer;
        }

        .uni-filter-group .form-check-label {
            margin: 0 !important;
            cursor: pointer;
            font-size: 0.95rem;
            color: #495057;
            padding-left: 0 !important;
        }

        /* Off-canvas Filter Styles - Left Side */
        .filter-offcanvas {
            position: fixed;
            top: 0;
            left: -400px;
            width: 400px;
            height: 100vh;
            background: #fff;
            z-index: 10050;
            transition: left 0.3s ease-in-out;
            box-shadow: 5px 0 15px rgba(0, 0, 0, 0.1);
        }

        .filter-offcanvas.show {
            left: 0;
        }

        .filter-backdrop {
            position: fixed;
            top: 0;
            left: 0;
            width: 100vw;
            height: 100vh;
            background: rgba(0, 0, 0, 0.5);
            z-index: 10040;
            display: none;
            backdrop-filter: blur(2px);
        }

        .filter-backdrop.show {
            display: block;
        }

        .custom-select-v2 {
            border-radius: 12px !important;
            border: 1.5px solid #eee !important;
            padding: 10px 15px !important;
            font-size: 0.95rem !important;
            transition: all 0.2s;
            background-color: #fff;
        }

        .btn-clear-v2 {
            background-color: #717b85 !important;
            color: white !important;
            border-radius: 50px !important;
            padding: 12px 25px !important;
            font-weight: 700 !important;
            flex-grow: 1;
            border: none !important;
            transition: all 0.2s;
            font-size: 1rem !important;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .btn-apply-v2 {
            background-color: #007bff !important;
            color: white !important;
            border-radius: 50px !important;
            padding: 12px 25px !important;
            font-weight: 700 !important;
            flex-grow: 1.5;
            border: none !important;
            box-shadow: 0 4px 12px rgba(0, 123, 255, 0.3);
            transition: all 0.2s;
            font-size: 1rem !important;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        @media (max-width: 576px) {
            .filter-offcanvas {
                width: 100%;
                left: -100%;
            }
        }

        .badge-region {
            background-color: #ffb700 !important;
            color: #000 !important;
            font-weight: 700 !important;
            border-radius: 50px !important;
            padding: 5px 15px !important;
            display: inline-block;
            font-size: 0.8rem;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }

        .region-label {
            font-size: 0.7rem;
            font-weight: 700;
            color: #94a3b8;
            text-transform: uppercase;
            letter-spacing: 0.05em;
            margin-bottom: 4px;
            display: block;
        }
    </style>
@endpush

@push('footer_script')
    <script>
        $(document).ready(function() {
            function showFilters() {
                $('#filterOffcanvas').addClass('show');
                $('#filterBackdrop').addClass('show');
                $('body').css('overflow', 'hidden');
            }

            function hideFilters() {
                $('#filterOffcanvas').removeClass('show');
                $('#filterBackdrop').removeClass('show');
                $('body').css('overflow', '');
            }

            $('#filterToggleButton').on('click', function(e) {
                e.preventDefault();
                showFilters();
            });

            $('#closeFilter, #filterBackdrop').on('click', function() {
                hideFilters();
            });

            $('.ranking-btn').on('click', function() {
                const val = $(this).data('value');
                if ($(this).hasClass('active')) {
                    $(this).removeClass('active');
                    $('#rankingInput').val('');
                } else {
                    $('.ranking-btn').removeClass('active');
                    $(this).addClass('active');
                    $('#rankingInput').val(val);
                }
            });
        });

        function resetFilters() {
            const form = document.getElementById('filterForm');
            if (form) {
                form.querySelectorAll('select, input').forEach(el => {
                    if (el.tagName === 'SELECT') {
                        el.selectedIndex = 0;
                    } else if (el.type === 'checkbox' || el.type === 'radio') {
                        el.checked = false;
                    } else if (el.type !== 'hidden') {
                        el.value = '';
                    }
                });
                $('#rankingInput').val('');
                $('.ranking-btn').removeClass('active');
                form.submit();
            }
        }
    </script>
@endpush
@endsection