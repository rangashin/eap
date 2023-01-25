<!DOCTYPE html>
<html>
  <head>
    <style>
      #applicants {
        font-family: Arial,  sans-serif;
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

  <h1 id="applicants">EAP Scholars {{ $temp }}<h1>
  <p> Date Retrieved:  {{ $date = date('m/d/Y h:i:s a', time()) }}</p>

  <body>
    <table id="applicants">
      <thead>
          <th>Name</th>
          <th>Year Level</th>
          <th>1S</th>
          <th>2S</th>
          <th>3S</th>
          <th>4S</th>
          <th>Total Student</th>
          <th>1P</th>
          <th>2P</th>
          <th>3P</th>
          <th>4P</th>
          <th>Total Parent</th>
          <th>Total Attendance</th>
      </thead>

      @forelse($scholars as $scholar)
        <tr>
            <td>{{ $scholar->applicant->full_name }}</td>
            <td>{{ $scholar->applicant->gradeyearorlevel }}</td>
            <td>{{ $scholar->firststudent }}</td>
            <td>{{ $scholar->secondstudent }}</td>
            <td>{{ $scholar->thirdstudent }}</td>
            <td>{{ $scholar->fourthstudent }}</td>
            <td>{{ $scholar->totalstudent }}</td>
            <td>{{ $scholar->firstparent }}</td>
            <td>{{ $scholar->secondparent }}</td>
            <td>{{ $scholar->thirdparent }}</td>
            <td>{{ $scholar->fourthparent }}</td>
            <td>{{ $scholar->totalparent }}</td>
            <td>{{ $scholar->totalcombinedattendance }}</td>
        </tr>
      @empty
        <tr>
          <td>NO DATA</td>
        </tr>
      @endforelse
    </table>
  </body>
</html>