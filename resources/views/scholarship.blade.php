@extends('new_layout.app')

@section('content')
    <div class="scholarship-bg-wrapper bg-alice-blue-custom">
        <!-- Most Popular Scholarships -->
        @if (isset($popularScholarships) && $popularScholarships->count() > 0)
            <section class="popular-scholarships-section">
                <div class="container">
                    <div class="popular-section-header">
                        <h1 class="hero-title mb-3"><span class="text-dark-blue">Popular</span> <span
                                class="text-accent-green">Scholarships</span></h1>
                        <p class="hero-subtitle">Highly sought scholarships by students like you</p>
                    </div>
                    <div class="row">
                        @foreach ($popularScholarships as $item)
                            <div class="col-lg-4 mb-4">
                                <div class="course-card popular-card bg-white p-3 h-100 position-relative">
                                    <span class="popular-badge-card"><i class="fas fa-fire mr-1"></i>Most Popular</span>
                                    <div class="card-header-new">
                                        <div class="uni-info-new">
                                            <h5><a href="{{ route('university.show', $item->university->slug ?? '-') }}"
                                                    class="text-decoration-none text-dark">{{ $item->university->university_name ?? '-' }}</a>
                                            </h5>
                                            @if ($item->university->rank)
                                                <span class="uni-rank-new">#{{ $item->university->rank }} Rank</span>
                                            @endif
                                        </div>
                                        <div class="logo-placeholder-box">
                                            @php
                                                $logo = !empty($item->university?->logo_img) ? ltrim(str_replace('public/', '', $item->university->logo_img), '/') : '';
                                                $banner = !empty($item->university?->banner_img) ? ltrim(str_replace('public/', '', $item->university->banner_img), '/') : '';

                                                $finalImg = 'theme/images/banner/banner.png';
                                                if (!empty($banner) && file_exists(public_path($banner))) {
                                                    $finalImg = $banner;
                                                } elseif (!empty($logo) && file_exists(public_path($logo))) {
                                                    $finalImg = $logo;
                                                }

                                                $defaultBanner = 'theme/images/banner/banner.png';
                                            @endphp
                                            <img src="{{ asset($finalImg) }}" alt="{{ $item->university->university_name }}"
                                                onerror="this.onerror=null; this.src='{{ asset($defaultBanner) }}';">
                                        </div>
                                    </div>
                                    <div class="metadata-section-new">
                                        <div class="metadata-col">
                                            <p class="metadata-label">Scholarship</p>
                                            <p class="scholarship-value">{{ $item->scholarship ?? '-' }}</p>
                                        </div>
                                        <div class="metadata-col">
                                            <p class="metadata-label">Intake</p>
                                            <div class="intake-badges">
                                                @php
                                                    $semesterMap = [
                                                        1 => 'Sem 1 (Feb)',
                                                        2 => 'Sem 2 (July)',
                                                        3 => 'Sem 3 (Nov)',
                                                    ];
                                                    $semesters = is_array(json_decode($item->semester, true))
                                                        ? json_decode($item->semester, true)
                                                        : [];
                                                @endphp
                                                @forelse ($semesters as $s)
                                                    <span class="intake-badge-new">{{ $semesterMap[$s] ?? $s }}</span>
                                                @empty
                                                    <span class="text-muted">-</span>
                                                @endforelse
                                            </div>
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-between align-items-center mt-auto">
                                        <a href="{{ route('contact') }}"
                                            class="btn btn-connect-expert btn-sm rounded-pill px-3 font-weight-bold">Connect
                                            with Expert</a>
                                        <a href="https://wa.me/918130820084" target="_blank"
                                            class="btn btn-chat-gradient btn-sm rounded-pill px-3 font-weight-bold"><i
                                                class="fab fa-whatsapp mr-1"></i>Chat with us</a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </section>
        @endif

        <!-- Page Header / Explore Scholarships -->

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
                <form id="filterForm" method="GET" action="{{ route('scholarship') }}" class="d-flex flex-column h-100">
                    <!-- Keep existing search if present -->
                    <input type="hidden" name="search" value="{{ request('search') }}">

                    <div class="flex-grow-1" style="overflow-y: auto; padding-right: 10px; margin-right: -10px;">
                        <div class="mb-4">
                            <label class="small text-uppercase font-weight-bold text-muted mb-2 d-block">Study Level</label>
                            <select name="programLevelType" class="form-control custom-select-v2">
                                <option value="" disabled {{ !request('programLevelType') ? 'selected' : '' }}>Select Study Level</option>
                                <option value="UG" {{ request('programLevelType') == 'UG' ? 'selected' : '' }}>Undergraduate</option>
                                <option value="PG" {{ request('programLevelType') == 'PG' ? 'selected' : '' }}>Postgraduate</option>
                            </select>
                        </div>

                        <div class="mb-4">
                            <label class="small text-uppercase font-weight-bold text-muted mb-2 d-block">Study Areas</label>
                            <div class="form-control custom-select-v2" style="height: 180px; overflow-y: auto; padding: 10px;">
                                @php
                                    $studyAreas = [
                                        'Business/Commerce/Management',
                                        'Law/Humanities',
                                        'Engineering/IT/Computing',
                                        'Science/Medicine/Health',
                                        'Arts/Social Sciences',
                                        'Education',
                                        'Sports',
                                        'Environment',
                                        'Food',
                                        'Nutrition and Dietetics',
                                    ];
                                @endphp
                                @foreach ($studyAreas as $area)
                                    <div class="form-check mb-2">
                                        <input class="form-check-input" type="checkbox" name="study_area[]" value="{{ $area }}" id="area_{{ $loop->index }}" {{ in_array($area, (array)request('study_area', [])) ? 'checked' : '' }}>
                                        <label class="form-check-label text-dark" for="area_{{ $loop->index }}" style="cursor: pointer; font-size: 0.9rem;">
                                            {{ $area }}
                                        </label>
                                    </div>
                                @endforeach
                            </div>
                        </div>

                        <div class="mb-4">
                            <label class="small text-uppercase font-weight-bold text-muted mb-2 d-block">Universities</label>
                            <div class="form-control custom-select-v2" style="height: 180px; overflow-y: auto; padding: 10px;">
                                @foreach ($universities as $university)
                                    <div class="form-check mb-2">
                                        <input class="form-check-input" type="checkbox" name="universities[]" 
                                            value="{{ $university->id }}" id="uni_{{ $university->id }}"
                                            {{ in_array($university->id, (array) request('universities', [])) ? 'checked' : '' }}>
                                        <label class="form-check-label text-dark" for="uni_{{ $university->id }}" style="cursor: pointer; font-size: 0.9rem;">
                                            {{ $university->university_name }}
                                        </label>
                                    </div>
                                @endforeach
                            </div>
                        </div>

                        <div class="mb-4">
                            <label class="small text-uppercase font-weight-bold text-muted mb-2 d-block">States</label>
                            <div class="form-control custom-select-v2" style="height: 180px; overflow-y: auto; padding: 10px;">
                                @foreach ($states as $id => $name)
                                    <div class="form-check mb-2">
                                        <input class="form-check-input" type="checkbox" name="state[]" 
                                            value="{{ $id }}" id="state_{{ $id }}"
                                            {{ in_array($id, (array) request('state', [])) ? 'checked' : '' }}>
                                        <label class="form-check-label text-dark" for="state_{{ $id }}" style="cursor: pointer; font-size: 0.9rem;">
                                            {{ $name }}
                                        </label>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>

                    <div class="offcanvas-footer d-flex mt-auto pt-4 pb-5 bg-white border-top border-light" style="gap: 15px;">
                        <button type="button"
                            class="btn btn-clear-v2"
                            onclick="resetFilters()">Clear</button>
                        <button type="submit"
                            class="btn btn-apply-v2">Apply Filters</button>
                    </div>
                </form>
            </div>
        </div>

        <header class="scholarship-hero">
            <div class="container">
                <h1 class="hero-title mb-3"><span class="text-dark-blue">Explore</span> <span
                        class="text-accent-green">Scholarships</span></h1>
                    <p class="text-muted">Find scholarships across countries, universities, and education levels.</p>

                <!-- Standardized Search Row -->
                <form action="{{ route('scholarship') }}" method="GET">
                    <div class="search-row-uni">
                        <div class="search-card-wrapper">
                            <div class="search-input-with-icon">
                                <i class="fas fa-search search-icon-mobile"></i>
                                <input type="text" name="search" class="search-input" value="{{ request('search') }}"
                                    placeholder="Search by course, university or keywords...">
                            </div>
                            <button type="submit" class="btn-search-pill-v2">Search</button>
                        </div>
                        <div class="filter-sort-group-v2">
                            <button type="button" class="btn-filter-pill-v2" id="filterToggleButton">Filter Scholarship <i
                                    class="fas fa-sliders-h ml-2"></i></button>

                            <div class="sort-by-capsule-v2">
                                <span>Sort By : Popularity</span>
                                <i class="fas fa-chevron-down small"></i>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </header>

        @push('header_script')
            <style>
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

                .custom-select-v2:focus {
                    border-color: #8CCB26 !important;
                    box-shadow: 0 0 0 0.2rem rgba(140, 203, 38, 0.1) !important;
                    outline: 0;
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

                .btn-clear-v2:hover, .btn-apply-v2:hover {
                    opacity: 0.9;
                    transform: translateY(-1px);
                    color: white !important;
                }

                @media (max-width: 576px) {
                    .filter-offcanvas {
                        width: 100%;
                        left: -100%;
                    }
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
                        form.submit();
                    }
                }
            </script>
        @endpush

        <!-- Scholarships Grid -->
        <section class="scholarship-grid-section">
            <div class="container">
                <div class="row">
                    @forelse ($scholarships as $item)
                        <div class="col-lg-4 mb-4">
                            <div class="course-card bg-white p-3 rounded-xl shadow-sm h-100 position-relative">
                                <div class="card-header-new">
                                    <div class="uni-info-new">
                                        <h5><a href="{{ route('university.show', $item->university->slug ?? '-') }}"
                                                class="text-decoration-none text-dark">{{ $item->university->university_name ?? '-' }}</a>
                                        </h5>
                                        @if ($item->university->rank)
                                            <span class="uni-rank-new">#{{ $item->university->rank }} Rank</span>
                                        @endif
                                    </div>
                                    <div class="logo-placeholder-box">
                                        @php
                                            $logo = !empty($item->university?->logo_img) ? ltrim(str_replace('public/', '', $item->university->logo_img), '/') : '';
                                            $banner = !empty($item->university?->banner_img) ? ltrim(str_replace('public/', '', $item->university->banner_img), '/') : '';

                                            $finalImg = 'theme/images/banner/banner.png';
                                            if (!empty($banner) && file_exists(public_path($banner))) {
                                                $finalImg = $banner;
                                            } elseif (!empty($logo) && file_exists(public_path($logo))) {
                                                $finalImg = $logo;
                                            }

                                            $defaultBanner = 'theme/images/banner/banner.png';
                                        @endphp
                                        <img src="{{ asset($finalImg) }}" alt="{{ $item->university->university_name }}"
                                            onerror="this.onerror=null; this.src='{{ asset($defaultBanner) }}';">
                                    </div>
                                </div>
                                <div class="metadata-section-new">
                                    <div class="metadata-col">
                                        <p class="metadata-label">Scholarship</p>
                                        <p class="scholarship-value">{{ $item->scholarship ?? '-' }}</p>
                                    </div>
                                    <div class="metadata-col">
                                        <p class="metadata-label">Intake</p>
                                        <div class="intake-badges">
                                            @php
                                                $semesterMap = [
                                                    1 => 'Sem 1 (Feb)',
                                                    2 => 'Sem 2 (July)',
                                                    3 => 'Sem 3 (Nov)',
                                                ];
                                                $semesters = is_array(json_decode($item->semester, true))
                                                    ? json_decode($item->semester, true)
                                                    : [];
                                            @endphp
                                            @forelse ($semesters as $s)
                                                <span class="intake-badge-new">{{ $semesterMap[$s] ?? $s }}</span>
                                            @empty
                                                <span class="text-muted">-</span>
                                            @endforelse
                                        </div>
                                    </div>
                                </div>
                                <div class="d-flex justify-content-between align-items-center mt-auto">
                                    <a href="{{ route('contact') }}"
                                        class="btn btn-connect-expert btn-sm rounded-pill px-3 font-weight-bold">Connect
                                        with Expert</a>
                                    <a href="https://wa.me/918130820084" target="_blank"
                                        class="btn btn-chat-gradient btn-sm rounded-pill px-3 font-weight-bold"><i
                                            class="fab fa-whatsapp mr-1"></i> Chat with us</a>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="col-12 text-center py-5">
                            <p class="text-muted">No scholarships found matching your criteria.</p>
                        </div>
                    @endforelse
                </div>
            </div>
        </section>
    </div>
@endsection