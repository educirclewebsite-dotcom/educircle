@if ($universitycourses->count())
    @foreach ($universitycourses as $universitycourse)
        <div class="course-card mb-4">
            <div class="course-card-body pb-0">
                <div class="course-card-header">
                    <h5 class="course-card-title flex-grow-1">
                        {{ $universitycourse->course->course_name ?? '-' }}
                    </h5>
                    <form method="POST" action="{{ route('student.course.apply') }}" class="flex-shrink-0">
                        @csrf
                        <input type="hidden" name="university_course_id" value="{{ $universitycourse->id }}">
                        <button type="submit" class="btn btn-apply-now py-2 px-4" style="font-size: 0.9rem;">
                            Apply Now
                        </button>
                    </form>
                </div>

                <div class="course-card-subtitle mb-3">
                    <i class="ri-building-line me-2 text-muted"></i>
                    {{ $universitycourse->university->university_name ?? '-' }}
                </div>

                @php
                    $semesters = json_decode($universitycourse->semester, true);
                    $semesterMap = [
                        1 => 'Sem 1 (Feb)',
                        2 => 'Sem 2 (July)',
                        3 => 'Sem 3 (Nov)',
                    ];
                    $semesterLabels = [];
                    if (is_array($semesters)) {
                        foreach ($semesters as $sem) {
                            if (isset($semesterMap[$sem])) {
                                $semesterLabels[] = $semesterMap[$sem];
                            }
                        }
                    }
                @endphp

                <div class="course-details-grid border-top-0 mt-0 pt-0 mb-4">
                    <!-- Duration -->
                    <div class="course-detail-item">
                        <div class="course-detail-icon">
                            <i class="ri-time-line"></i>
                        </div>
                        <div class="course-detail-content">
                            <span class="course-detail-label">Duration</span>
  
                          <span class="course-detail-value">{{ $universitycourse->duration_months ?? '-' }}
                                Year{{ $universitycourse->duration_months > 1 ? 's' : '' }}</span>   
                        </div>
                    </div>

                    <!-- Intakes -->
                    <div class="course-detail-item">
                        <div class="course-detail-icon">
                            <i class="ri-calendar-check-line"></i>
                        </div>
                        <div class="course-detail-content">
                            <span class="course-detail-label">Intakes</span>
                            <span class="course-detail-value">{{ implode(', ', $semesterLabels) }}</span>
                        </div>
                    </div>

                    <!-- Tuition Fees -->
                    <div class="course-detail-item">
                        <div class="course-detail-icon">
                            <i class="ri-money-dollar-circle-line"></i>
                        </div>
                        <div class="course-detail-content">
                            <span class="course-detail-label">Tuition Fees</span>
                            <span class="course-detail-value">AUD {{ number_format($universitycourse->course_fee) }} /
                                Year</span>
                        </div>
                    </div>
                </div>
            </div>

            @if($universitycourse->scholarship)
                <div class="scholarship-strip">
                    <i class="ri-award-line me-2"></i>
                    <span>Scholarships: {{ $universitycourse->scholarship }}</span>
                </div>
            @endif
        </div>
    @endforeach
@else
    <div class="alert alert-info">No courses found.</div>
@endif