


    <div class="container">
        <h2>Grades for {{ $subject->name }}</h2>
        <table class="table">
            <thead>
                <tr>
                    <th>Student Name</th>
                    <th>Quarter 1</th>
                    <th>Quarter 2</th>
                    <th>Quarter 3</th>
                    <th>Quarter 4</th>
                </tr>
            </thead>
            <tbody>
                @foreach($students as $student)
                    <tr>
                        <td>{{ $student->firstname }} {{ $student->lastname }}</td>
                        @for($quarter = 1; $quarter <= 4; $quarter++)
                            <td>
                                @if(isset($grades[$student->id][$quarter]))
                                    Initial Grade: {{ $grades[$student->id][$quarter]['initialGrade'] }}<br>
                                    Final Grade: {{ $grades[$student->id][$quarter]['finalGrade'] }}
                                @else
                                    No grades available
                                @endif
                            </td>
                        @endfor
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

