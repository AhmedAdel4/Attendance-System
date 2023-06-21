<!DOCTYPE html>
<html style=" background-color: #d8d2d2">

<head>
    <meta charset="UTF-8">
    <title>Attendance Report</title>
    <style>
        body {
            font-family: "Arial Unicode MS", Arial, sans-serif;
        }

        h2 {
            margin-bottom: 10px;
        }

        .course-info {
            margin-bottom: 20px;
        }

        .course-info p {
            margin: 5px 0;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
            transform: scale(0.9);
        }

        th,
        td {
            padding: 8px;
            border: 1px solid #ddd;
            font-family: "Arial Unicode MS", Arial, sans-serif;
        }

        th {
            background-color: #f2f2f2;
            font-weight: bold;
            text-align: left;
        }

        .center {
            text-align: center;
        }
    </style>
</head>

<body>

    <div class="course-info">
        <h2>Course: {{ $subject->nameEn }}</h2>
        <p>Instructor: {{ $user->name }}</p>
        <p>Title: {{ $user->title->name }}</p>
        <!-- Add additional course information here -->
    </div>

    @foreach ($groups as $group)
        <h2>{{ $group->nameEn }}</h2>
        <table >
            <thead>
                <tr>
                    <th class="center" style="width: 60px;background-color: #6e9bdf">Student Name</th>
                    @foreach ($weeks as $week)
                        <th style="background-color: #6e9bdf" class="center">{{ $week->nameEn }}</th>
                    @endforeach
                </tr>
            </thead>
            <tbody>
                @foreach ($group->students as $student)
                    <tr>
                        <td class="center" style="width: 60px;background-color: #f0e9e9">{{ $student->nameEn }}</td>
                        @foreach ($weeks as $week)
                            @php
                                $attendance = $student->attendance->where('week_id', $week->id)->first();
                            @endphp
                            @if ($attendance)
                                <td style="background-color: #57972d" class="center">✓</td>
                            @else
                                <td class="center">-</td>
                            @endif
                        @endforeach
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endforeach
</body>

</html>


