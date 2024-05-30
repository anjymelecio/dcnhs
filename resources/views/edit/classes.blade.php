<!-- Button trigger modal -->
<a href="#edit{{ $class->id }}" class="btn" data-bs-toggle="modal" data-bs-target="#edit{{ $class->id }}">
    <button class="btn btn-warning btn-sm d-flex gap-2"><i class="fa-solid fa-pencil mt-1"></i> Edit</button>
</a>

<div class="modal fade" id="edit{{ $class->id }}" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel">Edit class system</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('strand.class.update', ['id'=>$class->id]) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div>
                            <label for="strand_subject_id">Subjects</label>
                            <select name="strand_subject_id" id="strand_subject_id"
                                class="form-control @error('strand_subject_id') is-invalid @enderror">
                                @if($subjects->count() > 0)
                                    @foreach ($subjects as $subject)
                                        <option value="{{ $subject->id }}" {{$class->subject_id == $subject->id ? 'selected' : '' }}>
                                            {{ $subject->subject }}
                                        </option>
                                    @endforeach
                                @else
                                    <option>No subjects found</option>
                                @endif
                            </select>
                            @error('strand_subject_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div>
                            <label for="teacher_id">Teacher</label>
                            <select name="teacher_id" id="teacher_id"
                                class="form-control @error('teacher_id') is-invalid @enderror">
                                @foreach ($teachers as $teacher)
                                    <option value="{{ $teacher->id }}" {{ $class->teacher_id == $teacher->id ? 'selected' : '' }}>
                                        {{ $teacher->lastname }}, {{ $teacher->firstname }} ({{ $teacher->teacher_id }})
                                    </option>
                                @endforeach
                            </select>
                            @error('teacher_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="row mt-3">
                        <div>
                            <label for="section_id">Section</label>
                            <select name="section_id" id="section_id" class="form-control @error('section_id') is-invalid @enderror">
                              @if ($sections->count() > 0)
                               @foreach ($sections as $section)
                                    <option value="{{ $section->id }}" {{ $class->section_id == $section->id ? 'selected' : '' }}>
                                      {{ $section->sections }}
                             </option>
              
                                @endforeach
              
                                @else 
                                <option>No section found</option>
                                  
                              @endif
                               
                            </select>
                            @error('section_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div>
                            <label for="grade_level_id">Grade level</label>
                            <select name="grade_level_id" id="grade_level_id"
                                class="form-control @error('grade_level_id') is-invalid @enderror">
                                @foreach ($gradeLevels as $level)
                                    <option value="{{ $level->id }}" {{ $class->level_id  == $level->id ? 'selected' : '' }}>
                                        Grade {{ $level->level }}
                                    </option>
                                @endforeach
                            </select>
                            @error('grade_level_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div>
                            <label for="semester_id">Semester</label>
                            <select name="semester_id" id="semester_id"
                                class="form-control @error('semester_id') is-invalid @enderror">
                                @foreach ($semesters as $semester)
                                    <option value="{{ $semester->id }}" {{ $class->semester_id == $semester->id ? 'selected' : '' }}>
                                        {{ $semester->semester }}
                                    </option>
                                @endforeach
                            </select>
                            @error('semester_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="row mt-3">
                        @php
                            $days = ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday'];
                        @endphp
                        <div>
                            <label for="day">Day</label>
                            <select name="day" id="day" class="form-control @error('day') is-invalid @enderror">
                                @foreach ($days as $day)
                                    <option value="{{ $day }}" {{ $class->day == $day ? 'selected' : '' }}>
                                        {{ $day }}
                                    </option>
                                @endforeach
                            </select>
                            @error('day')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div>
                            <label for="time_start">Time start</label>
                            <input type="time" name="time_start" id="time_start"
                                class="form-control @error('time_start') is-invalid @enderror" value="{{ ($class->time_start) }}" required>
                            @error('time_start')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div>
                            <label for="time_end">Time end</label>
                            <input type="time" name="time_end" id="time_end"
                                class="form-control @error('time_end') is-invalid @enderror" value="{{ $class->time_end }}" required>
                            @error('time_end')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
