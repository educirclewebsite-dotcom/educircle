@if ($universitycourses->count())
    <div class="row g-4">
        @foreach ($universitycourses as $universitycourse)
            <div class="col-lg-4 col-md-6 mb-4">
                <a href="{{ route('course.details', ['university_slug' => $universitycourse->university->slug ?? '-', 'course_id' => $universitycourse->id]) }}"
                    class="text-decoration-none text-dark d-block h-100">
                    <div class="course-card popular-card bg-white p-3 h-100 position-relative d-flex flex-column">
                        <div class="card-header-new">
                            <div class="uni-info-new">
                                <h5 class="uni-name">{{ $universitycourse->university->university_name ?? '-' }}</h5>
                                <p class="uni-location-v3">
                                    @if(!empty($universitycourse->university->city))
                                        {{ $universitycourse->university->city }},
                                    @endif
                                    <span class="country-text">{{ $universitycourse->university->country->name ?? '' }}</span>
                                </p>
                            </div>
                            <div class="logo-placeholder-box">
                                @if (!empty($universitycourse->university->logo_img) && file_exists(public_path($universitycourse->university->logo_img)))
                                    <img src="{{ asset($universitycourse->university->logo_img) }}"
                                        alt="{{ $universitycourse->university->university_name ?? 'University Logo' }}">
                                @else
                                    <img src="{{ asset('theme/images/banner/banner.png') }}" alt="Default University Logo">
                                @endif
                            </div>
                        </div>

                        <h6 class="course-title-green mb-4">{{ $universitycourse->course->course_name ?? '-' }}</h6>

                        @php
                            $semesters = json_decode($universitycourse->semester, true);
                            $semesterMap = [
                                1 => 'Feb',
                                2 => 'July',
                                3 => 'Nov',
                            ];
                            $semesterLabels = [];
                            if (is_array($semesters)) {
                                foreach ($semesters as $sem) {
                                    if (isset($semesterMap[$sem])) {
                                        $semesterLabels[] = $semesterMap[$sem];
                                    }
                                }
                            }
                            $intakeString = count($semesterLabels) > 0 ? implode(', ', $semesterLabels) : '-';
                        @endphp

                        <div class="metadata-section-new">
                            <div class="metadata-col">
                                <p class="metadata-label">Course Fee</p>
                                <p class="scholarship-value">AUD {{ number_format($universitycourse->course_fee) }} / Year</p>
                            </div>
                            <div class="metadata-col">
                                <p class="metadata-label">Scholarship</p>
                                <p class="scholarship-value text-green">{{ $universitycourse->scholarship ?? 'Up to 25%' }}</p>
                            </div>
                        </div>

                        <div class="metadata-section-new">
                            <div class="metadata-col">
                                <p class="metadata-label">Duration</p>
                                <p class="scholarship-value">
                                   {{ $universitycourse->duration_months ?? '-' }}
                                    Years
                                </p>
                            </div>
                            <div class="metadata-col">
                                <p class="metadata-label">Intake</p>
                                <p class="scholarship-value text-green">{{ $intakeString }}</p>
                            </div>
                        </div>

                        <div class="d-flex justify-content-between align-items-center mt-auto">
                            <object><a href="{{ route('contact') }}"
                                    class="btn btn-connect-expert btn-sm rounded-pill px-3 font-weight-bold mr-2">
                                    Connect with Expert
                                </a></object>
                            <object><a href="https://wa.me/918130820084" target="_blank"
                                    class="btn btn-chat-gradient btn-sm rounded-pill px-3 font-weight-bold">
                                    <i class="fab fa-whatsapp mr-1"></i>Chat with us
                                </a></object>
                        </div>
                    </div>
                </a>
            </div>
        @endforeach
    </div>
@else
    <div class="alert alert-info">No courses found.</div>
@endif