<div class="row mb-3 mt-2">
    <ul class="nav justify-content-center">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="{{ route('dashboard') }}">Dashboard</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('election.index') }}">Elections</a>
          </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('institution.index') }}">Institutions</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('candidate.index') }}">Candidates</a>
          </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('voter.index') }}">Voters Register</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('vote.index') }}">Votes</a>
          </li>
        <li class="nav-item">
          <a class="nav-link" onclick="logout()" href="#">Logout</a>
        </li>
    </ul>

</div>
