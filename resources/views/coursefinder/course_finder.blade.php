@extends('new_layout.app')
@section('title', 'Course Finder')

@push('header_script')
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link href="{{ asset('theme/css/custom.css?v=1.2') }}" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.2.0/fonts/remixicon.css" rel="stylesheet">

    <style>
        .courses-subtitle {
            font-size: 1rem !important;
            color: #444 !important;
            margin-bottom: 15px !important;
            font-weight: 500 !important;
            line-height: 1.5 !important;
        }

        .text-dark-blue {
            color: #022c54 !important;
        }

        .text-accent {
            color: #70A344 !important;
        }

        .rounded-20 {
            border-radius: 20px !important;
        }

        /* Adjust for home page fixed header */
        .course-finder-container {
            margin-top: 100px;
        }

        /* Suggestions Dropdown Styling */
        .search-card-wrapper {
            position: relative;
        }

        #searchSuggestions {
            position: absolute;
            top: 100%;
            left: 0;
            right: 0;
            background: #fff;
            border-radius: 15px;
            box-shadow: 0 15px 35px rgba(0,0,0,0.15);
            margin-top: 10px;
            z-index: 10001; /* Higher z-index to stay above mobile elements */
            display: none;
            overflow: hidden;
            border: 1px solid #eee;
            animation: slideDownFade 0.3s ease-out;
        }

        @keyframes slideDownFade {
            from {
                opacity: 0;
                transform: translateY(-10px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .suggestion-item {
            padding: 12px 20px;
            cursor: pointer;
            transition: all 0.2s;
            display: flex;
            align-items: center;
            gap: 12px;
            border-bottom: 1px solid #f8f9fa;
        }

        .suggestion-item:last-child {
            border-bottom: none;
        }

        .suggestion-item:hover {
            background: #f0f7ff;
        }

        .suggestion-item i {
            color: #8CCB26;
            font-size: 1.1rem;
        }

        .suggestion-label {
            font-size: 0.95rem;
            color: #333;
            font-weight: 500;
        }

        .suggestion-type {
            font-size: 0.75rem;
            color: #999;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            margin-left: auto;
        }
    </style>
@endpush

@section('content')
    <!-- Off-canvas Filter Drawer -->
    <div class="filter-backdrop" id="filterBackdrop"></div>
    <div class="filter-offcanvas" id="filterOffcanvas">
        <div class="offcanvas-header d-flex justify-content-between align-items-center p-3">
            <h5 class="mb-0 px-2"><i class="ri-equalizer-line me-2"></i>Filters</h5>
            <button type="button" class="btn border-0 bg-transparent" id="closeFilter">
                <i class="ri-close-line fs-4"></i>
            </button>
        </div>
        
        <div class="offcanvas-body p-4 d-flex flex-column h-100">
            <form id="filterForm" method="GET" action="{{ route('courseFinder.filter') }}" class="d-flex flex-column h-100">
                <div class="flex-grow-1">
                    <div class="mb-4">
                        <label class="small text-uppercase font-weight-bold text-muted mb-2 d-block">Country</label>
                        <select class="form-control custom-select-v2" disabled style="background-color: #e9ecef; cursor: not-allowed;">
                            <option value="2" selected>Australia</option>
                        </select>
                        <input type="hidden" name="country" value="2">
                    </div>

                    <div class="mb-4">
                        <label class="small text-uppercase font-weight-bold text-muted mb-2 d-block">Study Level</label>
                        <select name="programLevelType" class="form-control custom-select-v2">
                            <option value="" disabled {{ !request('programLevelType') ? 'selected' : '' }}>Select Study Level</option>
                            <option value="UG" {{ request('programLevelType') == 'UG' ? 'selected' : '' }}>Undergraduate</option>
                            <option value="PG" {{ request('programLevelType') == 'PG' ? 'selected' : '' }}>Postgraduate</option>
                        </select>
                    </div>

                    <div class="mb-4">
                        <label class="small text-uppercase font-weight-bold text-muted mb-2 d-block">Universities</label>
                        <div class="form-control custom-select-v2" style="height: 180px; overflow-y: auto; padding: 10px;">
                            @foreach ($universities as $university)
                                <div class="form-check mb-2">
                                    <input class="form-check-input" type="checkbox" name="universities[]" value="{{ $university->id }}" id="uni_{{ $university->id }}" {{ in_array($university->id, (array)request('universities', [])) ? 'checked' : '' }}>
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
                                    <input class="form-check-input" type="checkbox" name="state[]" value="{{ $id }}" id="state_{{ $id }}" {{ in_array($id, (array)request('state', [])) ? 'checked' : '' }}>
                                    <label class="form-check-label text-dark" for="state_{{ $id }}" style="cursor: pointer; font-size: 0.9rem;">
                                        {{ $name }}
                                    </label>
                                </div>
                            @endforeach
                        </div>
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
                        <label class="small text-uppercase font-weight-bold text-muted mb-2 d-block">Course Fees</label>
                        <select name="course_fee" class="form-control custom-select-v2">
                            <option value="" disabled {{ !request('course_fee') ? 'selected' : '' }}>Select Fee Range</option>
                            <option value="30000" {{ request('course_fee') == '30000' ? 'selected' : '' }}>Less than ~ AUD 30,000/year</option>
                            <option value="40000" {{ request('course_fee') == '40000' ? 'selected' : '' }}>Less than ~ AUD 40,000/year</option>
                            <option value="50000" {{ request('course_fee') == '50000' ? 'selected' : '' }}>Less than ~ AUD 50,000/year</option>
                            <option value="60000" {{ request('course_fee') == '60000' ? 'selected' : '' }}>Less than ~ AUD 60,000/year</option>
                        </select>
                    </div>
                    
                </div>

                <div class="offcanvas-footer d-flex gap-2 mt-auto pt-3 bg-white border-top border-light">
                    <button type="button" class="btn btn-outline-secondary rounded-pill px-4 py-2 flex-grow-1 font-weight-bold" onclick="resetFilters()">Clear</button>
                    <button type="submit" class="btn btn-filter-courses rounded-pill px-4 py-2 flex-grow-1 text-white font-weight-bold">Apply Filters</button>
                </div>
            </form>
        </div>

    </div>

    <div class="scholarship-bg-wrapper bg-alice-blue-custom">
        <header class="scholarship-hero responsive-hero-padding">
            <div class="container">
                <h1 class="hero-title mb-3"><span class="text-dark-blue">Explore</span> <span class="text-accent">Courses</span></h1>
                <p class="courses-subtitle">Discover courses from top universities below. Use the filters to refine by
                    subject area, study level, destination and more.</p>

            <div class="row">
                <div class="col-md-12">
                    <!-- Search Row V2 -->
                    <form method="GET" action="{{ route('courseFinder.filter') }}" class="w-100" id="searchFilterForm">
                        <div class="search-row-uni">
                            <div class="search-card-wrapper">
                                <div class="search-input-with-icon">
                                    <i class="fa-solid fa-magnifying-glass search-icon-mobile"></i>
                                    <input type="text" name="query" id="courseSearchInput" class="search-input" value="{{ request('query') }}" placeholder="Search by course name, university name, or keywords..." autocomplete="off">
                                    <div id="searchSuggestions"></div>
                                </div>
                                <button type="submit" class="btn-search-pill-v2">Search</button>
                            </div>
                            <div class="filter-sort-group-v2">
                                <button type="button" class="btn-filter-pill-v2" id="filterToggleButton">Filter Courses <i class="fa-solid fa-sliders ml-2"></i></button>

                                <div class="sort-by-capsule-v2 dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false" role="button">
                                    <span>Sort By: Popularity</span>
                                    <i class="fa-solid fa-chevron-down small mb-0 ml-2"></i>
                                </div>
                                <ul class="dropdown-menu border-0 shadow-sm rounded-3 mt-2">
                                    <li><a class="dropdown-item py-2" href="#">Popularity</a></li>
                                    <li><a class="dropdown-item py-2" href="#">Fee: Low to High</a></li>
                                    <li><a class="dropdown-item py-2" href="#">Fee: High to Low</a></li>
                                    <li><a class="dropdown-item py-2" href="#">Duration: Shortest</a></li>
                                </ul>
                            </div>
                        </div>
                        </div>
                    </form>
                </div>
            </div>
        </header>

        <section class="scholarship-grid-section pt-5 pb-5">
            <div class="container container-wide">
                <!-- Course Result List -->
                <div id="courseResults">
                    @include('coursefinder.filter', [
                        'universitycourses' => $universitycourses,
                    ])
                </div>
            </div>
        </section>
    </div>

    <!-- Global Fullscreen Loader Overlay -->
    <div id="filterLoaderOverlay" class="filter-loader-overlay d-none">
        <div class="loader-content text-center">
            <div class="spinner-border text-accent mb-3" role="status" style="width: 3rem; height: 3rem; border-width: 0.25em;">
                <span class="sr-only">Loading...</span>
            </div>
            <h4 class="font-weight-bold text-dark-blue">Searching Courses...</h4>
            <p class="text-muted small mb-0">Applying your filters to find the best matches.</p>
        </div>
    </div>

@endsection

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

            // Loader Animation Trigger for Forms
            $('#filterForm, #searchFilterForm').on('submit', function() {
                // Hide offcanvas if open for cleaner transition
                if ($('#filterOffcanvas').hasClass('show')) {
                    hideFilters();
                }
                
                $('#filterLoaderOverlay').removeClass('d-none');
                // Tiny delay to allow display:block to apply before animating opacity
                setTimeout(() => {
                    $('#filterLoaderOverlay').addClass('active');
                }, 10);
            });

            // --- Auto-Suggest Logic ---
            const searchInput = document.getElementById('courseSearchInput');
            const suggestionsDiv = document.getElementById('searchSuggestions');
            let debounceTimer;

            searchInput.addEventListener('input', function() {
                const query = this.value.trim();
                clearTimeout(debounceTimer);

                if (query.length < 1) {
                    suggestionsDiv.style.display = 'none';
                    return;
                }

                debounceTimer = setTimeout(() => {
                    fetch(`{{ route('courseFinder.autocomplete') }}?query=${encodeURIComponent(query)}`)
                        .then(response => response.json())
                        .then(data => {
                            if (data.length > 0) {
                                renderSuggestions(data);
                            } else {
                                suggestionsDiv.style.display = 'none';
                            }
                        });
                }, 300);
            });

            function renderSuggestions(data) {
                suggestionsDiv.innerHTML = '';
                data.forEach(item => {
                    const div = document.createElement('div');
                    div.className = 'suggestion-item';
                    div.innerHTML = `
                        <i class="fa-solid ${item.type === 'University' ? 'fa-university' : 'fa-book-open'}"></i>
                        <span class="suggestion-label">${item.label}</span>
                        <span class="suggestion-type">${item.type}</span>
                    `;
                    div.addEventListener('click', () => {
                        window.location.href = item.url;
                    });
                    suggestionsDiv.appendChild(div);
                });
                suggestionsDiv.style.display = 'block';
            }

            // Close suggestions on click outside
            document.addEventListener('click', function(e) {
                if (!searchInput.contains(e.target) && !suggestionsDiv.contains(e.target)) {
                    suggestionsDiv.style.display = 'none';
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
                form.submit();
            }
        }
    </script>
@endpush
