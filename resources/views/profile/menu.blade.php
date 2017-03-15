<ul class="nav-side-list">
  <li @if($select=='password')class="active"@endif><a href="{{ route('profile.password') }}">Change Password</a></li>
  <li @if($select=='index')class="active"@endif><a href="{{ route('profile.index') }}">Edit Profile</a></li>
</ul>