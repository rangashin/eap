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

      #applicants tr:nth-child(even){
        background-color: #f2f2f2;
      }

      #applicants tr:hover {
        background-color: #ddd;
      }

      #applicants th {
        padding-top: 12px;
        padding-bottom: 12px;
        text-align: left;
        background-color: #696969;
        color: white;
      }
    </style>
  </head>

  <h1>EAP Applicants (Interview Selection)<h1>
  <p> Date Retrieved:  {{ $date = date('m/d/Y h:i:s a', time()) }}</p>

  <body>  
      <table id="applicants">
          <thead>
              <th>Name</th>
              <th>Kawan</th>
              <th>Year Level</th>
              <th>General Average</th>
              <th>Family Total Income</th>
              <th>Selected Date</th>
              <th>Interview Date</th>
              <th>Remarks</th>
          </thead>

          @forelse($applicants as $applicants)
          <tr>
            <td>{{ $applicants->full_name }}</td>
            <td>{{ $applicants->kawan->kawanname }}</td>
            <td>{{ $applicants->gradeyearorlevel }}</td>
            <td>{{ $applicants->genave }}</td>
            <td>{{ $applicants->family_total_income }}</td>
            <td>{{ $applicants->hasbeenselecteddate }}</td>
            <td>{{ $applicants->interviewdate }}</td>
            <td></td>
          </tr>
          @empty
          <tr>
            <td>NO DATA</td>
          </tr>
          @endforelse
      </table>
  </body>
</html> 