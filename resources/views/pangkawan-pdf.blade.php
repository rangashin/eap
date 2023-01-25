<!DOCTYPE html>
<html>
<head>
<style>
#applicants {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

#applicants td, #applicants th {
  border: 1px solid #ddd;
  padding: 8px;
}

#applicants tr:nth-child(even){background-color: #f2f2f2;}

#applicants tr:hover {background-color: #ddd;}

#applicants th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #696969;
  color: white;
}
</style>
</head>
<h1>EAP Applicants (Selected For Interview)<h1>
<p> Date Retrieved:  {{ $date = date('m/d/Y h:i:s a', time()) }}</p>
<body>
  
    <table id="applicants">
        <thead>
            <th>Name</th>
            <th>Applicant Status</th>
            <th>Year Level</th>
            <th>General Average</th>
            <th>Family Total Income</th>
            <th>Selected Date</th>
            <th>Interview Date</th>
            <th>Remarks</th>
        </thead>

        @foreach($users as $user)
        <tr>
            <td>{{ $user->full_name }}</td>
            <td>{{ $user->renewal }}</td>
            <td>{{ $user->gradeyearorlvl }}</td>
            <td>{{ $user->genave }}</td>
            <td>{{ $user->family_total_income }}</td>
            <td>{{ $user->hasselecteddate }}</td>
            <td>{{ $user->interviewdate }}</td>
            <td></td>
        </tr>
        @endforeach
    </table>

</body>
</html> 
